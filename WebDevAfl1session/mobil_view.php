<?php require("mobil_controller.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>View</title>
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
                        <a class="nav-link active" aria-current="true" href="mobil_view.php">Mobil List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mobil_addView.php">New Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>Mobil</h1>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Plat Nomor</th>
                            <th scope="col">Tahun Rilis</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        $allmobils = getAllMobils();
                        foreach ($allmobils as $index => $mobil) {
                            $counter++;
                        ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $mobil->nama ?></td>
                                <td><?= $mobil->warna ?></td>
                                <td><?= $mobil->plat_nomor ?></td>
                                <td><?= $mobil->tahun_rilis ?></td>
                                <td><?= $mobil->brand ?></td>
                                <td>
                                    <a href="mobil_updateView.php?updateID=<?= $index ?>">
                                    <button class="btn btn-warning">Update</button>
                                    </a>
                                    <a href="mobil_controller.php?deleteID=<?= $index ?>">
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