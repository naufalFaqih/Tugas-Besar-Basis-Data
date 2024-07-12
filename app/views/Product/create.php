<div class="container mt-5">
        <h1>Add New Product</h1>
        <form action="<?= BASEURL;?>/Product/tambah" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" id="price" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="text" id="stock" name="stock" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-select">
                    <?php foreach ($data['categories'] as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>