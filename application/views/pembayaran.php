<div class="modal fade bd-example-modal-lg" id="Pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    Mohon berhati-hati setelah menekan tombol simpan data tidak bisa diubah kembali
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php
                // Validasi error
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                // Form buka 
                echo form_open_multipart(base_url('dashboard/bayar'));
                ?>

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>NISN</label>
                            <input type="text" required name="nisn" class="form-control" placeholder="" maxlength="20" value="<?php echo set_value('nisn') ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="custom-file">
                            <label>Upload Bukti Pembayaran</label>
                            <input required id="bukti" type="file" name="bukti" accept=".jpg, .png, .jpeg, .pdf" class="custom-file-input file-bukti" placeholder="Upload File">
                            <label class="custom-file-label" for="bukti">Pilih File</label>
                            <span class="text-danger">Bukti hanya dapat berupa Gambar atau PDF</span>
                        </div>
                    </div>

                </div>

                <div class="form-group text-center">
                    <input style="margin-top: 30px;" type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
                </div>
                <div class="clearfix"></div>

                <?php
                // Form close 
                echo form_close();
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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