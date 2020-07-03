<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    // query database menginput pedaftaran murid
    public function daftar($data)
    {
        $this->db->trans_start();
        $this->db->insert('murid', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return true;
        }
    }

    // cek sudah melakukan upload bukti pembayaran atau belum
    public function checking($nisn)
    {
        $this->db->select('bukti')->where('nisn', $nisn)->where('bukti', NULL);
        $query = $this->db->get('murid');
        return $query->row();
    }

    // menyimpan bukti pembayaran ke db
    public function bayar($nisn, $bukti)
    {
        $this->db->trans_start();
        $this->db->set('bukti', $bukti)
            ->set('waktu', date('Y-m-d H:i:s'))
            ->where('nisn', $nisn);
        $this->db->update('murid');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return true;
        }
    }

     // mengambil data siswa
     public function tagihan($nisn)
     {
         $this->db->where('nisn', $nisn)->where('bukti', NULL);
         $query = $this->db->get('murid');
         return $query->row();
     }

}
