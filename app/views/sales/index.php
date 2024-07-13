<div class="container mt-5">
    <h1 class="mb-4">Hasil Pembelian</h1>
    <?php Flasher::flash(); ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Kasir</th>
                    <th>Total Amount</th>
                    <th>Sale Date</th>
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['sales'] as $sale) : ?>
                    <tr>
                        <td><?= $sale['id']; ?></td>
                        <td><?= $sale['customer_name']; ?></td>
                        <td><?= $sale['kasir_username']; ?></td>
                        <td><?= $sale['total_amount']; ?></td>
                        <td><?= $sale['sale_date']; ?></td>
                        <td>
                            <ul>
                                <?php foreach ($sale['items'] as $item) : ?>
                                    <li><?= $item['product_name']; ?> (<?= $item['quantity']; ?> x <?= $item['price']; ?>)</li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
