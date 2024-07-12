<div class="container mt-5">
        <h1><?php echo $data['judul']; ?></h1>
        <form action="<?= BASEURL; ?>/Product/update/<?= $data['products']['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $data['products']['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" required><?= $data['products']['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?= $data['products']['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="<?= $data['products']['stock']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="" selected disabled>Select Category</option>
                    <?php foreach ($data['categories'] as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?= $category['id'] == $data['products']['category_id'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>