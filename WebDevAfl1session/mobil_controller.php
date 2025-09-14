<?php 
include("mobil_model.php");

session_start();

if (!isset($_SESSION['mobillist'])) {
    $_SESSION['mobillist'] = array();
}

function createMobil() {
    if (isset($_POST['inputNama']) && isset($_POST['inputWarna']) && 
        isset($_POST['inputPlatNomor']) && isset($_POST['inputTahunRilis']) &&
        isset($_POST['inputBrand'])) {
        
        $mobil = new mobil_model();
        $mobil->nama = $_POST['inputNama'];
        $mobil->warna = $_POST['inputWarna'];
        $mobil->plat_nomor = $_POST['inputPlatNomor'];
        $mobil->tahun_rilis = $_POST['inputTahunRilis'];
        $mobil->brand = $_POST['inputBrand'];
        
        array_push($_SESSION['mobillist'], $mobil);
        return true;
    }
    return false;
}

function getAllMobils() {
    return $_SESSION['mobillist'];
}

function deleteMobil($mobilIndex) {
    if (isset($_SESSION['mobillist'][$mobilIndex])) {
        unset($_SESSION['mobillist'][$mobilIndex]);
        $_SESSION['mobillist'] = array_values($_SESSION['mobillist']);
        return true;
    }
    return false;
}

function getMobilWithID($mobilID) {
    if (isset($_SESSION['mobillist'][$mobilID])) {
        return $_SESSION['mobillist'][$mobilID];
    }
    return null;
}

function updateMobil($mobilID) {
    if (isset($_SESSION['mobillist'][$mobilID]) && 
        isset($_POST['inputNama']) && isset($_POST['inputWarna']) && 
        isset($_POST['inputPlatNomor']) && isset($_POST['inputTahunRilis']) &&
        isset($_POST['inputBrand'])) {
        
        $mobil = $_SESSION['mobillist'][$mobilID];
        $mobil->nama = $_POST['inputNama'];
        $mobil->warna = $_POST['inputWarna'];
        $mobil->plat_nomor = $_POST['inputPlatNomor'];
        $mobil->tahun_rilis = $_POST['inputTahunRilis'];
        $mobil->brand = $_POST['inputBrand'];
        return true;
    }
    return false;
}

if (isset($_POST['button_register'])) {
    createMobil();
    header("Location:mobil_view.php");
}

if (isset($_GET['deleteID'])) {
    deleteMobil($_GET['deleteID']);
    header("Location:mobil_view.php");
}

if (isset($_POST['button_update'])) {
    updateMobil($_POST['input_id']);
    header("Location:mobil_view.php");
}

?>