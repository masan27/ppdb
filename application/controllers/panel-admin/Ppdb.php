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

    public function valid($id = false)
    {

        $data = array(
            'title' => 'Valid',
            'ppdb' => $this->ppdb_model->valid()
        );

        $this->load->view('admin/ppdb/valid', $data);
    }

    protected function hari()
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $sekarang = $hari[date('N')];
        return $sekarang;
    }

    protected function tanggal($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Febuari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[0] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[2];
    }

    protected function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " miliar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " triliun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    protected function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function mail($id)
    {
        $terbilang = $this->terbilang($this->pengaturan_model->harga()) . ' RUPIAH';

        if ($id != NULL || $id != false) {
            // get data siswa
            $check = $this->ppdb_model->check($id);
            $pt = $this->pengaturan_model->nama_perusahaan();

            // make pdf
            $this->load->library('pdf');
            $dompdf = $this->pdf;
            $dompdf->set_option('isRemoteEnabled', true);
            $dompdf->load_html('
            <link href="' . base_url('assets/sb-admin2/css/sb-admin-2.min.css') . '" rel="stylesheet">

<style>
    .img {
        width: 30% !important;        
    }

    .sekolah {
        width: 70% !important;        
    }

    .table {
        padding-top: 120px;
        line-height: 90%;
    }

    .harga {
        width: 50% !important;
    }

    .ttd {
        width: 40% !important;
    }

    .tgl {
        width: 100%;
        margin-left: 60px;
        border-bottom: 1px dotted black;
    }
</style>

<div class="card-body">
    <div class="img float-left">
        <img src="' . base_url('assets/pendukung/logo.png') . '" alt="logo" class="img-fluid ml-5" width="57%">
    </div>
    <div class="sekolah float-left text-center font-weight-bold">
        <h3>KUITANSI SMA</h3>
        <u>
            <h5>USWATUN HASANAH PINANG RANTI</h5>
        </u>
        <p class="font-weight-normal">No : ...............................</p>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-borderless" width="100%">
            <tr>
                <td width="30%">Sudah diterima dari</td>
                <td width="1%">:</td>
                <td class="border-bottom">' . $check->nama . '</td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td>:</td>
                <td class="border-bottom">' . strtoupper($terbilang) . '</td>
            </tr>
            <tr>
                <td rowspan="3">Perihal</td>
                <td rowspan="3">:</td>
                <td class="border-bottom">Pembayaran Pendaftaran Sekolah</td>
            </tr>
            <tr>
                <td class="border-bottom">&nbsp;</td>
            </tr>
            <tr>
                <td class="border-bottom">&nbsp;</td>
            </tr>
        </table>
    </div>
    <div class="harga float-left">
        Rp. <span class="font-weight-bold h3">
            &nbsp;<span style="border-bottom: 1px solid black">' . number_format($this->pengaturan_model->harga()) . '</span>
        </span>

    </div>
    <div class="ttd float-right pt-5">
        Jakarta,<div class="tgl float-left text-left">' . $this->hari(date('N')) . " " . $this->tanggal(date('d-m-Y')) . '</div>
        <div class="text-right">Bendahara SMA &nbsp;</div>
        <br><br>
        <div class="text-right">(.............................)</div>
        <div class="pt-5 text-right">
        <small>Data ini dibuat pada: ' . date('Y-m-d H:i:s') . '</small>
    </div>
    </div>
</div>
                
            ');
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
            $mail->Username   = 'arsiady9@gmail.com';                     // SMTP username
            $mail->Password   = 'uswatunhasanah1';                               // SMTP password
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            // $mail->SMTPDebug  = 2;

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

        if ($id != false) {
            $this->ppdb_model->delete($id);
            $this->session->set_flashdata('success',  'Data berhasil dihapus');
            redirect(base_url('panel-admin/ppdb'));
        } else {
            $this->session->set_flashdata('danger',  'Anda belum memilih siswa');
        }

        $data = array(
            'title' => 'Siswa Baru',
            'ppdb' => $this->ppdb_model->list()
        );

        $this->load->view('admin/ppdb/index', $data);
    }

    public function print()
    {
        $this->load->library('Pdf_v');
        $data = array(
            'title' => 'Valid',
            'ppdb' => $this->ppdb_model->valid(),
            'pt' => $this->pengaturan_model->nama_perusahaan()
        );
        $file = 'Rekap Pendaftaran Siswa ' . date('d-m-Y') . '.pdf';
        $this->pdf_v->setPaper('A4', 'landscape');
        // $this->pdf_v->setPaper('A4', 'potrait');
        $this->pdf_v->set_option('isRemoteEnabled', true);
        $this->pdf_v->filename = $file;

        $this->pdf_v->load_view("admin/ppdb/print", $data);
    }

    public function pdf()
    {
        $this->load->library('Pdf_v');
        $this->pdf_v->setPaper('A4', 'potrait');
        $this->pdf_v->set_option('isRemoteEnabled', true);
        // $this->pdf_v->filename = $file;
        $this->pdf_v->load_view('admin/ppdb/pdf');
    }
}
