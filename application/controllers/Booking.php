<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Lounge', 'M_Reservation']);
        $this->load->helper(['string', 'url', 'date', 'number']);
        $this->load->library(['session', 'Api_Whatsapp']);
    }

    public function form_reservation()
    {
        $data = [
            'lounges' => $this->M_Lounge->list(),
            'pages' => 'pages/v_form_reservation',
        ];
        $this->load->view('index', $data);
    }

    public function add()
    {
        $date = $this->input->post('checkin');
        $price = preg_replace('/\./', '', $this->input->post('price'));
        $subtotal = preg_replace('/\./', '', $this->input->post('subtotal'));
        $tax = preg_replace('/\./', '', $this->input->post('tax'));
        $total = preg_replace('/\./', '', $this->input->post('total'));
        $phone_number = preg_replace('/\+/', '', $this->input->post('phone_number'));

        $max_num = $this->M_Reservation->select_max();

        if (!$max_num['max']) {
            $no_urut = 1; // Nilai Proses
        } else {
            $no_urut = $max_num['max'] + 1;
        }

        $no_reservasi = 'ZFR' . sprintf("%06d", $no_urut);

        $data = [
            'id_lounge' => $this->input->post('lounge'),
            'booking_date' => $date,
            'price' => $price,
            'pax' => trim($this->input->post('pax')),
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'customer_name' => trim($this->input->post('customer_name')),
            'email' => trim($this->input->post('customer_email')),
            'address' => trim($this->input->post('address')),
            'phone_number' => trim($phone_number),
            'created_at' => date('Y-m-d H:i:s'),
            'no_urut' => $no_urut,
            'no_reservasi' => $no_reservasi,
        ];

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $phone_number_admin = "085240719210";

        if ($this->M_Reservation->add_reservation($data)) {

            $msg2 = 'Halo, kak *' . $data['customer_name'] . '*.%0aTerima kasih sudah menghubungi kami. %0aNomor reservasi *' . $no_reservasi . '*%0aAdmin kami akan segera menghubungi Anda. Mohon ditunggu ya.';

            $msg_admin = '*New Order* %0aNama pemesan: ' . $data['customer_name'] . '%0aEmail: ' . $data['email'] . '%0aTanggal Penggunaan: ' . format_indo($date) . '%0aJumlah Pax: ' . $data['pax'] . '%0aPhone: ' . $data['phone_number'];

            $this->api_whatsapp->wa_notif($msg2, $phone_number);
            $this->api_whatsapp->wa_notif($msg_admin, $phone_number_admin);

            $this->session->set_flashdata('message_name', 'The reservation has been successfully created. Please wait for the confirmation.');

            redirect("home");
        } else {

            $this->session->set_flashdata('message_error', $this->db->_error_message());

            redirect("home");
        }
    }
}
