<?php if (isset($detail)) : ?>

    <div class="modal fade bd-example-modal-lg" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span class="" aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" readonly class="form-control" placeholder="" value="<?php echo $detail->nama ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->umur ?> Tahun">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input readonly type="date" class="form-control" value="<?php echo $detail->tanggal ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" readonly maxlength="20" class="form-control" value="<?php echo $detail->tempat ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea readonly id="alamat" cols="30" rows="3" class="form-control"><?= $detail->alamat ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text" readonly class="form-control" value="<?php echo ucfirst($detail->agama) ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Email</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->email ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Telepon</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->telp ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Asal Sekolah</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->asal_sekolah ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Asal Sekolah</label>
                                <textarea readonly cols="30" rows="3" class="form-control"><?= $detail->alamat_asal_sekolah ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label>NISN</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->nisn ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nama Ayah</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->nama_ayah ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Penghasilan Ayah</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->gaji_ayah ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nama Ibu</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->nama_ibu ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Penghasilan Ibu</label>
                                <input type="text" readonly class="form-control" value="<?php echo $detail->gaji_ibu ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Orang Tua</label>
                                <textarea readonly cols="30" rows="3" class="form-control"><?= $detail->alamat_ortu ?></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>