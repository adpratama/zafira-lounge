<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Lounge extends CI_Model
{
    public function list()
    {
        return $this->db->order_by('lounge_name')->get('lounge')->result();
    }
}
