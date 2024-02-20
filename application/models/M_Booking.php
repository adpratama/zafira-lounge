<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Booking extends CI_Model
{
    public function select_max()
    {
        return $this->db->select('max(no_urut) as max')->get('reservations')->row_array();
    }

    public function add_reservation($data)
    {
        return $this->db->insert('reservations', $data);
    }
}
