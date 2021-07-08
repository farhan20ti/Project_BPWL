if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
      navigator.serviceWorker
        .register("sw.js")
        .then(function(registration) {
          console.log("Pendaftaran ServiceWorker berhasil");
           if(!registration) return;
        	return registration.update();
        })
        .catch(function() {
          console.log("Pendaftaran Service Worker gagal");
        });

    });
  } else {
    console.log("ServiceWorker belum didukung browser ini.");
  }