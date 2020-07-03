<div class="modal fade bd-example-modal-lg" id="Intro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tata Cara Melakukan Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <span class="h5 font-weight-bold text-danger">
                Perhatian harap melakukan dengan teliti karena setiap data yang telah di simpan maka tidak akan bisa dirubah kembali
            </span> </br></br>
                <ol>
                    <li>Tekan tombol <b>Pendaftaran</b> lalu isi semua kolom yang ada</li>
                    <li>Jika semua kolom sudah di isi selanjutnya tekan tombol simpan</li>
                    <li>Jika berhasil akan muncul pesan untuk melakukan pembayaran dengan cara :
                        <ul>
                            <li>Transfer BCA ke <?=$rekening?></li>
                            <li>Senilai <?=$harga?></li>                            
                        </ul>
                    </li>
                    <li>Anda juga akan mendapatkan email untuk melakukan pembayaran</li>
                    <li>Jika suda membayar tutup pesan dan tekan tombol Pembayaran</li>
                    <li>Masukan NIM dan bukti pembayaran (bisa berupa foto maupun pdf)</li>
                    <li>Jika sudah memasukan NIM dan bukti pembayaran tekan tombol simpan</li>
                    <li>Jika berhasil akan ada muncul pesan berhasil</li>                    
                    <li>Selanjutnya silahkan tunggu kami untuk memverifikasi, jika bukti pembayaran nya sah maka Anda akan mendapatkan email dari kami</li>
                </ol>
                Terima Kasih, #<?=$pt?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>