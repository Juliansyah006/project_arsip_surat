
<?php
include_once "../controllers/c_suratkeluar.php";
$suratkeluar = new c_suratkeluar();

if ($_GET["aksi"] == "tambah") {
    $id = $_POST["id"];
    $nomor = $_POST["nomor"];
    $tanggal = $_POST["tanggal"];
    $perihal = $_POST["perihal"];
    $tujuan = $_POST["tujuan"];

    $suratkeluar->insert($id, $nomor, $tanggal, $perihal, $tujuan);

    if ($suratkeluar) {
        echo "<script> alert('Data berhasil di tambahkan!');
        document.location.href = '../views/suratkeluar.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "edit") {
    $id = $_POST["id"];
    $nomor = $_POST["nomor"];
    $tanggal = $_POST["tanggal"];
    $perihal = $_POST["perihal"];
    $tujuan = $_POST["tujuan"];


    $suratkeluar->update($id, $nomor, $tanggal, $perihal, $tujuan);

    if ($suratkeluar) {
        echo "<script> alert('Data berhasil di ubah');
        document.location.href = '../views/suratkeluar.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "delete") {
    $id = $_GET["id"];
    $suratkeluar->delete($id);
}
