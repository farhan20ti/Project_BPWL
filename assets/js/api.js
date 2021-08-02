const login_api = `http://localhost/Berasku/index.php/Api/GetUser`;
const berasInfo_api = "http://localhost/Berasku/index.php/Api/GetBeras";
var interval1;
var interval2;
var interval3;
var interval4;
var idberas;
var namaberas;
var hargakotor;
var jumlahberas = 1;
var methodpem;
var jenispem;
var norek;
var pengamberas;
var alamatrum;
var hargabersih;

var fetchApi = function(url){
	return fetch(url)
}

function auth(uname, pw, loadPage, page){
    fetchApi(login_api)
    .then(res => res.json())
    .then(function(data){
        let cred =  data['credentials']
        let len = cred.length;
        for (let i = 0; i < len; i++) {
            if (cred[i]['username'] === uname) {
                if (cred[i]['pass_user'] != CryptoJS.MD5(pw).toString()) {
                     $("#wrong").html('<div class="alert alert-danger" role="alert">Password anda salah!</div>');
                     break;
                } else {
                    namadetail = cred[i]['nama_user'];
                    nohpdetail = cred[i]['no_hp_user'];
                    localStorage.setItem("username", cred[i]['username']);
                    localStorage.setItem("id", cred[i]['id_user']);
                    localStorage.setItem("namauser", cred[i]['nama_user']);
                    localStorage.setItem("nohpuser", cred[i]['no_hp_user']);
                    let elm = document.querySelector("#btn-login a");
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                    break;
                }
            } else {
                $("#wrong").html('<div class="alert alert-danger" role="alert">Username anda salah!</div>');
            }
        }
    })
}

function insertUser(page, loadPage){
    $(document).ready(() => {
        $('#btn-register').click(() => {
            let stats = 1;
            let nama = $('#nama').val();
            let nohp = $('#nohp').val();
            let email = $('#email').val();
            let alamat = $('#alamat').val();
            let uname = $('#uname').val();
            let pw = CryptoJS.MD5($('#pw').val()).toString();
            let ulpw = CryptoJS.MD5($('#ulpw').val()).toString();
            let imgktp = $('#ktp')[0].files[0];
            if (nama != "") {
                $('#nama-error').html("")
                if (nohp != "") {
                    $('#nohp-error').html("")
                    if (email != "") {
                         $('#email-error').html("")
                         if (alamat != ""){
                             $('#alamat-error').html("")
                            if (uname != "") {
                                $('#uname-error').html("")
                                if (pw != CryptoJS.MD5("")) {
                                    $('#pw-error').html("")
                                    if (pw === ulpw) {
                                        $('#pwul-error').html("");
                                        if (imgktp['type'] != "image/png") {
                                            if (imgktp['type'] != "image/jpg") {
                                                if (imgktp['type'] != "image/jpeg") {
                                                    $('#ktp-error').html("<div class='alert alert-danger'> File KTP Harus Berupa Gambar (PNG, JPG, JPEG)! </div>")
                                                } else {
                                                    $('#ktp-error').html("")
                                                    stats = 0;
                                                }
                                            } else {
                                                $('#ktp-error').html("")
                                                stats = 0;
                                            }
                                        } else {
                                            $('#ktp-error').html("")
                                            stats = 0;
                                        }
                                    } else {
                                        $('#pwul-error').html("<div class='alert alert-danger'> Password Tidak Cocok! </div>")
                                    }
                                } else {
                                    $('#pw-error').html("<div class='alert alert-danger'> Password Harus Diisi! </div>")
                                }
                            } else {
                                $('#uname-error').html("<div class='alert alert-danger'> Username Harus Diisi! </div>")
                            }
                         } else {
                            $('#alamat-error').html("<div class='alert alert-danger'> Alamat Harus Diisi! </div>")
                         }
                    } else {
                        $('#email-error').html("<div class='alert alert-danger'> Email Harus Diisi! </div>")
                    }
                } else {
                    $('#nohp-error').html("<div class='alert alert-danger'> Nomor HP Harus Diisi! </div>")
                }
            } else {
                $('#nama-error').html("<div class='alert alert-danger'> Nama Harus Diisi! </div>")
            }
            if (stats == 0) {
                let form = $('#form')[0];
                let formData = new FormData(form);
                $.ajax({
                type: "POST",
                url: "http://localhost/Berasku/index.php/Api/InsertUser",
                data:formData,
                processData:false,
                contentType:false,
                success: function(data) {
                   let elm = document.querySelector("#to-login a");
                   page = elm.getAttribute("href").substr(1);
                   loadPage(page);
                }
              });            
            }
        })
    })
}

function userPage(page, loadPage){
    let id = localStorage.getItem('id');
     fetchApi(login_api+`?id=${id}`)
    .then(res => res.json())
    .then(function(data){
        var profile = '';
        let img = ``;
        if (data['userpage'][0]['profile_user'] == null) {
            img = ` <img src="../berasku/assets/img/plus2.png" class="profile-img mx-auto" id="img-profile">`;
        } else {
            img = `<img src="../berasku/assets/uploaded/user/${data['userpage'][0]['profile_user']}" class="profile-img mx-auto" id="img-profile">`
        }
        profile += `
        <form id="form-prof" enctype="multipart/form-data">
            <input type='hidden' id='id' name='id' value='${id}'>
            <input type='file' hidden="hidden" id='up-img' name='img-profile'>
        </form>
       ${img}
        <div id="img-error"></div>
        <div class="row mb-4 border-bottom">
            <p class="mb-0 px-0">Nama</p>
            <h6 class="px-0">${data['userpage'][0]['nama_user']}</h6>
        </div>
        <div class="row mb-4 border-bottom">
            <p class="mb-0 px-0">Email</p>
            <h6 class="px-0">${data['userpage'][0]['email_user']}</h6>
        </div>
         <div class="row mb-4 border-bottom">
            <p class="mb-0 px-0">No. Handphone</p>
            <h6 class="px-0">${data['userpage'][0]['no_hp_user']}</h6>
        </div>
        <div class="row mb-4 border-bottom">
            <p class="mb-0 px-0">Alamat</p>
            <h6 class="px-0">${data['userpage'][0]['alamat_user']}</h6>
        </div>
        <div class="row mb-4 border-bottom">
            <p class="mb-0 px-0">Username</p>
            <h6 class="px-0">${data['userpage'][0]['username']}</h6>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn">
                <i class="fas fa-pen"></i>
                Edit Profil
            </button>
        </div>
        <div class="row pt-4 pb-5" id="logout">
            <a href="#beranda" class="text-center">Keluar dari akun</a>
        </div>`
        let content_profile = document.getElementById("sudah-diatur");
        content_profile.innerHTML = profile;
        let img_click = document.querySelector('#img-profile');
        let file_click = document.querySelector('#up-img');
        let file_jquery = $('#up-img');
        let stats = 1;
        img_click.addEventListener('click', () => {
            file_click.click();
        })
        file_jquery.change(() => {
            $(this).attr("value", "");
            let imgprof = file_jquery[0].files[0];
            if (imgprof['type'] != "image/png") {
                if (imgprof['type'] != "image/jpg") {
                    if (imgprof['type'] != "image/jpeg") {
                        $('#img-error').html("<div class='alert alert-danger'> File Profile Harus Berupa Gambar (PNG, JPG, JPEG)! </div>")
                    } else {
                        $('#img-error').html("")
                        stats = 0;
                    }
                } else {
                    $('#img-error').html("")
                    stats = 0;
                }
            } else {
                $('#img-error').html("")
                stats = 0;
            }

            if (stats == 0) {
                let form = $('#form-prof')[0];
                let formData = new FormData(form);
                $.ajax({
                type: "POST",
                url: `http://localhost/Berasku/index.php/Api/EditImage`,
                data:formData,
                processData:false,
                contentType:false,
                success: function(data) {
                  fetchApi(login_api+`?id=${id}`)
                    .then(res => res.json())
                    .then(function(data){
                        $('#img-profile').attr("src", `../berasku/assets/uploaded/user/${data['userpage'][0]['profile_user']}`);
                    })
                }
              })
            }
        })
        document.querySelectorAll("#logout a").forEach(function(elm) {
            elm.addEventListener("click", function(event) {
                localStorage.removeItem("username");
                page = elm.getAttribute("href").substr(1);
                loadPage(page);
            });
        });
    })
}

function new_beras(loadPage){
     fetchApi(berasInfo_api)
    .then(res => res.json())
    .then(function(data){
        function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        var promo = '';
        var contents = '';
        let beras =  data['beras'];
        let len = beras.length;
        promo += `<div class="col-7 py-4 px-md-4 item-shop">
                    <p>Beras Anak daro harganya sedang turun lho. Buruan beli!</p>
                    <h5 class="d-inline">Rp. ${formatNumber(beras[2]['harga_beras'])}</h5><small>/10Kg</small>
                    <a href="#shop" class="text-decoration-none">
                        <button class="btn d-block mt-2 tombol-beli">Beli</button>
                    </a>
                </div>
                <div class="col-5 px-0">
                    <img src="../berasku/assets/img/beras1.jpg" alt="">
                </div>`;
        for (let i = 0; i < len; i++) {
            contents += 
                `
                    <div class="col-mb-4 item-shop mb-4" id="show-more">
                        <a href="#shop" class="text-dark text-decoration-none">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="../berasku/assets/uploaded/beras/${beras[i]['gambar_beras']}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-2">
                                    <div class="text-left">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">${beras[i]['nama_beras']}</h5>
                                        <!-- Product price-->
                                        <p class="d-inline">Rp. ${formatNumber(beras[i]['harga_beras'])}</p><small>/10Kg</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                `
        }
        contents+= `<div class="col mb-4 d-flex justify-content-center align-items-center" id="showMore">
                        <a href="#belanja" class="text-center text-dark">
                            <i class="fas fa-angle-right fa-3x"></i>
                            <p>Lihat lebih</p>
                        </a>
                    </div>`
        let content_beranda = document.getElementById("content-beranda");
        let promoEl = document.getElementById("promo");
        if (content_beranda != null && promo != null) {
            content_beranda.innerHTML = contents;
            promoEl.innerHTML = promo;
        }
    })
}

function allBeras(loadPage){
    fetchApi(berasInfo_api)
            .then(res => res.json())
            .then(function(data){
            function formatNumber(num) {
              return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
            }
            beras = data['allberas'];
            len = beras.length;
            belanja_cont = '';
            for (let i = 0; i < len; i++) {
            belanja_cont += 
                `
                   <div class="col-mb-4 item-shop mb-4" id="show-more">
                        <a href="#shop" class="text-dark text-decoration-none" value="${beras[i]['id_beras']}">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="../berasku/assets/uploaded/beras/${beras[i]['gambar_beras']}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-2">
                                    <div class="text-left">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">${beras[i]['nama_beras']}</h5>
                                        <!-- Product price-->
                                        <p class="d-inline">Rp. ${formatNumber(beras[i]['harga_beras'])}</p><small>/10Kg</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                `
            let content_belanja = document.getElementById("content-belanja")
            content_belanja.innerHTML = belanja_cont;
            document.querySelectorAll("#show-more a").forEach(function(elm) {
            elm.addEventListener("click", function(event) {
               idberas = elm.getAttribute("value");
                page = elm.getAttribute("href").substr(1);
                loadPage(page);
                clearInterval(interval1);
                clearInterval(interval2);
                clearInterval(interval3);
                clearInterval(interval4);
            });
        });
        }
    })
}

function pulenBeras(loadPage){
    fetchApi(berasInfo_api)
            .then(res => res.json())
            .then(function(data){
            function formatNumber(num) {
              return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
            }
            beras = data['pulenberas'];
            len = beras.length;
            belanja_cont = '';
            for (let i = 0; i < len; i++) {
            belanja_cont += 
                `
                    <div class="col-mb-4 item-shop mb-4" id="show-more">
                        <a href="#shop" class="text-dark text-decoration-none" value="${beras[i]['id_beras']}">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="../berasku/assets/uploaded/beras/${beras[i]['gambar_beras']}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-2">
                                    <div class="text-left">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">${beras[i]['nama_beras']}</h5>
                                        <!-- Product price-->
                                        <p class="d-inline">Rp. ${formatNumber(beras[i]['harga_beras'])}</p><small>/10Kg</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                `
            let content_belanja = document.getElementById("content-belanja")
            content_belanja.innerHTML = belanja_cont;
            document.querySelectorAll("#show-more a").forEach(function(elm) {
            elm.addEventListener("click", function(event) {
                idberas = elm.getAttribute("value");
                page = elm.getAttribute("href").substr(1);
                loadPage(page);
                clearInterval(interval1);
                clearInterval(interval2);
                clearInterval(interval3);
                clearInterval(interval4);
            });
        })
    }
})
}

function biasaBeras(loadPage){
    fetchApi(berasInfo_api)
            .then(res => res.json())
            .then(function(data){
            function formatNumber(num) {
              return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
            }
            beras = data['biasaberas'];
            len = beras.length;
            belanja_cont = '';
            for (let i = 0; i < len; i++) {
            belanja_cont += 
                `   
                    <div id="show-more">
                     <a href="#shop" class="text-dark text-decoration-none" value="${beras[i]['id_beras']}">
                        <div class="col-mb-4 item-shop mb-4" id="show-more">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="../berasku/assets/uploaded/beras/${beras[i]['gambar_beras']}" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-2">
                                        <div class="text-left">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">${beras[i]['nama_beras']}</h5>
                                            <!-- Product price-->
                                            <p class="d-inline">Rp. ${formatNumber(beras[i]['harga_beras'])}</p><small>/10Kg</small>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </a>
                    </div>
                `
            let content_belanja = document.getElementById("content-belanja")
            content_belanja.innerHTML = belanja_cont;
            document.querySelectorAll("#show-more a").forEach(function(elm) {
            elm.addEventListener("click", function(event) {
                idberas = elm.getAttribute("value");
                page = elm.getAttribute("href").substr(1);
                loadPage(page);
                clearInterval(interval1);
                clearInterval(interval2);
                clearInterval(interval3);
                clearInterval(interval4);
            });
        })
    }
})
}

function belanja(loadPage){
        let allButton = $('#all');
        let pulenButton = $('#pulen');
        let biasaButton = $('#biasa');
        let stats = 0;
        if (stats == 0) {
            interval1 = setInterval(() => {allBeras(loadPage)}, 500);
        }
        allButton.click(() => {
             allButton.addClass("btn-primary").removeClass("btn-outline-secondary");;
             pulenButton.addClass("btn-outline-secondary").removeClass("btn-primary");;
             biasaButton.addClass("btn-outline-secondary").removeClass("btn-primary");;
            if (typeof interval1 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval1);
            }
            if (typeof interval3 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval3);
            }
            if (typeof interval4 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval4);
            }
            stats = 1;
            interval2 = setInterval(() => {allBeras(loadPage)}, 500);
        })
        pulenButton.click(() => {
             allButton.addClass("btn-outline-secondary").removeClass("btn-primary");
             pulenButton.addClass("btn-primary").removeClass("btn-outline-secondary");
             biasaButton.addClass("btn-outline-secondary").removeClass("btn-primary");
            if (typeof interval1 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval1);
            }
            if (typeof interval2 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval2);
            }
            if (typeof interval4 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval4);
            }
            stats = 1;
            interval3 = setInterval(() => {pulenBeras(loadPage)}, 500);
        })
         biasaButton.click(() => {
             allButton.addClass("btn-outline-secondary").removeClass("btn-primary");
             pulenButton.addClass("btn-outline-secondary").removeClass("btn-primary");
             biasaButton.addClass("btn-primary").removeClass("btn-outline-secondary");
            if (typeof interval1 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval1);
            }
            if (typeof interval2 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval2);
            }
            if (typeof interval3 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval3);
            }
            stats = 1;
            interval4 = setInterval(() => {biasaBeras(loadPage)}, 500);
        })
         $('#home').click(() => {
            if (typeof interval1 === 'undefined') {
                 console.log("clear");
            } else {
                console.log("cleared");
                clearInterval(interval1);
            }
            if (typeof interval2 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval2);
            }
            if (typeof interval3 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval3);
            }
            if (typeof interval4 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval4);
            }
         })
         $('#order').click(() => {
            if (typeof interval1 === 'undefined') {
                 console.log("clear");
            } else {
                console.log("cleared");
                clearInterval(interval1);
            }
            if (typeof interval2 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval2);
            }
            if (typeof interval3 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval3);
            }
            if (typeof interval4 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval4);
            }
         })
         $('#profile').click(() => {
            if (typeof interval1 === 'undefined') {
                 console.log("clear");
            } else {
                console.log("cleared");
                clearInterval(interval1);
            }
            if (typeof interval2 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval2);
            }
            if (typeof interval3 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval3);
            }
            if (typeof interval4 === 'undefined') {
                 console.log("clear");
            } else {
                clearInterval(interval4);
            }
         })
}

function data_beras(loadPage){
     fetchApi(berasInfo_api+`?id=${idberas}`)
    .then(res => res.json())
    .then(function(data){
        function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        dataShop = data['semuaberas'];
        namaberas = dataShop[0]['nama_beras'];
        let shop = ''
        shop += `
            <div class="w-100 bg-danger shop-image p-0">
                <img src="../berasku/assets/uploaded/beras/${dataShop[0]['gambar_beras']}" alt="">
            </div>
            <div class="shop-title bg-content p-4 pb-2">
                <h5 class="mb-0">Beras ${dataShop[0]['nama_beras']}</h5>
                <h1 class="text-danger">${formatNumber(dataShop[0]['harga_beras'])} / 10 Kg</h1>
                <div class="mt-3 mb-3"></div>
                <div class="row text-danger mt-2 pt-3 border-top">
                    <div class="col-4 px-0 text-center mb-0">
                        <i class="fas fa-truck"></i>
                        <p class="text-service">Antar ke Rumah</p>
                    </div>
                    <div class="col-4 px-0 text-center mb-0">
                        <i class="fas fa-star"></i>
                        <p class="text-service">100% Asli</p>
                    </div>
                    <div class="col-4 px-0 text-center mb-0">
                        <i class="fas fa-credit-card"></i>
                        <p class="text-service">Cash & Credit</p>
                    </div>
                </div>
            </div>
            <div class="shop-detail bg-content mt-2 p-4 pb-2">
                <h5>Detail Produk</h5>
                <div>
                    <table class="table">
                        <tr class="my-2">
                            <td class="px-0">Stok</td>
                            <td class="px-0">: ${dataShop[0]['stok_beras']}Kg</td>
                        </tr>
                        <tr class="my-2">
                            <td class="px-0">Harga Ecer</td>
                            <td class="px-0">: Rp. ${formatNumber(dataShop[0]['harga_beras']/10)}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="shop-beli bg-content mt-2 p-4">
                <h5>Pesan berasmu (Kg)</h5>
                <div class="d-flex flex-row align-items-center pt-2">
                    <div class="px-2">
                        <button class="btn btn-white border py-0" id='minus'>
                            <h2>-</h2>
                        </button>
                    </div>
                    <div class="px-2">
                        <p class="mb-1" id="count" value="${jumlahberas}">${jumlahberas}</p>
                    </div>
                    <div class="px-2">
                        <button class="btn btn-white border py-0" id='plus'>
                            <h2>+</h2>
                        </button>
                    </div>
                    <div class="d-flex px-2" id="tombol-beli">
                        <a href="#step1">
                            <button class="btn btn-beli">Beli</button>
                        </a>
                    </div>
                </div>
            </div>
        `
        let content_shop = document.getElementById("content-shop")
        content_shop.innerHTML = shop;
        let plus = $('#plus');
        let minus = $('#minus');
        let counter = $('#count');
        plus.click(() => {
            jumlahberas++;
            counter.html(`${jumlahberas}`);
            counter.attr("value", `${jumlahberas}`)
        })
        minus.click(() => {
            if (jumlahberas == 1) {
                minus.prop("disabled");
            } else {
                minus.removeProp("disabled");
                 jumlahberas--;
                counter.html(`${jumlahberas}`);
                counter.attr("value", `${jumlahberas}`)
            }
        })
        document.querySelectorAll("#tombol-beli a").forEach(function(elm) {
            elm.addEventListener("click", function(event) {
                hargakotor = (dataShop[0]['harga_beras']/10) * jumlahberas;
                page = elm.getAttribute("href").substr(1);
                loadPage(page);
            });
    })
})
}

function step1(loadPage){
    let norekinp = $('#norek');
    $('#kredit').click(() => {
        methodpem = "Kredit";

    })
    $('#cash').click(() => {
        methodpem = "Cash";

    })
    $('input[type=radio][name=rad]').change(function() {
    if (this.value == 'transfer') {
        jenispem = "Transfer";
        norekinp.val("2210053674");
        norekinp.attr("readonly", true);
    }
    else if (this.value == 'tunai') {
        jenispem = "Tunai";

        norekinp.val(null);
        norekinp.attr("disabled", true);
    }
});
    document.querySelectorAll("#tombol-next a").forEach(function(elm) {
    elm.addEventListener("click", function(event) {
        if (norekinp.val() == "") {
            norek = null;

        } else {
            norek = norekinp.val();
        }
        page = elm.getAttribute("href").substr(1);
        loadPage(page);
    });
})
}

function step2(loadPage){
    let alamatinp = $('#alamatinp');
    $('input[type=radio][name=rad]').change(function() {
    if (this.value == 'ambil') {
        pengamberas = "Ambil";
        hargabersih = hargakotor;
        alamatinp.val(null);
        alamatinp.attr("disabled", true);
    }
    else if (this.value == 'antar') {
       pengamberas = "Antar";
       hargabersih = hargakotor + 5000;
        alamatinp.attr("disabled", false);
    }
});
    document.querySelectorAll("#tombol-next a").forEach(function(elm) {
    elm.addEventListener("click", function(event) {
        if (alamatinp.val() == null) {
            alamatrum = null;

        } else {
            alamatrum = alamatinp.val();

        }
        page = elm.getAttribute("href").substr(1);
        loadPage(page);
    });
})
}

function detail_page(loadPage){
    function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    let detail = '';
    detail += `
            <h3>Detail Pembelian</h3>
            <div class="mb-3 border p-3 rounded">
                <h6>Pembeli</h6>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>: ${localStorage.getItem("namauser")}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>: ${localStorage.getItem("nohpuser")}</td>
                    </tr>
                </table>
            </div>
            <div class="mb-3 border p-3 rounded">
                <h6>Barang:</h6>
                <table>
                    <tr>
                        <td>Nama Barang</td>
                        <td>: Beras ${namaberas}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pembelian</td>
                        <td>: ${jumlahberas}Kg</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>: Rp. ${formatNumber(hargakotor)}</td>
                    </tr>
                </table>
            </div>
            <div id="metodepembayaran"></div>
            <div id="penerimaan"></div>
            <div class="mb-3 border p-3 rounded">
                <h6>Total Pembayaran</h6>
                <table>
                    <tr>
                        <td>Harga Barang</td>
                        <td>Rp. ${formatNumber(hargakotor)}</td>
                    </tr>
                    <tr id="antarif">
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td>Rp. ${formatNumber(hargabersih)}</td>
                    </tr>
                </table>
            </div>
            <div class="mt-2 d-flex flex-row-reverse">
                <div class="d-flex flex-row-reverse p-4 px-0" id="tombol-next">
                    <a href="#order">
                        <button class="btn btn-success" style="width: 8rem;">Beli</button>
                    </a>
                </div>
            </div>
    `
    let content_detail = document.querySelector("#content-detail");
    content_detail.innerHTML = detail;
    let cash;
    let statsAntar;
    if (methodpem == "Cash") {
        cash = "selesai";
        if (jenispem == "Transfer") {
            $('#metodepembayaran').html('<div class="mb-3 border p-3 rounded"><h6>Pembayaran: Cash(Transfer)</h6> </div>')
        } else {
            $('#metodepembayaran').html('<div class="mb-3 border p-3 rounded"><h6>Pembayaran: Cash(Kredit)</h6> </div>')
        }
    } else {
        cash = "pending";
         if (jenispem == "Transfer") {
            $('#metodepembayaran').html('<div class="mb-3 border p-3 rounded"><h6>Pembayaran: Kredit(Transfer)</h6> </div>')
        } else {
            $('#metodepembayaran').html('<div class="mb-3 border p-3 rounded"><h6>Pembayaran: Kredit(Kredit)</h6> </div>')
        }
    }
    if (pengamberas == "Ambil") {
        $('#antarif').html('');
        $('#penerimaan').html('<div class="mb-3 border p-3 rounded"><h6>Ambil Barang di</h6><p>Jalan Nangka (Kantor Pusat Berasku)</p></div>');
    } else {
        statsAntar = "dikirim";
        $('#antarif').html('<td>Biaya antar </td><td> Rp. 5,000</td>');
        $('#penerimaan').html(`<div class="mb-3 border p-3 rounded"><h6>Barang di kirim ke</h6><p>${alamatrum}</p></div>`);
    }
    let iduserget = localStorage.getItem("id");
    let today = new Date();
    let todaydate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    let todayyear = today.getFullYear();
    let todaymonth;
    let todayday;
    if (today.getMonth()+1 < 10) {
        todaymonth = `0${today.getMonth()+1}`
    } else {
          todaymonth = today.getMonth()+1
    }
    if (today.getDate() < 10) {
        todayday =  `0${today.getDate()}`
    } else {
        todayday = today.getDate();
    }
    let todayfinal = todayyear+'-'+todaymonth+'-'+todayday;
    document.querySelectorAll("#tombol-next a").forEach(function(elm) {
    elm.addEventListener("click", function(event) {
        $.ajax({
        type: "POST",
        url: `http://localhost/Berasku/index.php/Api/InsertPembelian`,
        data:{idberas:idberas, iduser:iduserget, tgl_beli:todayfinal, jml_beli:jumlahberas, total_harga:hargabersih, metode_pembayaran:methodpem, jenis_pembayaran:jenispem, pengamberas:pengamberas, status:cash, no_rekening:norek},
        success: function(data) {
          page = elm.getAttribute("href").substr(1);
          loadPage(page);
        }
      })
    });
})
}

