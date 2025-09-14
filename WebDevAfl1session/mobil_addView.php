<?php
session_start();
include("brand_controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Add</title>
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
                        <a class="nav-link active" href="mobil_addView.php">New Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>New Mobil</h1>
                <form method="POST" action="mobil_controller.php" class="row g-3 w-75 mx-auto">
                    <div class="col-12">
                        <label for="inputNama" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" id="inputNama" name="inputNama" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputWarna" class="form-label">Warna</label>
                        <input type="text" class="form-control" id="inputWarna" name="inputWarna" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPlatNomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="inputPlatNomor" name="inputPlatNomor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputTahunRilis" class="form-label">Tahun Rilis</label>
                        <input type="number" class="form-control" id="inputTahunRilis" name="inputTahunRilis" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputBrand" class="form-label">Brand</label>
                        <select class="form-select" id="inputBrand" name="inputBrand" required>
                            <option value="">Pilih Brand</option>
                            <?php
                            $brands = isset($_SESSION['brands']) ? $_SESSION['brands'] : [];
                            if (empty($brands)) {
                                $defaultBrands = ['Toyota', 'Honda', 'Suzuki', 'Mitsubishi', 'Nissan', 'Daihatsu', 'BMW', 'Mercedes-Benz', 'Audi', 'Lexus'];
                                foreach ($defaultBrands as $brand) {
                                    echo "<option value='$brand'>$brand</option>";
                                }
                            } else {
                                foreach ($brands as $brand) {
                                    echo "<option value='{$brand['nama_brand']}'>{$brand['nama_brand']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button name="button_register" type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>