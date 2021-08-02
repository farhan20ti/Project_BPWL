<div id="appbar">
    <div class="row d-flex justify-content-center mx-0 bg-app">
        <div class="col-lg-4 px-0 bg-main">
            <nav class="navbar navbar-light">
                <div class="d-flex px-4 py-2" id="tombolKembali">
                    <a href="#shop">
                        <button class="btn" id="btn-back"><i class="fas fa-chevron-left text-white"></i></button>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center mx-0 bg-app body-step1">
    <div class="col-lg-4 bg-content">
        <div class="p-4">
            <h5>Langkah 1</h5>
            <p style="font-weight: 500;">Pilih Metode Pembayaran</p>
            <button class="btn btn-info" id="kredit">Kredit</button>
            <button class="btn btn-warning" id="cash">Cash</button>
            <div id="pilihCashAtauKredit" class="mt-4">
                <p style="font-weight: 500;">Jenis Pembayaran</p>
                <form action="">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rad" id="rad1" value="transfer">
                        <label class="form-check-label" for="rad1">
                            Transfer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rad" id="rad2" value="tunai">
                        <label class="form-check-label" for="rad2">
                            Tunai
                        </label>
                    </div>
                </form>
                <div id="pilihTransfer" class="mt-4">
                    <p style="font-weight: bolder;">Nomor Rekening Penerima</p>
                    <form action="">
                        <input type="text" class="form-control" id="norek" placeholder="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center mx-0 bg-app">
    <div class="col-lg-4 bg-content">
        <div class="d-flex flex-row-reverse p-4" id="tombol-next">
            <a href="#step2">
                <button class="btn btn-success">Selanjutnya</button>
            </a>
        </div>
    </div>
</div>