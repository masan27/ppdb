<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb_model extends CI_Model
{
    public function list($id = false)
    {
        $this->db->order_by('id_murid', 'DESC');
        if ($id === false) {
            $query = $this->db->get('murid');
            return $query->result();
        }
        $this->db->where('id_murid', $id);
        $query = $this->db->get('murid');
        return $query->row();
    }

    public function pending($id = false)
    {
        $this->db->where('bukti', NULL);
        $this->db->order_by('id_murid', 'DESC');
        if ($id === false) {
            $query = $this->db->get('murid');
            return $query->result();
        }
        // $this->db->where('id_murid', $id);        
        // $query = $this->db->get('murid');
        // return $query->row();
    }

    public function verif()
    {
        $this->db->where('bukti !=', NULL);
        $this->db->where('admin', NULL);
        $this->db->order_by('waktu', 'ASC');
        $query = $this->db->get('murid');
        return $query->result();
    }

    public function check($id)
    {
        $this->db->where('id_murid', $id);
        $query = $this->db->get('murid');
        return $query->row();
    }

    public function acc($id)
    {
        $this->db->set('admin', $this->session->id);
        $this->db->where('id_murid', $id);
        $this->db->update('murid');
    }

    public function delete($id)
    {
        $this->db->where('id_murid', $id);
        $this->db->delete('murid');
    }
}
