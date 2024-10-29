<?php

class Tools extends Model {
    private $id;   // Properti untuk menyimpan ID barang
    private $nama; // Properti untuk menyimpan nama barang
    private $qty;  // Properti untuk menyimpan jumlah barang

    // Konstruktor untuk inisialisasi data default
    public function __construct() {
        $this->id = "B01";       // ID barang default
        $this->nama = "Beras";   // Nama barang default
        $this->qty = "100";      // Jumlah barang default
    }

    // Method untuk mendapatkan data dalam bentuk string
    public function getData() {
        return "Data yang diminta dari model barang: $this->nama, $this->id, $this->qty";
    }

    // Method untuk mendapatkan data dalam bentuk array
    public function getDataOne() {
        $data = [
            'id' => $this->id,     // ID barang
            'nama' => $this->nama, // Nama barang
            'qty' => $this->qty    // Jumlah barang
        ];
        return $data; // Mengembalikan data dalam bentuk array
    }
}
