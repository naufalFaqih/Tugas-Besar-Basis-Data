
<div class="container mt-4">
    <div class="row justify-content-center">

        <div class="col">
            <img src="<?= BASEURL; ?>/img/login.png" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-5">
            <?php Flasher::flash(); ?>
                <h3>Login Admin</h3>
                    <form action="<?= BASEURL; ?>/Auth/login" method="post" >
                        <div class="form-group mt-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control " id="username" name="username" required placeholder="Username Admin">
                        </div>
                        <div class="form-group mt-3" >
                            <label for="password">Password:</label>
                            <input type="password" class="form-control " id="password" name="password" placeholder="Password Admin" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </form>
        </div>
    </div>
</div>

