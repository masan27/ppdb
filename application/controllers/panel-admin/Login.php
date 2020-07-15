<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('pengaturan_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',
            'pt' => $this->pengaturan_model->nama_perusahaan()
        );
        $this->load->view('admin/login', $data);
    }

    public function proses_login()
    {
        $valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'required');
        $valid->set_rules('password', 'Password', 'required');

        if ($valid->run()) {
            $i = $this->input;
            $username  = $i->post('username');
            $password  = sha1($i->post('password'));
            $login = $this->login_model->check($username, $password);
            if ($login) {
                $sesi = array(
                    'id' => $login->id_user,
                    'user' => $login->username,
                    'nama' => $login->nama_user,
                );
                $this->session->set_userdata($sesi);
                redirect(base_url('panel-admin/ppdb'));
            } else {
                $this->session->set_flashdata('warning', 'Username atau Password Salah,...');
            }
        }
        $data = array(
            'title' => 'Login',
            'pt' => $this->pengaturan_model->nama_perusahaan()
        );
        $this->load->view('admin/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('panel-admin/login'));
    }
}