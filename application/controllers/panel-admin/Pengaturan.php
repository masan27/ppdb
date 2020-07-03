<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('pengaturan_model');
    }

    public function index()
    {
        if (!empty($_POST)) {
            // jika update berhasil atau true
            if ($this->pengaturan_model->update()) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect(base_url('panel-admin/pengaturan'));
            }
        }
        $data = array(
            'title'     => 'Pengaturan',
            'opsi'      => $this->pengaturan_model->get_data(),
        );
        $this->load->view('admin/pengaturan', $data);
    }
}
