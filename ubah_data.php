<?php require 'functions.php';
//Menangkap id dari tombol Ubah
$id = $_GET["id"];

//Query Update
$penumpang = query("SELECT * FROM tiket
INNER JOIN penumpang ON tiket.nomor_id = penumpang.nomor_id
INNER JOIN maskapai ON tiket.kode_maskapai = maskapai.kode_maskapai
INNER JOIN rute ON tiket.nomor_rute = rute.nomor_rute
WHERE nomor_tiket = $id")[0];

//Cek apakah submit sudah ditekan
if (isset($_POST["submit"])) {
    //Cek apakah data sudah diubah
    if (ubah($_POST) > 0) {
        echo "
        <script> 
        alert('Data berhasil diubah!');
         document.location.href='tampilkan_tiket.php';
        </script>
        ";
    } else {

        echo "
        <script> 
        alert('Data gagal diubah!');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Form Ubah Tiket
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="rata">
    <h1>Ubah Tiket Pesawat</h1>
    <form action="" method="POST">
        <input type="hidden" name="nomor_tiket" value="<?= $penumpang["nomor_tiket"]; ?>">

        <table border="1" cellspacing="0" cellpadding="10" align="center">
            <tr>
                <td><label for="nomorid">Ubah Nomor ID </label>
                    <br>
                    (Nomor ID tidak dapat diubah kembali)
                </td>
                <td>
                    <?= $penumpang["nomor_id"]; ?>
                </td>
            </tr>
            <tr>
                <td><label for="nama">Ubah Nama</label></td>
                <td><input type="text" id="nama" name="nama_penumpang" value="<?= $penumpang["nama_penumpang"]; ?>" required></td>
            </tr>
            <tr>
                <td><label for="Pria">Ubah Jenis Kelamin</label></td>

                <td colspan="2">
                    <input type="radio" name="jk" id="Pria" value="Pria" <?= ($penumpang["jk"] == 'Pria') ? "checked" : "" ?>>
                    <label for="Pria">Pria</label></input>
                    <input type="radio" name="jk" id="Wanita" value="Wanita" <?= ($penumpang["jk"] == 'Wanita') ? "checked" : "" ?>>
                    <label for="Wanita">Wanita</label></input>
                </td>
            </tr>
            <tr>
                <td><label for="alamat">Ubah Alamat</label></td>
                <td><textarea id="alamat" cols="30" rows="10" name="alamat" required><?= $penumpang["alamat"]; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="notelp">Ubah Nomor Telepon</label></td>
                <td><input type="text" id="notelp" name="notelp" value="<?= $penumpang["notelp"]; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nama_maskapai">Ubah Maskapai</label></td>
                <td>
                    <select id="nama_maskapai" name="kode_maskapai">
                        <option disabled selected value="">-- Pilih Maskapai --</option>
                        <optgroup label="Garuda Indonesia">
                            <option value="GA-1" <?= ($penumpang["kode_maskapai"] == 'GA-1') ? "selected" : "" ?>>Garuda Indonesia - VIP</option>
                            <option value="GA-2" <?= ($penumpang["kode_maskapai"] == 'GA-2') ? "selected" : "" ?>>Garuda Indonesia - Business</option>
                            <option value="GA-3" <?= ($penumpang["kode_maskapai"] == 'GA-3') ? "selected" : "" ?>>Garuda Indonesia - Economy</option>
                        </optgroup>
                        <optgroup label="Batik Air">
                            <option value="BA-1" <?= ($penumpang["kode_maskapai"] == 'BA-1') ? "selected" : "" ?>>Batik Air - VIP</option>
                            <option value="BA-2" <?= ($penumpang["kode_maskapai"] == 'BA-2') ? "selected" : "" ?>>Batik Air - Business</option>
                            <option value="BA-3" <?= ($penumpang["kode_maskapai"] == 'BA-3') ? "selected" : "" ?>>Batik Air - Economy</option>
                        </optgroup>
                        <optgroup label="Citilink">
                            <option value="CI-1" <?= ($penumpang["kode_maskapai"] == 'CI-1') ? "selected" : "" ?>>Citilink - VIP</option>
                            <option value="CI-2" <?= ($penumpang["kode_maskapai"] == 'CI-2') ? "selected" : "" ?>>Citilink - Business</option>
                            <option value="CI-3" <?= ($penumpang["kode_maskapai"] == 'CI-3') ? "selected" : "" ?>>Citilink - Economy</option>
                        </optgroup>
                        <optgroup label="Lion Air">
                            <option value="LI-1" <?= ($penumpang["kode_maskapai"] == 'LI-1') ? "selected" : "" ?>>Lion Air - VIP</option>
                            <option value="LI-2" <?= ($penumpang["kode_maskapai"] == 'LI-2') ? "selected" : "" ?>>Lion Air - Business</option>
                            <option value="LI-3" <?= ($penumpang["kode_maskapai"] == 'LI-3') ? "selected" : "" ?>>Lion Air - Economy</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="nomor_kursi">Ubah Nomor Kursi</label></td>
                <td>
                    <select name="nomor_kursi" id="nomor_kursi">
                        <option disabled selected value="">-- Pilih Kursi --</option>
                        <optgroup label="Kursi 1">
                            <option value="1A" <?= ($penumpang["nomor_kursi"] == '1A') ? "selected" : "" ?>>1A</option>
                            <option value="1C" <?= ($penumpang["nomor_kursi"] == '1C') ? "selected" : "" ?>>1C</option>
                            <option value="1E" <?= ($penumpang["nomor_kursi"] == '1E') ? "selected" : "" ?>>1E</option>
                            <option value="1F" <?= ($penumpang["nomor_kursi"] == '1F') ? "selected" : "" ?>>1F</option>
                        </optgroup>
                        <optgroup label="Kursi 2">
                            <option value="2A" <?= ($penumpang["nomor_kursi"] == '2A') ? "selected" : "" ?>>2A</option>
                            <option value="2C" <?= ($penumpang["nomor_kursi"] == '2C') ? "selected" : "" ?>>2C</option>
                            <option value="2E" <?= ($penumpang["nomor_kursi"] == '2E') ? "selected" : "" ?>>2E</option>
                            <option value="2F" <?= ($penumpang["nomor_kursi"] == '2F') ? "selected" : "" ?>>2F</option>
                        </optgroup>
                        <optgroup label="Kursi 3">
                            <option value="3A" <?= ($penumpang["nomor_kursi"] == '3A') ? "selected" : "" ?>>3A</option>
                            <option value="3C" <?= ($penumpang["nomor_kursi"] == '3C') ? "selected" : "" ?>>3C</option>
                            <option value="3E" <?= ($penumpang["nomor_kursi"] == '3E') ? "selected" : "" ?>>3E</option>
                            <option value="3F" <?= ($penumpang["nomor_kursi"] == '3F') ? "selected" : "" ?>>3F</option>
                        </optgroup>
                        <optgroup label="Kursi 4">
                            <option value="4A" <?= ($penumpang["nomor_kursi"] == '4A') ? "selected" : "" ?>>4A</option>
                            <option value="4C" <?= ($penumpang["nomor_kursi"] == '4C') ? "selected" : "" ?>>4C</option>
                            <option value="4E" <?= ($penumpang["nomor_kursi"] == '4E') ? "selected" : "" ?>>4E</option>
                            <option value="4F" <?= ($penumpang["nomor_kursi"] == '4F') ? "selected" : "" ?>>4F</option>
                        </optgroup>
                        <optgroup label="Kursi 5">
                            <option value="5A" <?= ($penumpang["nomor_kursi"] == '5A') ? "selected" : "" ?>>5A</option>
                            <option value="5C" <?= ($penumpang["nomor_kursi"] == '5C') ? "selected" : "" ?>>5C</option>
                            <option value="5E" <?= ($penumpang["nomor_kursi"] == '5E') ? "selected" : "" ?>>5E</option>
                            <option value="5F" <?= ($penumpang["nomor_kursi"] == '5F') ? "selected" : "" ?>>5F</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jamterbang">Ubah Jam Berangkat</label></td>
                <td> <select name="jamterbang" id="jamterbang">
                        <option disabled selected value="">-- Pilih Jam Terbang --</option>
                        <option value="08:00" <?= ($penumpang["jamterbang"] == '08:00') ? "selected" : "" ?>>08:00</option>
                        <option value="12:00" <?= ($penumpang["jamterbang"] == '12:00') ? "selected" : "" ?>>12:00</option>
                        <option value="16:00" <?= ($penumpang["jamterbang"] == '16:00') ? "selected" : "" ?>>16:00</option>
                        <option value="20:00" <?= ($penumpang["jamterbang"] == '20:00') ? "selected" : "" ?>>20:00</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="asal">Ubah Asal - Tujuan</label>
                </td>
                <td>
                    <select id="asal" name="nomor_rute">

                        <option disabled selected value="">-- Pilih Kota Asal dan Tujuan --</option>
                        <optgroup label="Bandung">
                            <option value="621" <?= ($penumpang["nomor_rute"] == '621') ? "selected" : "" ?>>Bandung - Bandar Lampung</option>
                            <option value="622" <?= ($penumpang["nomor_rute"] == '622') ? "selected" : "" ?>>Bandung - Tangerang</option>
                        </optgroup>
                        <optgroup label="Bandar Lampung">
                            <option value="623" <?= ($penumpang["nomor_rute"] == '623') ? "selected" : "" ?>>Bandar Lampung - Bandung</option>
                            <option value="624" <?= ($penumpang["nomor_rute"] == '624') ? "selected" : "" ?>>Bandar Lampung - Tangerang</option>
                        </optgroup>
                        <optgroup label="Tangerang">
                            <option value="625" <?= ($penumpang["nomor_rute"] == '625') ? "selected" : "" ?>>Tangerang - Bandung</option>
                            <option value="626" <?= ($penumpang["nomor_rute"] == '626') ? "selected" : "" ?>>Tangerang - Bandar Lampung</option>
                        </optgroup>

                    </select>
                </td>
            </tr>
        </table>
        <hr>
        <button type="submit" name="submit" onclick="return confirm('Apakah Anda yakin ingin mengubah data?')
        ">Ubah Data</button> |
        <button type="reset" name="reset"><a href="tampilkan_tiket.php">Cancel</a></button>
    </form>
</body>

</html>