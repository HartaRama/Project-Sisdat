<?php
// Koneksi ke database

$db = mysqli_connect("localhost", "root", "", "project_sisdat");

function query($query)
{
    global $db;

    //Menjalankan perintah query
    $result = mysqli_query($db, $query);

    //Deklarasi variabel kosong untuk menampung data yang dikeluarkan
    $kosong = [];

    //Ambil data
    while ($row = mysqli_fetch_assoc($result)) {
        $kosong[] = $row;
    }

    return $kosong;
}

function tambah($data)
{
    global $db;
    //Ambil data input
    $nomor_id = htmlspecialchars($data["nomor_id"]);
    $nama_penumpang = htmlspecialchars($data["nama_penumpang"]);
    $jk = htmlspecialchars($data["jk"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = htmlspecialchars($data["notelp"]);
    $kode_maskapai = htmlspecialchars($data["kode_maskapai"]);
    $nomor_kursi = htmlspecialchars($data["nomor_kursi"]);
    $jamterbang = htmlspecialchars($data["jamterbang"]);
    $nomor_rute = htmlspecialchars($data["nomor_rute"]);

    //query insert data penumpang
    $query = "INSERT INTO penumpang VALUES('$nomor_id', '$nama_penumpang','$jk','$alamat','$notelp')";

    mysqli_query($db, $query);

    //query insert data tiket
    $query1 = "INSERT INTO tiket VALUES('', '$nomor_kursi','$jamterbang','$nomor_rute','$nomor_id','$kode_maskapai')";

    mysqli_query($db, $query1);


    return mysqli_affected_rows($db);
}

function hapus($nomor_tiket)
{
    global $db;
    mysqli_query($db, "DELETE tiket, penumpang FROM tiket 
                        INNER JOIN penumpang ON tiket.nomor_id = penumpang.nomor_id 
                        WHERE nomor_tiket=$nomor_tiket");

    return mysqli_affected_rows($db);
}

function ubah($data)
{
    global $db;
    //Ambil data input
    $nomor_tiket = $data["nomor_tiket"];
    $nama_penumpang = htmlspecialchars($data["nama_penumpang"]);
    $jk = htmlspecialchars($data["jk"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = htmlspecialchars($data["notelp"]);
    $kode_maskapai = htmlspecialchars($data["kode_maskapai"]);
    $nomor_kursi = htmlspecialchars($data["nomor_kursi"]);
    $jamterbang = htmlspecialchars($data["jamterbang"]);
    $nomor_rute = htmlspecialchars($data["nomor_rute"]);


    //query insert data tiket dan penumpang
    $query1 = "UPDATE tiket, penumpang SET 
                
                penumpang.nama_penumpang = '$nama_penumpang', 
                penumpang.jk = '$jk',
                penumpang.alamat = '$alamat', 
                penumpang.notelp = '$notelp',
                tiket.nomor_kursi = '$nomor_kursi', 
                tiket.jamterbang = '$jamterbang', 
                tiket.nomor_rute = '$nomor_rute', 
                tiket.kode_maskapai = '$kode_maskapai' 
                WHERE nomor_tiket = $nomor_tiket
    ";

    mysqli_query($db, $query1);


    return mysqli_affected_rows($db);
}
