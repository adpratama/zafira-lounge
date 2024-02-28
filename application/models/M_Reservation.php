<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Reservation extends CI_Model
{
    public function select_max()
    {
        return $this->db->select('max(no_urut) as max')->get('reservations')->row_array();
    }

    public function add_reservation($data)
    {
        return $this->db->insert('reservations', $data);
    }

    public function list()
    {
        return $this->db->from('reservations a')->join('lounge b', 'a.id_lounge = b.Id', 'left')->where('reservation_status !=', '0')->order_by('no_reservasi', 'DESC')->get()->result();
    }

    public function incoming_reservations()
    {
        return $this->db->from('reservations a')->join('lounge b', 'a.id_lounge = b.Id', 'left')->where('reservation_status', '0')->order_by('no_reservasi', 'DESC')->get()->result();
    }

    public function approve($id, $data)
    {
        return $this->db->where('no_reservasi', $id)->update('reservations', $data);
    }

    public function detail($id)
    {
        return $this->db->from('reservations a')->join('lounge b', 'a.id_lounge = b.Id', 'left')->where('no_reservasi', $id)->get()->row_array();
    }

    public function create_inv($data)
    {
    }
}
