<?php
include ("brand_controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Brand View</title>
</head>
<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="brand_view.php">Brand List</a>
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
                <h1>Brand</h1>
                
                <?php
                if (isset($_GET['status']) && $_GET['status'] == 'success') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Operasi berhasil dilakukan!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }
                ?>
                
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Brand</th>
                            <th scope="col">Asal Brand</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($brands as $brand) {
                        ?>
                            <tr>
                                <th scope="row"><?= $brand['id'] ?></th>
                                <td><?= $brand['nama_brand'] ?></td>
                                <td><?= $brand['asal_brand'] ?></td>
                                <td>
                                    <a href="brand_updateView.php?id=<?= $brand['id'] ?>">
                                        <button class="btn btn-warning">Update</button>
                                    </a>
                                    <a href="brand_controller.php?action=delete&id=<?= $brand['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>