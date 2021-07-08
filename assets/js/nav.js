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
                    goneNav(page);
                    removeAppBar(page);
                    content.innerHTML = xhttp.responseText;
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

    function backButton2(){
        document.querySelectorAll(".back a").forEach(function(elm) {
              elm.addEventListener("click", function(event) {
                page = elm.getAttribute("href").substr(1);
                loadPage(page);
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
        if(page == "login"){
            document.querySelector("#navbar").style.display = "none";
        } else {
            document.querySelector("#navbar").style.display = "block"
        }
    }
});