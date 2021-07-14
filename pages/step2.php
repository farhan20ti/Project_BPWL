<div id="appbar">
    <div class="row d-flex justify-content-center mx-0 bg-app">
        <div class="col-lg-4 px-0 bg-main">
            <nav class="navbar navbar-light">
                <div class="d-flex px-4 py-2" id="tombolKembali">
                    <a href="#step1">
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
            <h5>Langkah 2</h5>
            <p style="font-weight: 500;">Pilih metode pengambilan beras</p>
            <form action="">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rad" id="rad1" value="ambil">
                    <label class="form-check-label" for="rad1">
                        Ambil ke tempat
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rad" id="rad2" value="antar">
                    <label class="form-check-label" for="rad2">
                        Antar ke rumah
                    </label>
                </div>
            </form>
            <div id="pilihAntar" class="mt-4">
                <p style="font-weight: 500;" class="mb-1">Masukkan alamat rumah</p>
                <p>Biaya antar: Rp. 5.000</p>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center mx-0 bg-app">
    <div class="col-lg-4 bg-content">
        <div class="d-flex flex-row-reverse p-4" id="tombol-next">
            <a href="#detail">
                <button class="btn btn-success">Selanjutnya</button>
            </a>
        </div>
    </div>
</div>