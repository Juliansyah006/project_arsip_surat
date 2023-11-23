
<?php
include_once "../controllers/c_suratmasuk.php";
$suratmasuk = new c_suratmasuk();

if ($_GET["aksi"] == "tambah") {
    $tanggal = $_POST["tanggal"];
    $nomor = $_POST["nomor"];
    $asal = $_POST["asal"];
    $perihal = $_POST["perihal"];
    $keterangan = $_POST["keterangan"];


    $suratmasuk->insert($id=0, $tanggal, $nomor, $asal, $perihal, $keterangan);

    if ($suratmasuk) {
        echo "<script> alert('Data berhasil di tambahkan!');
        document.location.href = '../views/suratmasuk.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "edit") {
    $id = $_POST["id"];
    $tanggal = $_POST["tanggal"];
    $nomor = $_POST["nomor"];
    $asal = $_POST["asal"];
    $perihal = $_POST["perihal"];
    $keterangan = $_POST["keterangan"];


    $suratmasuk->update($id, $tanggal, $nomor, $asal, $perihal, $keterangan);

    if ($suratmasuk) {
        echo "<script> alert('Data berhasil di ubah');
        document.location.href = '../views/suratmasuk.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "delete") {
    $id = $_GET["id"];
    $suratmasuk->delete($id);
}
