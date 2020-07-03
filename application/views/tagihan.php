<div class="modal fade bd-example-modal-lg" id="Tagihan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span class="" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Silahkan bayar dalam waktu 1x24 jam
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>Nama</label></br>
                            <span class="h3 text-dark font-weight-bold"><?= $tagihan->nama ?></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>NISN</label></br>
                            <span class="h3 text-dark font-weight-bold"><?= $tagihan->nisn ?></span>
                            <hr>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group ">
                            <label>Rekening</label></br>
                            <img src="<?= base_url('assets/pendukung/BCA.png') ?>" alt="bca" class="img-fluid rekening float-left">
                            <span class="h1 text-primary norek font-weight-bold"><?= $rekening ?></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Senilai</label></br>
                            <span class="h3 text-success font-weight-bold harga">Rp. <?= number_format($harga) ?></span>
                        </div>
                    </div>                    

                </div>
                
                <div class="clearfix"></div>

                <?php
                // Form close 
                echo form_close();
                ?>

            </div>
            <div class="modal-footer">
                <a href="<?= base_url('dashboard') ?>">
                    <button type="button" class="btn btn-secondary">Tutup</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.file-bukti').addEventListener('change', function(e) {
        var fileName = document.getElementById("bukti").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    });
</script>