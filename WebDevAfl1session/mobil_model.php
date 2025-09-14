<?php 
class mobil_model 
{
    public $mobil_id;
    public $nama;
    public $warna;
    public $plat_nomor;
    public $tahun_rilis;
    public $brand; 
    
    public function __construct($mobil_id = "", $nama = "", $warna = "", $plat_nomor = "", $tahun_rilis = "", $brand = "") {
        $this->mobil_id = $mobil_id;
        $this->nama = $nama;
        $this->warna = $warna;
        $this->plat_nomor = $plat_nomor;
        $this->tahun_rilis = $tahun_rilis;
        $this->brand = $brand;
    }
}
?>