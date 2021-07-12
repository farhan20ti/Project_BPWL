document.addEventListener("DOMContentLoaded", function(){
    loadNav();

    var page = window.location.hash.substr(1);
    if (page == "") page = "beranda";
    loadPage(page);
    var pageToBack = "";

    function loadPage(page){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4){
                var content = document.querySelector("#body-content");
                if (this.status == 200){
                    content.innerHTML = xhttp.responseText;
                    goneNav(page);
                    removeAppBar(page);
                    goToShop(page);
                    backButton(page);
                    toStep1(page);
                    btnSelanjutnya(page);
                    showMore(page);
                    logout(page);
                    register(page);
                    login(page);
                    toLogin(page);
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

    function backButton(page){
        document.querySelectorAll("#btn-back").forEach(function(elm) {
            elm.addEventListener("click", function(event) {
                loadPage(getPageToBack(page));
            });
        });
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

    function btnSelanjutnya(page){
        if(page == "step1" || page == "step2" || page == "detail"){
            document.querySelectorAll("#tombol-next a").forEach(function(elm) {
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

    function getPageToBack(page){
        if(page == "shop"){
            return pageToBack = "belanja";
        }
    }

    function toLogin(page){
        if(page == "register"){
            document.querySelectorAll("#daftar a").forEach(function(elm) {
                elm.addEventListener("click", function(event) {
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                });
            });
        }
    }

    function logout(page){
        if(page == "profile"){
            document.querySelectorAll("#logout a").forEach(function(elm) {
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

    function login(page){
        if(page == "login"){
            document.querySelectorAll("#btn-login a").forEach(function(elm) {
                elm.addEventListener("click", function(event) {
                    page = elm.getAttribute("href").substr(1);
                    loadPage(page);
                });
            });
        }
    }
});