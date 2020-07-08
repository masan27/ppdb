<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Ppdb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('ppdb_model');
        $this->load->model('pengaturan_model');
    }

    // daftar seluruh siswa baru
    public function index()
    {
        $data = array(
            'title' => 'Siswa Baru',
            'ppdb' => $this->ppdb_model->list()
        );

        $this->load->view('admin/ppdb/index', $data);
    }

    public function detail($id)
    {
        $data = array(
            'title' => 'Siswa Baru',
            'ppdb' => $this->ppdb_model->list(),
            'detail' => $this->ppdb_model->list($id)
        );

        $this->load->view('admin/ppdb/index', $data);
    }

    public function pending()
    {
        $data = array(
            'title' => 'Menunggu Pembayaran',
            'ppdb' => $this->ppdb_model->pending()
        );

        $this->load->view('admin/ppdb/pending', $data);
    }

    public function verif($id = false)
    {

        $data = array(
            'title' => 'Verifikasi Pembayaran',
            'ppdb' => $this->ppdb_model->verif()
        );

        if ($id != false) {
            $data = array(
                'title' => 'Verifikasi Pembayaran',
                'ppdb' => $this->ppdb_model->verif(),
                'check' => $this->ppdb_model->check($id)
            );
        }

        $this->load->view('admin/ppdb/verif', $data);
    }

    public function mail($id)
    {

        if ($id != NULL || $id != false) {
            // get data siswa
            $check = $this->ppdb_model->check($id);
            $pt = $this->pengaturan_model->nama_perusahaan();

            // make pdf
            $this->load->library('pdf');
            $dompdf = $this->pdf;
            $dompdf->load_html(
                '<h1>Bukti pembayaran anda telah diterima</h1>'
            );
            $dompdf->render();
            $pdf = $dompdf->output();
            $file_location = './upload/pdfcoba' . $check->nisn . '.pdf';
            file_put_contents($file_location, $pdf);

            // after done make mail
            $this->load->library('mailer');
            $mail = $this->mailer->load();
            // /Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'anaufal879@gmail.com';                     // SMTP username
            $mail->Password   = 'Masuksaja';                               // SMTP password
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->SMTPDebug  = 2;

            //Recipients
            // $mail->From($i->post('email'));
            // $mail->FromName($i->post('name'));
            $mail->setFrom($mail->Username, 'Anon');
            $mail->addAddress($check->email, $check->nama);     // Add a recipient
            // $mail->addAddress($site->email);               // Name is optional
            // $mail->addBCC($site->email_cadangan, 'Secondary');
            // $mail->addBCC('11171445@bsi.ac.id', 'Secondary2');
            // $mail->addReplyTo($i->post('email'), $i->post('name'));
            // $mail->addCustomHeader("CC: $site->email_cadangan"); 
            // $mail->addBCC('bcc@example.com');			

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            $mail->addAttachment($file_location, 'Kwitansi ' . $check->nama . '.pdf');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->WordWrap = 50;
            $mail->Subject = 'Subject';
            $mail->Body        = '<br>';
            $mail->Body    .= 'Selamat Anda Berhasil';
            $mail->Body        .= '<br><br> Email ini dikirim dari ' . $pt;
            $mail->AltBody = 'Selamat Anda Berhasil';

            if (!$mail->send()) {
                $this->session->set_flashdata('danger',  'Email Error:  ' . $mail->ErrorInfo);
            } else {
                // membuat perubahan pada db
                $this->ppdb_model->acc($id);
                // menghapus file pdf
                unlink($file_location);

                $this->session->set_flashdata('success', 'Email berhasil dikirim');
                echo '
                <script>
                	window.location.href = "' . base_url('panel-admin/ppdb/verif') . '";
                </script>
                ';
            }
        } else {
            $this->session->set_flashdata('danger',  'Anda belum memilih siswa, silahkan pilih siswa terlebih dahulu');
            echo '
            <script>
            	window.location.href = "' . base_url('panel-admin/ppdb/verif') . '";
            </script>
            ';
        }
    }

    public function hapus($id = false)
    {

        if ($id != false){
            $this->ppdb_model->delete($id);
            $this->session->set_flashdata('success',  'Data berhasil dihapus');
            redirect(base_url('panel-admin/ppdb'));
        }
        else{
            $this->session->set_flashdata('danger',  'Anda belum memilih siswa');
        }
        
        $data = array(
            'title' => 'Siswa Baru',
            'ppdb' => $this->ppdb_model->list()
        );

        $this->load->view('admin/ppdb/index', $data);
    }
}
