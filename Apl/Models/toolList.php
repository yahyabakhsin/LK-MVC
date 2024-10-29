<?php

class TollList extends Model {
    private $daftar = []; // Array untuk menyimpan daftar barang sementara

    // Method untuk mengambil semua data dari tabel 'daftarBarang'
    public function getDataAll() {
        $stmt = "SELECT * FROM daftarBarang"; // SQL untuk mengambil semua data
        $query = $this->db->query($stmt); // Eksekusi query
        $data = [];

        // Mengambil hasil query baris per baris
        while ($result = $this->db->fetch_array($query)) {
            $data[] = $result; // Menambahkan setiap hasil ke array data
        }

        return $data; // Mengembalikan array data
    }

    // Method untuk mengambil data barang berdasarkan ID tertentu
    public function getDataById($id) {
        $stmt = "SELECT * FROM daftarBarang WHERE id = $id"; // SQL untuk mengambil data berdasarkan ID
        $query = $this->db->query($stmt); // Eksekusi query
        $data = $this->db->fetch_array($query); // Mengambil hasil query

        return $data; // Mengembalikan data yang ditemukan
    }

    // Method untuk menambahkan barang baru ke tabel 'daftarBarang'
    public function tambahBarang($param) {
        $stmt = "INSERT INTO daftarBarang (nama, qty) VALUES (:nama, :qty)"; // SQL untuk insert data
        $query = $this->db->query($stmt, $param); // Eksekusi query dengan parameter

        // Memeriksa apakah data berhasil ditambahkan berdasarkan ID terakhir yang dihasilkan
        if ($this->db->last_id() > 0) {
            return true; // Sukses
        } else {
            return false; // Gagal
        }
    }

    // Method untuk mengupdate data barang berdasarkan ID
    public function updateBarang($param) {
        $stmt = "UPDATE daftarBarang SET nama = :nama, qty = :qty WHERE id = :id"; // SQL untuk update data
        $query = $this->db->query($stmt, $param); // Eksekusi query dengan parameter

        // Memeriksa apakah ada baris yang terpengaruh setelah update
        if ($query->rowCount() > 0) {
            return true; // Sukses
        } else {
            return false; // Gagal
        }
    }

    // Method untuk menghapus barang dari tabel 'daftarBarang' berdasarkan ID
    public function hapusBarang($id) {
        $stmt = "DELETE FROM daftarBarang WHERE id = $id"; // SQL untuk delete data berdasarkan ID
        $query = $this->db->query($stmt); // Eksekusi query

        // Memeriksa apakah ada baris yang terpengaruh setelah delete
        if ($query->rowCount() > 0) {
            return true; // Sukses
        } else {
            return false; // Gagal
        }
    }
}
