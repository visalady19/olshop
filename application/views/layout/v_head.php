<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Men.shoesss | be cool</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>template/dist/js/demo.js"></script>
  <!-- JavaScript for Search Functionality -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button");

    // Event listener untuk tombol pencarian
    searchButton.addEventListener("click", function() {
        const searchTerm = searchInput.value.trim();
        if (searchTerm !== "") {
            // Menggunakan AJAX atau fetch untuk mengirim permintaan pencarian ke controller
            searchWithController(searchTerm);
        }
    });

    // Event listener untuk input teks (jika Enter ditekan)
    searchInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            const searchTerm = searchInput.value.trim();
            if (searchTerm !== "") {
                // Menggunakan AJAX atau fetch untuk mengirim permintaan pencarian ke controller
                searchWithController(searchTerm);
            }
        }
    });

    // Fungsi untuk melakukan pencarian dengan menghubungkan ke controller
    function searchWithController(searchTerm) {
        // Ganti 'home' dengan controller dan fungsi yang sesuai
        const searchURL = `/home/search?q=${searchTerm}`;
        
        // Menggunakan AJAX untuk mengirim permintaan GET ke controller
        const xhr = new XMLHttpRequest();
        xhr.open("GET", searchURL, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Redirect ke halaman pencarian dengan hasil pencarian
                window.location.href = searchURL;
            }
        };
        xhr.send();
        }
    });

  </script>

</head>