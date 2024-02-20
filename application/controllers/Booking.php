<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Lounge', 'M_Booking']);
        $this->load->helper(['string', 'url', 'date', 'number']);
        $this->load->library(['session']);
    }

    public function form_booking()
    {
        $data = [
            'lounges' => $this->M_Lounge->list(),
            'pages' => 'pages/v_form_booking',
        ];
        $this->load->view('index', $data);
    }

    public function add()
    {
        $date_str = $this->input->post('booking_date');
        $date_obj = date_create_from_format('m/d/Y', $date_str); // Buat objek tanggal dari format yang diberikan
        $formatted_date = date_format($date_obj, 'Y-m-d');
        $price = preg_replace('/\./', '', $this->input->post('price'));
        $total = preg_replace('/\./', '', $this->input->post('total'));
        $phone_number = preg_replace('/\+/', '', $this->input->post('phone_number'));

        $max_num = $this->M_Booking->select_max();

        if (!$max_num['max']) {
            $no_urut = 1; // Nilai Proses
        } else {
            $no_urut = $max_num['max'] + 1;
        }

        $no_reservasi = sprintf("%06d", $no_urut);

        $data = [
            'id_lounge' => $this->input->post('lounge'),
            'booking_date' => $formatted_date,
            'price' => $price,
            'pax' => trim($this->input->post('pax')),
            'total' => $total,
            'customer_name' => trim($this->input->post('customer_name')),
            'email' => trim($this->input->post('email')),
            'phone_number' => trim($phone_number),
            'created_at' => date('Y-m-d H:i:s'),
            'no_urut' => $no_urut,
            'no_reservasi' => 'ZFR' . $no_reservasi,
        ];

        if ($this->M_Booking->add_reservation($data)) {
            $this->session->set_flashdata('message_name', 'The reservation has been successfully created. Please wait for the confirmation.');
            // After that you need to used redirect function instead of load view such as 
            redirect("home");
        }
    }
}
