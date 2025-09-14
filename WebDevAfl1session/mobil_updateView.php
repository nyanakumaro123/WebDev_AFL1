<?php 
require("mobil_controller.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("brand_controller.php");

if (isset($_GET['updateID'])) {
    $mobil_id = $_GET['updateID'];
    $mobil = getMobilWithID($mobil_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Update</title>
</head>
<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="brand_view.php">Brand List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="mobil_view.php">Mobil List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mobil_addView.php">New Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>Update Mobil</h1>
                <?php if (isset($mobil) && $mobil != null): ?>
                <form method="POST" action="mobil_controller.php" class="row g-3 w-75 mx-auto">
                    <div class="col-12">
                        <label for="inputNama" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" name="inputNama" value="<?= htmlspecialchars($mobil->nama) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputWarna" class="form-label">Warna</label>
                        <input type="text" class="form-control" name="inputWarna" value="<?= htmlspecialchars($mobil->warna) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPlatNomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" name="inputPlatNomor" value="<?= htmlspecialchars($mobil->plat_nomor) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputTahunRilis" class="form-label">Tahun Rilis</label>
                        <input type="number" class="form-control" name="inputTahunRilis" value="<?= htmlspecialchars($mobil->tahun_rilis) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputBrand" class="form-label">Brand</label>
                        <select class="form-select" name="inputBrand" required>
                            <option value="">Pilih Brand</option>
                            <?php
                            $brands = isset($_SESSION['brands']) ? $_SESSION['brands'] : [];
                            foreach ($brands as $brand) {
                                $selected = ($mobil->brand == $brand['nama_brand']) ? 'selected' : '';
                                echo "<option value='{$brand['nama_brand']}' $selected>{$brand['nama_brand']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="input_id" value="<?= $mobil_id ?>">
                        <button name="button_update" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <?php else: ?>
                <div class="alert alert-danger" role="alert">
                    Mobil tidak ditemukan!
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>