<div class="row d-flex justify-content-center mx-0 bg-app body-step1">
    <div class="col-lg-4 bg-content">
        <div class="p-4">
            <h5>Langkah 1</h5>
            <p>Pilih Metode Pembayaran</p>
            <button class="btn btn-info">Kredit</button>
            <button class="btn btn-warning">Cash</button>
            <div id="pilihCashAtauKredit" class="mt-4">
                <p>Pilih metode pembayaran</p>
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
                    <p>Masukkan nomor rekening untuk pembayaran transfer</p>
                    <form action="">
                        <input type="text" class="form-control">
                    </form>
                </div>
            </div>
            <div id="aturWaktuSetorKredit" class="mt-4 d-none">
                <p style="font-weight: bolder;" class="mb-1">Pilih tanggal pembayaran kredit</p>
                <p class="mb-0">Downpayment (DP): Rp. 25.000</p>
                <form action="">
                    <p class="mt-3 mb-1">Pembayaran pertama</p>
                    <input type="date" name="" id="" placeholder="No Rekening" class="form-control">
                    <p class="mt-3 mb-1">Pembayaran kedua</p>
                    <input type="date" name="" id="" placeholder="No Rekening" class="form-control">
                    <p class="mt-3 mb-1">Pembayaran ketiga</p>
                    <input type="date" name="" id="" placeholder="No Rekening" class="form-control">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center mx-0 bg-app">
    <div class="col-lg-4 bg-content">
        <div class="d-flex flex-row-reverse p-4">
            <button class="btn btn-success">Selanjutnya</button>
        </div>
    </div>
</div>