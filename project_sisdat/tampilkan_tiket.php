<?php
require 'functions.php';

// Query Data dari tabel tiket
$datatiket = query("SELECT * FROM tiket
INNER JOIN penumpang ON tiket.nomor_id = penumpang.nomor_id
INNER JOIN maskapai ON tiket.kode_maskapai = maskapai.kode_maskapai
INNER JOIN rute ON tiket.nomor_rute = rute.nomor_rute");

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Data Pemesanan Tiket Pesawat Terbang
    </title>
    <link rel="stylesheet" href="style.css">

</head>

<body class="rata">
    <h1>Data Pemesanan Tiket Pesawat Terbang</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <a href="tambah_tiket.php">Pesan Tiket</a>
            </td>
        </tr>
    </table>
    <br>
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <td>Aksi</td>
            <td>Nomor Tiket</td>
            <td>Nomor Kursi</td>
            <td>Jam Terbang</td>
            <td>Nama</td>
            <td>Nomor ID</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Nomor Telepon</td>
            <td>Nomor Maskapai</td>
            <td>Nama Maskapai</td>
            <td>Jenis Pesawat</td>
            <td>Nomor Rute</td>
            <td>Asal</td>
            <td>Tujuan</td>

        </tr>

        <?php foreach ($datatiket as $row) :  ?>
            <tr>
                <td>
                    <a href="ubah_data.php?id=<?= $row["nomor_tiket"]; ?>">Ubah Data</a> |
                    <a href="hapus_tiket.php?id=<?= $row["nomor_tiket"]; ?>" onclick="return confirm(
                        'Apakah Anda yakin ingin menghapus data ini?')">Hapus Data</a>
                </td>
                <td width="2"><?php echo $row["nomor_tiket"]; ?></td>
                <td width="2"><?php echo $row["nomor_kursi"]; ?></td>
                <td width="2"><?php echo $row["jamterbang"]; ?></td>
                <td><?php echo $row["nama_penumpang"]; ?></td>
                <td><?php echo $row["nomor_id"]; ?></td>
                <td width="2"><?php echo $row["jk"]; ?></td>
                <td><?php echo $row["alamat"]; ?></td>
                <td><?php echo $row["notelp"]; ?></td>
                <td><?php echo $row["kode_maskapai"]; ?></td>
                <td><?php echo $row["nama_maskapai"]; ?></td>
                <td><?php echo $row["jenis_pesawat"]; ?></td>
                <td><?php echo $row["nomor_rute"]; ?></td>
                <td width="2"><?php echo $row["asal"]; ?></td>
                <td><?php echo $row["tujuan"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>