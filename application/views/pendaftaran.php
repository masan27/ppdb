<div class="modal fade bd-example-modal-lg" id="Pendaftaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                echo form_open_multipart(base_url('dashboard/daftar'));
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" required name="nama" class="form-control" placeholder="" value="<?php echo set_value('nama') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Umur</label>
                            <select required name="umur" class="form-control" required>
                                <option value="">Pilih Umur..</option>
                                <?php for ($i = 12; $i < 19; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?> Tahun</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo set_value('tanggal') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" required name="tempat" maxlength="20" class="form-control" placeholder="Jakarta" value="<?php echo set_value('tempat') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea required name="alamat" id="alamat" cols="30" rows="3" class="form-control"><?= set_value('alamat') ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Agama</label>
                            <select required name="agama" class="form-control" required>
                                <option value="">Pilih Agama..</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu">Hindu</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="text" required name="email" class="form-control" placeholder="name@email.com" value="<?php echo set_value('email') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Telepon</label>
                            <input type="text" required name="telp" class="form-control" placeholder="083893361191" value="<?php echo set_value('telp') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Asal Sekolah</label>
                            <input type="text" required name="asal_sekolah" class="form-control" placeholder="SMPN 31 Jakarta Pusat" value="<?php echo set_value('asal_sekolah') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Asal Sekolah</label>
                            <textarea required name="alamat_asal_sekolah" cols="30" rows="3" class="form-control"><?= set_value('alamat_asal_sekolah') ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>NISN</label>
                            <input type="text" required name="nisn" class="form-control" placeholder="" maxlength="20" value="<?php echo set_value('nisn') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Nama Ayah</label>
                            <input type="text" required name="nama_ayah" class="form-control" placeholder="" value="<?php echo set_value('nama_ayah') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Penghasilan Ayah</label>
                            <select required name="gaji_ayah" class="form-control" required>
                                <option value="">Pilih Penghasilan..</option>
                                <option value="500.000 - 2.000.000">500.000 - 2.000.000</option>
                                <option value="2.000.000 - 4.000.000">2.000.000 - 4.000.000</option>
                                <option value="Lebih dari 4.000.000">Lebih dari 4.000.000</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Nama Ibu</label>
                            <input type="text" required name="nama_ibu" class="form-control" placeholder="" value="<?php echo set_value('nama_ibu') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Penghasilan Ibu</label>
                            <select required name="gaji_ibu" class="form-control" required>
                                <option value="">Pilih Penghasilan..</option>
                                <option value="500.000 - 2.000.000">500.000 - 2.000.000</option>
                                <option value="2.000.000 - 4.000.000">2.000.000 - 4.000.000</option>
                                <option value="Lebih dari 4.000.000">Lebih dari 4.000.000</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat Orang Tua</label>
                            <textarea required name="alamat_ortu" id="alamat_ortu" cols="30" rows="3" class="form-control"><?= set_value('alamat_ortu') ?></textarea>
                        </div>
                    </div>                    

                </div>

                <div class="form-group text-center">
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
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