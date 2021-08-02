<div class="row d-flex justify-content-center align-items-center mx-0 bg-app register-body">
    <div class="col-md-4 col-12 px-0 pt-2 bg-content">
        <div class="row mx-0 px-3 pt-5">
            <h1 class="display-4">Register</h1>
            <p>Daftarkan data diri anda untuk membuat akun berasku</p>
        </div>
        <div class="row mx-0 px-3">
            <form id="form" enctype="multipart/form-data">
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Nama Lengkap</p>
                    <input type="text" class="form-control"  name="nama" placeholder="Masukkan nama lengkap.." id="nama">
                </div>
                <div id="nama-error"></div>
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Email</p>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan email.." id="email">
                </div>
                <div id="email-error"></div>
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">No. Handphone</p>
                    <input type="text" class="form-control" name="nohp" placeholder="Masukkan no handphone.." id="nohp">
                </div>
                <div id="nohp-error"></div>
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Alamat</p>
                    <textarea rows="5" class="form-control" name="alamat" placeholder="Masukkan alamat.." id="alamat"></textarea>
                </div>
                <div id="alamat-error"></div>
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Username</p>
                    <input type="text" class="form-control" name="uname" placeholder="Masukkan username.." id="uname">
                </div>
                <div id="uname-error"></div>
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Password</p>
                    <input type="password" class="form-control" name="pw" placeholder="Masukkan password.." id="pw">
                </div>
                 <div id="pw-error"></div>
                 <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Ulangi Password</p>
                    <input type="password" class="form-control" name="ulpw" placeholder="Masukkan password.." id="ulpw">
                </div>
                <div id="pwul-error"></div>
                <div class="row mb-3 mx-0">
                    <p class="text-left px-0 mb-1">Upload KTP</p>
                    <input type="file" id="ktp" name="ktp">
                </div>
                <div id="ktp-error"></div>
                <div class="row mb-3 mx-0 mt-5 pb-5" id="to-login">
                    <a href="#login" class="d-flex justify-content-center text-decoration-none">
                        <button type="button" class="btn mx-auto btn-register" id="btn-register">Daftar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>