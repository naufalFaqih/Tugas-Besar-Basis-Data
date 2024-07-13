<div class="container mt-5">
    <h1 class="mb-4"><?= $data['judul']; ?></h1>
    <div class="card">
        <div class="card-header">
            Pembelian ID: <?= $data['sale']['id']; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Tanggal: <?= $data['sale']['sale_date']; ?></h5>
            <p class="card-text">Total: $<?= $data['sale']['total_amount']; ?></p>
            <h5 class="mt-4">Detail Item:</h5>
            <ul class="list-group">
                <?php foreach ($data['sale_items'] as $item) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= BASEURL; ?>/<?= $item['product_image']; ?>" class="img-fluid" alt="<?= $item['product_name']; ?>">
                            </div>
                            <div class="col-md-10">
                                <h5><?= $item['product_name']; ?></h5>
                                <p>Quantity: <?= $item['quantity']; ?> - Price: $<?= $item['price']; ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
