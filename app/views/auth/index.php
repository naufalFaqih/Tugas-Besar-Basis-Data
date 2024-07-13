<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php Flasher::flash(); ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Login Admin</h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/Auth/login" method="post" novalidate>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Username Admin">
                            <div class="invalid-feedback">
                                 Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Admin" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
