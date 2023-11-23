<?php
include_once "c_koneksi.php";
class c_suratmasuk
{
    public function insert($id, $tanggal, $nomor, $asal, $perihal, $keterangan)
    {
        $conn = new c_koneksi();
        $query = "INSERT INTO suratmasuk VALUES ($id, '$tanggal', '$nomor', '$asal', '$perihal', '$keterangan')";
        $data = mysqli_query($conn->conn(), $query);
    }
    
    public function read()
    {
        $conn = new c_koneksi();
        // perintah mengambil semua data dari suratmasuk dan mengurutkan sesuai data terbaru diatas
        $query = "SELECT * FROM suratmasuk ORDER BY id DESC";
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
        $query = "SELECT * FROM suratmasuk WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($id, $tanggal, $nomor, $asal, $perihal, $keterangan)
    {
        $conn = new c_koneksi();
        // perintah untuk update data dari barang 
        $query = "UPDATE suratmasuk SET tanggal='$tanggal', 
        nomor='$nomor', perihal='$perihal', asal='$asal', keterangan='$keterangan' WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
   
    }

    public function delete($id)
    {
        $conn = new c_koneksi();

        // perintah untuk menghapus data dari barang berdasarkan id
        $query = "DELETE FROM suratmasuk WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);

        header("Location: ../views/suratmasuk.php");
    }
}
