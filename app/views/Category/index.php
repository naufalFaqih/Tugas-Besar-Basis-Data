<div class="container mt-5">
        <h1 class="mb-4">Categories</h1>
        <a href="create.php" class="btn btn-primary mb-4">Add New Category</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['category'] as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $category['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $category['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>