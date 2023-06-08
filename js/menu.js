var btnPesan = document.getElementById("pesan");
var pesansekarang = document.getElementById("pesansekarang");
btnPesan.addEventListener("click", function () {
  // alert('Anda sedang memesan sekarang!');
  var xhr = new XMLHttpRequest();

  // Cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      pesansekarang.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "Website/ajax/pesan_sekarang.php", true);
  xhr.send();
});
