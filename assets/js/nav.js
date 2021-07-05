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
                    if (page == 'beranda') new_project();
                } else if (this.status == 404){
                    content.innerHTML = "<p>Halaman tidak ditemukan</p>";
                } else{
                    content.innerHTML = "<p>Upss.. Halaman tidak dapat diakses</p>";
                }
            }
        };
        xhttp.open("GET", "application/view/index.php", true);
        xhttp.send();
    }

    function loadNav(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4){
                if (this.status != 200) return;
                document.querySelectorAll("navbar-nav").forEach(function(elm){
                    elm.innerHTML = xhttp.responseText;
                })
            }
        }
    }
});