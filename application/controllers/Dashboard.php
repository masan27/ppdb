<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('pengaturan_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard ' . $this->pengaturan_model->nama_perusahaan(),
            'pt' => $this->pengaturan_model->nama_perusahaan(),
            'harga'     => $this->pengaturan_model->harga(),
            'rekening'  => $this->pengaturan_model->rekening(),
        );
        $this->load->view('dashboard', $data);
    }

    public function daftar()
    {

        $data = array(
            'title' => 'Dashboard ' . $this->pengaturan_model->nama_perusahaan(),
            'pt' => $this->pengaturan_model->nama_perusahaan(),
            'harga'     => $this->pengaturan_model->harga(),
            'rekening'  => $this->pengaturan_model->rekening(),
        );

        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Lengkap', 'required');
        $valid->set_rules('umur', 'umur', 'required');
        $valid->set_rules('tanggal', 'Tanggal Lahir', 'required');
        $valid->set_rules('tempat', 'Tempat Lahir', 'required');
        $valid->set_rules('alamat', 'Alamat', 'required');
        $valid->set_rules('agama', 'Agama', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_emails');
        $valid->set_rules('telp', 'Telepon', 'required|max_length[15]');
        $valid->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $valid->set_rules('alamat_asal_sekolah', 'Alamat Asal Sekolah', 'required');
        $valid->set_rules('nisn', 'NISN', 'required|max_length[15]|is_unique[murid.nisn]');
        $valid->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $valid->set_rules('gaji_ayah', 'Penghasilan Ayah', 'required');
        $valid->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $valid->set_rules('gaji_ibu', 'Penghasilan Ibu', 'required');
        $valid->set_rules('alamat_ortu', 'Alamat Orang Tua', 'required');

        if ($valid->run()) {
            $i = $this->input;
            $input = array(
                'nama' => $i->post('nama'),
                'umur' => $i->post('umur'),
                'tanggal' => $i->post('tanggal'),
                'tempat' => $i->post('tempat'),
                'alamat' => $i->post('alamat'),
                'email' => $i->post('email'),
                'telp' => $i->post('telp'),
                'asal_sekolah' => $i->post('asal_sekolah'),
                'alamat_asal_sekolah' => $i->post('alamat_asal_sekolah'),
                'nisn' => $i->post('nisn'),
                'nama_ayah' => $i->post('nama_ayah'),
                'gaji_ayah' => $i->post('gaji_ayah'),
                'nama_ibu' => $i->post('nama_ibu'),
                'gaji_ibu' => $i->post('gaji_ibu'),
                'alamat_ortu' => $i->post('alamat_ortu'),
            );

            if ($this->dashboard_model->daftar($input)) {
                $this->session->set_flashdata('success', 'Pendaftaran Berhasil');
                redirect(base_url('dashboard/tagihan/'.$i->post('nisn')));
            } else {
                $this->session->set_flashdata('danger', 'Pendaftaran Gagal');
                redirect(base_url('dashboard'));
            }
        } else {
            $this->session->set_flashdata('warning', 'Terjadi kesalahan saat pengisian formulir pendaftaran. Silahkan ulangi pendaftaran');
            $this->load->view('dashboard', $data);
        }
    }

    public function bayar()
    {
        $data = array(
            'title' => 'Dashboard ' . $this->pengaturan_model->nama_perusahaan(),
            'pt' => $this->pengaturan_model->nama_perusahaan(),
            'harga'     => $this->pengaturan_model->harga(),
            'rekening'  => $this->pengaturan_model->rekening(),
        );

        $valid = $this->form_validation;

        $valid->set_rules('nisn', 'NISN', 'required');
        if (empty($_FILES['bukti']['name'])) {
            $valid->set_rules('bukti', 'Bukti Pembayaran', 'required');
        }

        if ($valid->run()) {
            $i = $this->input;
            $nisn = $i->post('nisn');
            $cek = $this->dashboard_model->checking($nisn);
            if ($cek) {
                if (!empty($_FILES['bukti']['name'])) {

                    $img_path = './upload/bukti/';
                    $config['upload_path']   = $img_path;
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                    $config['max_size']      = '4000'; // KB  
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('bukti')) {
                        $upload_data = array('uploads' => $this->upload->data());
                        $bukti = $upload_data['uploads']['file_name'];

                        // proses ke db
                        if ($this->dashboard_model->bayar($nisn, $bukti)) {
                            $this->session->set_flashdata('success', 'Proses upload bukti pembayaran telah berhasil. </br>Silahkan cek email 1x24 jam untuk menerima kwitansi');
                            redirect(base_url('dashboard'));
                        } else {
                            $this->session->set_flashdata('error', 'Proses upload bukti pembayaran gagal mohon dicoba kembali');
                            redirect(base_url('dashboard'));
                        }
                    }
                }
            } else {
                $this->session->set_flashdata('danger', 'Maaf sistem kami telah mendeteksi Anda sudah pernah mengirim bukti pembayaran sebelumnya');
                $this->load->view('dashboard', $data);
            }
        }
        else{
            $this->load->view('dashboard', $data);
        }
    }

    public function tagihan($nisn)
    {
        // get data
        $tagihan = $this->dashboard_model->tagihan($nisn);
        $data = array(
            'title'     => 'Dashboard ' . $this->pengaturan_model->nama_perusahaan(),
            'pt'        => $this->pengaturan_model->nama_perusahaan(),
            'harga'     => $this->pengaturan_model->harga(),
            'rekening'  => $this->pengaturan_model->rekening(),
            'tagihan'   => $tagihan
        );
        $this->load->view('dashboard', $data);
    }
}
