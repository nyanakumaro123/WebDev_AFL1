<?php
include ("brand_model.php");

$brand = new Brand();
$brandData = [];

if (isset($_GET['id'])) {
    $brandData = $brand->getBrandById($_GET['id']);
}

if (empty($brandData)) {
    header('Location: brand_view.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Update Brand</title>
</head>
<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="brand_view.php">Brand List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="brand_addView.php">New Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mobil_view.php">Mobil List</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>Update Brand</h1>
                <form method="POST" action="brand_controller.php" class="row g-3 w-75 mx-auto">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?= $brandData['id'] ?>">
                    <div class="col-12">
                        <label for="nama_brand" class="form-label">Nama Brand</label>
                        <input type="text" class="form-control" id="nama_brand" name="nama_brand" 
                               value="<?= htmlspecialchars($brandData['nama_brand']) ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="asal_brand" class="form-label">Asal Brand</label>
                        <input type="text" class="form-control" id="asal_brand" name="asal_brand" 
                               value="<?= htmlspecialchars($brandData['asal_brand']) ?>" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>