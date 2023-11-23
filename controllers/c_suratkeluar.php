<?php
include_once "c_koneksi.php";
class c_suratkeluar
{
    public function insert($id, $nomor, $tanggal, $perihal, $tujuan)
    {
        $conn = new c_koneksi();
        $query = "INSERT INTO suratkeluar VALUES ('$id', '$nomor', '$tanggal', '$perihal', '$tujuan')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function read()
    {
        $conn = new c_koneksi();
        // perintah mengambil semua data dari transaksi dan mengurutkan sesuai data terbaru diatas
        $query = "SELECT * FROM suratkeluar ORDER BY id DESC";
        $data = mysqli_query($conn->conn(), $query);

        // mengubah query data menjadi objek
        while ($row = mysqli_fetch_object($data)) {
            // array kosong untuk menampung data objek
            $rows[] = $row;
        }

        // mengembalikan nilai

        if (!empty($rows)){
            return $rows;
        }
    }

    public function edit($id)
    {
        $conn = new c_koneksi();

        // perintah mengambil data dari barng berdasarkan id
        $query = "SELECT * FROM suratkeluar WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($id, $nomor, $tanggal, $perihal, $tujuan)
    {
        $conn = new c_koneksi();
        // perintah untuk update data dari barang 
        $query = "UPDATE suratkeluar SET nomor='$nomor', 
        tanggal='$tanggal', perihal='$perihal', tujuan='$tujuan' WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
   
    }

    public function delete($id)
    {
        $conn = new c_koneksi();

        // perintah untuk menghapus data dari barang berdasarkan id
        $query = "DELETE FROM suratkeluar WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);

        header("Location: ../views/suratkeluar.php");
    }
}
