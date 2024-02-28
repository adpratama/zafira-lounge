<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'Api_Whatsapp', 'pdfgenerator', 'PHPExcel']);
        $this->load->helper(['string', 'date', 'number']);
        $this->load->model(['M_Auth', 'M_Reservation']);

        if (!$this->session->userdata('is_logged_in')) {

            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			You have to login first.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Reservation',
            'pages' => 'pages/dashboard/reservation/v_reservation',
            'reservations' => $this->M_Reservation->list()
        ];
        $this->load->view('pages/index', $data);
    }

    public function process()
    {
        $id = $this->uri->segment(4);
        $this->processApproval($id, 1, 'Reservasi telah disetujui dan akan diproses', 'Terjadi kesalahan. Silahkan dicoba lagi');
    }

    public function pending()
    {
        $id = $this->uri->segment(4);
        $this->processApproval($id, 2, 'Reservasi telah ditolak dan tidak akan diproses', 'Terjadi kesalahan. Silahkan dicoba lagi');
    }

    private function processApproval($id, $status, $successMessage, $errorMessage)
    {
        $detail = $this->M_Reservation->detail($id);

        $wa_pemesan = $detail['phone_number'];

        $data = ['reservation_status' => $status];

        $data_invoice = [];
        $this->M_Reservation->create_inv($data_invoice);

        $this->M_Reservation->approve($id, $data);

        if ($status == 1) {
            $msg2 = 'Halo, kak *' . $detail['customer_name'] . '*.%0aReservasi ' . $detail['no_reservasi'] . ' telah disetujui. Dalam waktu dekat kami akan segera menghubungi. Terima kasih.';
            $this->session->set_flashdata('message_name', $successMessage);
        } else if ($status == 2) {
            $msg2 = 'Halo, kak *' . $detail['customer_name'] . '*.%0aReservasi ' . $detail['no_reservasi'] . ' tidak dapat kami proses.';
            $this->session->set_flashdata('message_name', $successMessage);
        } else {
            $this->session->set_flashdata('message_error', $errorMessage);
        }

        $this->api_whatsapp->wa_notif($msg2, $wa_pemesan);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function print($no_inv)
    {
        $data = [
            'title_pdf' => 'Invoice No. ' . $no_inv,
            'invoice' => $this->M_Reservation->detail($no_inv),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Invoice No. ' . $no_inv;

        // setting paper
        $paper = 'A4';

        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('pages/dashboard/reservation/v_invoice_pdf', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
