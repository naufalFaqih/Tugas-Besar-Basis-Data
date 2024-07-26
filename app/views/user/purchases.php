<!-- views/user/purchases.php -->

<div class="container mt-4">
    <h2>Riwayat Pembelian</h2>
    <?php if (!empty($data['sale'])) : ?>
        <ul class="list-group">
            <?php foreach ($data['sale'] as $purchase) : ?>
                <li class="list-group-item">
                    <strong>ID Transaksi:</strong> <?php echo $purchase['id']; ?><br>
                    <strong>Total Harga:</strong> $ <?php echo number_format($purchase['total_amount'], 2); ?><br>
                    <strong>Tanggal Pembelian:</strong> <?php echo date('F j, Y, g:i a', strtotime($purchase['sale_date'])); ?><br>
                    <strong>Nama Pembeli:</strong> <?php echo $purchase['customer_name'];?><br>
                    <strong>Email Pembeli:</strong> <?php echo $purchase['customer_email'];?><br>
                    <a href="<?php echo BASEURL; ?>/user/purchaseDetail/<?php echo $purchase['unique_code']; ?>" class="btn btn-primary mt-2">Tampilkan Detail</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No purchases found.</p>
    <?php endif; ?>
</div>
