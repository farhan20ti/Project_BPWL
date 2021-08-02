document.addEventListener("DOMContentLoaded", function(){
    loadNav();

    var page = window.location.hash.substr(1);
    if (page == "") page = "beranda";
    loadPage(page);
    
    function loadPage(page){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4){
                var content = document.querySelector("#body-content");
                if (this.status == 200){
                    content.innerHTML = xhttp.responseText;
                    goneNav(page);
                    goToShop(page);
                    toStep1(page);
                    kembali(page);
                    showMore(page);
                    login(page);
                    register(page);
                    if (page == "beranda") {
                        setInterval(() => {new_beras()}, 100);
                    } 
                    if (page == "belanja") {
                       belanja(loadPage);
                    }
                    if (page == "register") {
                        insertUser(page, loadPage);
                    }
                    if (page == "shop") {
                        data_beras(loadPage);
                    }
                    if (page == "step1") {
                        step1(loadPage);
                    }
                    if (page == "step2") {
                        step2(loadPage);
                    }
                    if (page == "detail") {
                        detail_page(loadPage);
                    }
                    profile(page);
                } else if (this.status == 404){
                    content.innerHTML = "<p>Halaman tidak ditemukan</p>";
                } else{
                    content.innerHTML = "<p>Upss.. Halaman tidak dapat diakses</p>";
                }
            }
        };
        xhttp.open("GET", "../berasku/pages/" + page +".php", true);
        xhttp.send();
    }

    function loadNav(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4){
                if (this.status != 200) return;
                document.querySelectorAll(".navbar-nav").forEach(function(elm){
                    elm.innerHTML = xhttp.responseText;
                });

                document.querySelectorAll(".nav-item a").forEach(function(elm){
                    elm.addEventListener("click", function(event){
                        page = elm.getAttribute("href").substr(1);
                        loadPage(page);
                    })
                });
            }
        }
        xhttp.open("GET", "nav/nav-links.php", true);
        xhttp.send();
    }

    function removeAppBar(page){
        if(page == "beranda" || page == "belanja" || page == "order" || page =="login"
            || page == "profile"){
            document.querySelector("#appbar").style.display = "none";
        } else{
            document.querySelector("#appbar").style.display = "block";
        }
    }

    function goneNav(page){
        if(page == "login" || page == "shop" || page == "step1" || page == "step2" || page == "detail"
            || page == "register"){
            document.querySelector("#navbar").style.display = "none";
        } else {
            document.querySelector("#navbar").style.display = "block"
        }
    }

    function goToShop(page){
        if(page == "beranda" || page == "belanja"){
            document.querySelectorAll(".item-shop a").forEach(function(elm){
                elm.addEventListener("click", function(event){
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                })
            });
        }
    }

    function toStep1(page){
        if(page == "shop"){
            document.querySelectorAll("#tombol-beli a").forEach(function(elm) {
                elm.addEventListener("click", function(event) {
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                });
            });
        }
    }

    function showMore(page){
        if(page == "beranda"){
            document.querySelectorAll("#showMore a").forEach(function(elm) {
                elm.addEventListener("click", function(event) {
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                });
            });
        }
    }

    function kembali(page){
        if(page == "shop" || page == "step1" || page == "step2" || page == "detail"){
            document.querySelectorAll("#tombolKembali a").forEach(function(elm) {
                elm.addEventListener("click", function(event) {
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                });
            });
        }
    }

    function register(page){
        if(page == "login"){
            document.querySelectorAll("#btn-register a").forEach(function(elm) {
                elm.addEventListener("click", function(event) {
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                });
            });
        }
    }

    function profile (page){
        if(page == "profile"){
            if (localStorage.getItem("username") == null) {
                $('#sudah-diatur').addClass("d-none").removeClass("d-block");
                $('#belum-diatur').addClass("d-block").removeClass("d-none");
                document.querySelectorAll("#btn-belum-diatur a").forEach(function(elm) {
                    elm.addEventListener("click", function(event) {
                        page = elm.getAttribute("href").substr(1);
                        loadPage(page);
                    });
                });
            } else {
                userPage(page, loadPage);
                $('#belum-diatur').addClass("d-none").removeClass("d-block");
                $('#sudah-diatur').addClass("d-block").removeClass("d-none");
            }
        }
    }

    function login(page){
        if(page == "login"){
            $(document).ready(()=>{
                $('#btn-login').click(()=>{
                    let uname = $('#username').val();
                    let pw = $('#password').val();
                    auth(uname, pw, loadPage, page);
                });
            })
        }
    }
});