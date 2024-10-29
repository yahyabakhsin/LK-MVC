<?php

class Main extends Controllers{
    private $dt; // Menyimpan instance model 'barang'
    private $df; // Menyimpan instance model 'daftarBarang'

    public function __construct(){
        // Inisialisasi objek model barang dan daftarBarang
        $this->dt = $this->loadmodel("barang"); 
        $this->df = $this->loadmodel("daftarBarang");
    }

    // Method untuk menampilkan pesan dari action index
    public function index(){
        echo "anda memanggil action index \n";
    }

    // Method untuk menampilkan pesan dari action home dengan parameter data1 dan data2
    public function home($data1, $data2){
        echo "anda memanggil action home dengan data1 = $data1 dan data2 = $data2 \n";
    }

    // Method untuk melihat detail data barang berdasarkan ID
    public function lihatdata($id){
        $data = $this->df->getDataById($id); // Mengambil data berdasarkan ID

        // Memuat view dengan tampilan header, konten detail barang, dan footer
        $this->loadview('template/header', ['title' => 'Detail Barang']);
        $this->loadview('home/detailbarang', $data);
        $this->loadview('template/footer');
    }

    // Method untuk menampilkan daftar semua barang
    public function listbarang(){
        $data = $this->df->getDataAll(); // Mengambil semua data barang

        // Memuat view dengan tampilan header, daftar barang, dan footer
        $this->loadview('template/header', ['title' => 'List Barang']);
        $this->loadview('home/listbarang', $data);
        $this->loadview('template/footer');
    }

    // Method untuk menambahkan barang baru
    public function insertBarang(){
        // Cek apakah ada data POST yang dikirim
        if (!empty($_POST)) {
            // Menambahkan barang baru jika data POST tersedia
            if ($this->df->tambahBarang($_POST)) {
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            }
        }

        // Memuat view untuk form penambahan barang
        $this->loadview('template/header', ['title' => 'Insert Barang']);
        $this->loadview('home/insert');
        $this->loadview('template/footer');
    }

    // Method untuk mengupdate data barang berdasarkan ID
    public function updateBarang($id){
        $data = $this->df->getDataById($id); // Mengambil data berdasarkan ID

        // Cek apakah ada data POST yang dikirim
        if (!empty($_POST)) {
            // Mengupdate data barang jika data POST tersedia
            if ($this->df->updateBarang($_POST)) {
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            }
        }

        // Memuat view untuk form update barang
        $this->loadview('template/header', ['title' => 'Update Barang']);
        $this->loadview('home/update', $data);
        $this->loadview('template/footer');
    }

    // Method untuk menghapus barang berdasarkan ID
    public function deleteBarang($id){
        $data = $this->df->getDataById($id); // Mengambil data berdasarkan ID

        // Menghapus data barang berdasarkan ID
        if ($this->df->hapusBarang($id)) {
            header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
            exit;
        }
    }
}
