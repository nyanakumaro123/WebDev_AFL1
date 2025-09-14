<?php 
class mobil_model 
{
    public $nama;
    public $warna;
    public $plat_nomor;
    public $tahun_rilis;
    public $brand; 
    
    public function __construct($nama = "", $warna = "", $plat_nomor = "", $tahun_rilis = "", $brand = "") {
        $this->nama = $nama;
        $this->warna = $warna;
        $this->plat_nomor = $plat_nomor;
        $this->tahun_rilis = $tahun_rilis;
        $this->brand = $brand;
    }
}
?>