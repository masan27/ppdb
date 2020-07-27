<link href="<?php echo base_url('assets/sb-admin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">

<div class="card-body">
    <div class="text-center pb-4">
        <div class="h4">Rekap Pendaftaran Siswa</div>
        <div class="h5"><?=$pt?></div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="10">
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Lunas</th>
                <th>Verif</th>
            </tr>
            <?php $no = 1;
            foreach ($ppdb as $item) :
            ?>
                <tr>
                    <td class="text-center">
                        <?php echo $no;
                        $no++; ?>
                    </td>
                    <td>
                        <?php echo $item->nama ?>
                    </td>
                    <td>
                        <?php echo $item->nisn ?>
                    </td>
                    <td>
                        <?php echo $item->email ?>
                    </td>
                    <td>
                        <?php echo $item->telp ?>
                    </td>
                    <td align="center">
                        <?php echo 'Y'; ?>
                    </td>
                    <td align="center">
                        <?php echo $item->username; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>