<?php

require 'functions.php';

$nomor_tiket = $_GET["id"];

if (hapus($nomor_tiket) > 0) {
    echo "
    <script> 
    alert('Data berhasil dihapus!');
    document.location.href='tampilkan_tiket.php';
    </script>
    ";
} else {
    echo "
    <script> 
    alert('Data gagal dihapus!');
    document.location.href='tampilkan_tiket.php';
    </script>
    ";
}
