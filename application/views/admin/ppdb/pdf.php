<?php

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

function tanggal($tanggal)
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

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " miliar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " triliun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

$terbilang = terbilang('2800000') . ' RUPIAH';

?>

<link href="<?php echo base_url('assets/sb-admin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">

<style>
    .img {
        width: 30% !important;
        /* overflow: auto; */
        /* clear: both; */
    }

    .sekolah {
        width: 70% !important;
        /* clear: both; */
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
        <img src="<?= base_url('assets/pendukung/logo.png') ?>" alt="logo" class="img-fluid ml-5" width="57%">
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
                <td class="border-bottom">SI A</td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td>:</td>
                <td class="border-bottom"><?= strtoupper($terbilang) ?></td>
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
            &nbsp;<span style="border-bottom: 1px solid black">xxxxxxx</span>
        </span>

    </div>
    <div class="ttd float-right pt-5">
        Jakarta,<div class="tgl float-left text-left"><?= $hari[date('N')] . " " . tanggal(date('d-m-Y')) ?></div>
        <div class="text-right">Bendahara SMA &nbsp;</div>
        <br><br>
        <div class="text-right">(.............................)</div>
    </div>
    <div class="pt-5 text-right">
        <small>Data ini dibuat pada: '.$date('Y-m-d H:i:s')'</small>
    </div>
</div>