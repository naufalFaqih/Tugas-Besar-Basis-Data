<div class="container mt-5">
    <h1 class="mb-4"><?= $data['judul']; ?></h1>
    <?php Flasher::flash(); ?>
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                <img src="<?= BASEURL; ?>/<?= $product['image']; ?>" class="card-img-top" width="100px" height="200px" alt="<?= $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name']; ?></h5>
                        <p class="card-text"><?= $product['description']; ?></p>
                        <p class="card-text">Price: $<?= $product['price']; ?></p>
                        <p class="card-text">Stok: <?= $product['stock']; ?></p>
                       <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buyModal<?= $product['id']; ?>">Beli</button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="buyModal<?= $product['id']; ?>" tabindex="-1" aria-labelledby="buyModalLabel<?= $product['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buyModalLabel<?= $product['id']; ?>">Beli <?= $product['name']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= BASEURL; ?>/User/buy/<?= $product['id']; ?>" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="<?= $product['stock']; ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Beli</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
