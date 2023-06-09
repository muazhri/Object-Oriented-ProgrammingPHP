<?php 

class Produk {
    public $judul = "judul", 
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = 0,
           $jmlHalaman = 0,
           $waktuMain = 0,
           $tipe;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;

    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function infoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        if($this->tipe == "Komik") {
            $str.= " - {$this->jmlHalaman} Halaman.";
        } else if ($this->tipe == "Game"){
            $str.= " - {$this->waktuMain} Jam.";
        }

        return $str;
    }


}

class CetakInfoProduk {

    public function cetak( Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }

}


$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 25000, 0, 50, "Game");

echo $produk1->InfoLengkap();
echo "<br>";
echo $produk2->infoLengkap();


