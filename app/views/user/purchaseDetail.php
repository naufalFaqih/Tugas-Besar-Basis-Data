<!-- views/user/purchaseDetail.php -->

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detail Pembelian</h5>
        </div>
        <div class="card-body">
            <p><strong>ID Transaksi:</strong> <?= $data['sale']['id']; ?></p>
            <p><strong>Tanggal Transaksi:</strong> <?= $data['sale']['sale_date']; ?></p>
            <p><strong>Total Harga:</strong> Rp<?= number_format($data['sale']['total_amount'], 2); ?></p>
            <p><strong>Unique Code:</strong> <?= $data['sale']['unique_code']; ?></p>
            <hr>
            <h5>Items Purchased:</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['items'] as $item) : ?>
                        <tr>
                            <td><?= $item['product_name']; ?></td>
                            <td>Rp<?= number_format($item['price'], 2); ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td>Rp<?= number_format($item['price'] * $item['quantity'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
