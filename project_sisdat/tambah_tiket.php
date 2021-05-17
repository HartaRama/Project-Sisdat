<?php require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script> 
        alert('Data berhasil ditambahkan!');
         document.location.href='tampilkan_tiket.php';
        </script>
        ";
    } else {
        echo "
        <script> 
        alert('Data gagal ditambahkan!');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Form Pemesanan Tiket
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="rata">
    <h1>Pesan Tiket Pesawat</h1>
    <form action="" method="POST">
        <table border="1" cellspacing="0" cellpadding="10" align="center">
            <tr>
                <td><label for="nomorid">Nomor ID</label></td>
                <td><input type="text" id="nomorid" name="nomor_id" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama_penumpang" required></td>
            </tr>
            <tr>
                <td><label for="Pria">Jenis Kelamin</label></td>
                <td colspan="2"><input type="radio" name="jk" id="Pria" value="Pria" required><label for="Pria">Pria</label></input>
                    <input type="radio" name="jk" id="Wanita" value="Wanita" required><label for="Wanita">Wanita</label></input>
                </td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><textarea id="alamat" cols="30" rows="10" name="alamat" required></textarea></td>
            </tr>
            <tr>
                <td><label for="notelp">Nomor Telepon</label></td>
                <td><input type="text" id="notelp" name="notelp" required></td>
            </tr>
            <tr>
                <td><label for="nama_maskapai">Nama Maskapai</label></td>
                <td>
                    <select id="nama_maskapai" name="kode_maskapai" required>
                        <option disabled selected value="">-- Pilih Maskapai --</option>
                        <optgroup label="Garuda Indonesia">
                            <option value="GA-1">Garuda Indonesia - VIP</option>
                            <option value="GA-2">Garuda Indonesia - Business</option>
                            <option value="GA-3">Garuda Indonesia - Economy</option>
                        </optgroup>
                        <optgroup label="Batik Air">
                            <option value="BA-1">Batik Air - VIP</option>
                            <option value="BA-2">Batik Air - Business</option>
                            <option value="BA-3">Batik Air - Economy</option>
                        </optgroup>
                        <optgroup label="Citilink">
                            <option value="CI-1">Citilink - VIP</option>
                            <option value="CI-2">Citilink - Business</option>
                            <option value="CI-3">Citilink - Economy</option>
                        </optgroup>
                        <optgroup label="Lion Air">
                            <option value="LI-1">Lion Air - VIP</option>
                            <option value="LI-2">Lion Air - Business</option>
                            <option value="LI-3">Lion Air - Economy</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="nomor_kursi">Nomor Kursi</label></td>
                <td>
                    <select name="nomor_kursi" id="nomor_kursi" required>
                        <option disabled selected value="">-- Pilih Kursi --</option>
                        <optgroup label="Kursi 1">
                            <option value="1A">1A</option>
                            <option value="1C">1C</option>
                            <option value="1E">1E</option>
                            <option value="1F">1F</option>
                        </optgroup>
                        <optgroup label="Kursi 2">
                            <option value="2A">2A</option>
                            <option value="2C">2C</option>
                            <option value="2E">2E</option>
                            <option value="2F">2F</option>
                        </optgroup>
                        <optgroup label="Kursi 3">
                            <option value="3A">3A</option>
                            <option value="3C">3C</option>
                            <option value="3E">3E</option>
                            <option value="3F">3F</option>
                        </optgroup>
                        <optgroup label="Kursi 4">
                            <option value="4A">4A</option>
                            <option value="4C">4C</option>
                            <option value="4E">4E</option>
                            <option value="4F">4F</option>
                        </optgroup>
                        <optgroup label="Kursi 5">
                            <option value="5A">5A</option>
                            <option value="5C">5C</option>
                            <option value="5E">5E</option>
                            <option value="5F">5F</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jamterbang">Jam Berangkat</label></td>
                <td> <select name="jamterbang" id="jamterbang" required>
                        <option disabled selected value=""> -- Pilih Jam Terbang --</option>
                        <option value="08:00">08:00</option>
                        <option value="12:00">12:00</option>
                        <option value="16:00">16:00</option>
                        <option value="20:00">20:00</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="asal">Asal - Tujuan</label>
                </td>
                <td>
                    <select id="asal" name="nomor_rute" required>
                        <option disabled selected value="">-- Pilih Kota Asal dan Tujuan --</option>
                        <optgroup label="Bandung">
                            <option value="621">Bandung - Bandar Lampung</option>
                            <option value="622">Bandung - Tangerang</option>
                        </optgroup>
                        <optgroup label="Bandar Lampung">
                            <option value="623">Bandar Lampung - Bandung</option>
                            <option value="624">Bandar Lampung - Tangerang</option>
                        </optgroup>
                        <optgroup label="Tangerang">
                            <option value="625">Tangerang - Bandung</option>
                            <option value="626">Tangerang - Bandar Lampung</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
        </table>
        <p> <strong>
                PERHATIAN!
            </strong>
            Harap memasukkan Nomor ID dengan teliti. Dikarenakan Nomor ID tidak dapat diubah jika terdapat kesalahan
        </p>
        <hr>
        <button type="submit" name="submit" onclick=" return confirm('Yakin data yang dimasukkan sudah benar?')
        ">Submit</button> |
        <button type="reset" name="reset"> <a href="tampilkan_tiket.php">Cancel</a></button>
    </form>
</body>

</html>