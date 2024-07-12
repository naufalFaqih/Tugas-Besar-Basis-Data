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
                            <p class="card-text"><strong>Price:</strong> $<?php echo $product['price']; ?></p>
                            <p class="card-text"><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
                            <a href="<?= BASEURL; ?>/Product/edit/<?php echo $product['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= BASEURL; ?>/Product/delete/<?= $product['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>