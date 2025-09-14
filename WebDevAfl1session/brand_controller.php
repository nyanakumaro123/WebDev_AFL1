<?php
include ("brand_model.php");

$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    if (isset($_POST['nama_brand']) && isset($_POST['asal_brand'])) {
        $brand->addBrand($_POST['nama_brand'], $_POST['asal_brand']);
        header('Location: brand_view.php?status=success');
        exit();
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $brand->deleteBrand($_GET['id']);
    header('Location: brand_view.php?status=success');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    if (isset($_POST['id']) && isset($_POST['nama_brand']) && isset($_POST['asal_brand'])) {
        $brand->updateBrand($_POST['id'], $_POST['nama_brand'], $_POST['asal_brand']);
        header('Location: brand_view.php?status=success');
        exit();
    }
}
$brands = $brand->getAllBrands();
?>