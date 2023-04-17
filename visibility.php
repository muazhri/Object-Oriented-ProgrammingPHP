<?php 

class Produk {
    public $judul, 
           $penulis,
           $penerbit;


    protected $diskon = 0;
    private $harga;


    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

    }

    
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
    
    public function infoLengkap() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
    
    
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }


}

class Komik extends Produk {
    public $jmlHalaman;
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;

    }
    public function infoLengkap() {
        $str = "Komik : " . parent::infoLengkap() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }

}

class Game extends Produk {
    public $waktuMain;
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0 ){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;

    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }


    public function infoLengkap() {
        $str = "Game : " . parent::infoLengkap() . " - {$this->waktuMain} Jam.";
        return $str;
    }

}






class CetakInfoProduk {

    public function cetak( Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }

}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 25000, 50);

echo $produk1->InfoLengkap();
echo "<br>";
echo $produk2->infoLengkap();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();


