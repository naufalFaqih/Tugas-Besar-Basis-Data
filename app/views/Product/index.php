<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'];?></title>
   <link rel="stylesheet" href="<?= BASEURL ;?>/css/bootstrap.css">
</head>
<body>
<header class="bg-dark text-white p-1 text-center">
        <div class="container">
            <h1 class="display-4">L I M B O</h1>
        </div>
    </header>


 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand " href="<?= BASEURL; ?>/home/index">
                <img src="<?= BASEURL; ?>/img/logo.jpg" alt="Nike Logo" width="50px" height="50px" >
            </a>

            <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/Auth/logout" onclick="return confirm('Apakah Anda yakin?')">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/Auth">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
             </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
            </div>
        </div>
    </nav>


<div class="container mt-5">
        <h1 class="mb-4">Products</h1>
        <div class="row">
            <div class="col-md-6">
            <?php Flasher::flash(); ?>
            </div>
        </div>
        <a href="<?= BASEURL; ?> /Product/create/" class="btn btn-primary mb-4">Add New Product</a>
        <div class="row">
            <?php foreach ($data['products'] as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <?php if ($product['image']): ?>
                            <img src="<?php echo $product['image']; ?>" class="card-img-top" width="100px" height="200px" alt="<?php echo $product['name']; ?> ">
                        <?php else: ?>
                            <img src="path/to/default-image.jpg" class="card-img-top" alt="Default Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo $product['description']; ?></p>
                            <p class="card-text"><strong>Price:</strong> $ <?php echo $product['price']; ?></p>
                            <p class="card-text"><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
                            <a href="<?= BASEURL; ?>/Product/edit/<?php echo $product['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= BASEURL; ?>/Product/delete/<?= $product['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>