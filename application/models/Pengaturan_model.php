<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

    public $prop = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $this->db->select('*')
            ->from('pengaturan')
            ->where('aktif', 'Y')
            ->order_by('urutan', 'ASC')
            ->order_by('opsi', 'ASC');
        $query = $this->db->get();
        $data = $query->result();

        foreach ($data as $item) {
            $prop[$item->opsi] = $item->nilai;
        }

        return $prop;
    }

    public function update()
    {
        $opsi =    $this->get_data();
        foreach ($opsi as $opsi => $nilai) {
            $data[] = array(
                'opsi'  => $opsi,
                'nilai' => $this->input->post($opsi)
            );            
        }
        if ($this->db->update_batch('pengaturan', $data, 'opsi')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

     // Mendapatan Nama Perusahaan / Organisasi
     public function nama_perusahaan()
     {
         $this->db->select('nilai')
         ->from('pengaturan')
         ->where('opsi', 'nama_perusahaan');
         $query = $this->db->get();
         return $query->row()->nilai;        
     }

     public function rekening()
     {
         $this->db->select('nilai')
         ->from('pengaturan')
         ->where('opsi', 'rekening');
         $query = $this->db->get();
         return $query->row()->nilai;        
     }

     public function telepon()
     {
         $this->db->select('nilai')
         ->from('pengaturan')
         ->where('opsi', 'telepon');
         $query = $this->db->get();
         return $query->row()->nilai;        
     }

     public function harga()
     {
         $this->db->select('nilai')
         ->from('pengaturan')
         ->where('opsi', 'harga_pendaftaran');
         $query = $this->db->get();
         return $query->row()->nilai;        
     }
}
