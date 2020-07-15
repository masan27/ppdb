<?php if (isset($check)) { ?>
    <div class="modal fade bd-example-modal-lg" id="Check" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span class="" aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Mohon berhati-hati setelah menekan tombol setuju data tidak bisa diubah kembali
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                    // Validasi error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');

                    // Form buka 
                    echo form_open(base_url('panel-admin/ppdb/mail/' . $check->id_murid));
                    ?>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nama</label>
                                <input type="text" disabled class="form-control" placeholder="" value="<?php echo $check->nama ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>NISN</label>
                                <input type="text" disabled class="form-control" placeholder="" value="<?php echo $check->nisn ?>">
                            </div>
                        </div>

                        <div class="col-md-3"></div>

                        <div class="col-md-6 text-center">
                            <?php if (!preg_match("/.pdf/", $check->bukti)) { ?>
                                <img src="<?= base_url('upload/bukti/' . $check->bukti) ?>" class="img-fluid rounded" alt="Bukti Pembayaran">
                            <?php } else { ?>
                                <div class="embed-responsive embed-responsive-1by1">
                                    <iframe class="embed-responsive-item" src="<?= base_url('upload/bukti/' . $check->bukti) ?>"></iframe>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="col-md-3"></div>

                    </div>

                    <div class="form-group text-center">
                        <input style="margin-top: 30px;" type="submit" name="submit" class="btn btn-success btn-lg" value="Setuju">
                    </div>
                    <div class="clearfix"></div>

                    <?php
                    // Form close 
                    echo form_close();
                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
<?php } ?>