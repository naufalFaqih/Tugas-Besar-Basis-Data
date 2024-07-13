<div class="container text-center">
    <div class="row">
    <img src="<?= BASEURL; ?>/img/cover2.jpg" class="img-fluid" alt="...">
    </div>
    <div class="row">
        <figure class="text-center">
    <blockquote class="blockquote">
        <p>A well-known quote, contained in a blockquote element.</p>
    </blockquote>
    <figcaption class="blockquote-footer">
        Someone famous in <cite title="Source Title">Source Title</cite>
    </figcaption>
    </figure>
    </div>
    <div class="row">
    <img src="<?= BASEURL; ?>/img/cover3.jpg" class="img-fluid" alt="...">
    </div>
    <div class="row">
        <figure class="text-center">
    <blockquote class="blockquote">
        <p>A well-known quote, contained in a blockquote element.</p>
    </blockquote>
    <figcaption class="blockquote-footer">
        Someone famous in <cite title="Source Title">Source Title</cite>
    </figcaption>
    </figure>
    </div>
   <div class="row">
    <img src="<?= BASEURL; ?>/img/jordan.png" class="img-fluid" alt="...">
    </div>
    
</div>

    <!-- Carousel -->
     <!-- 
    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= BASEURL; ?>/img/nike.jpg " class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="<?= BASEURL; ?>/img/nike.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="<?= BASEURL; ?>/img/nike.jpg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->

    <!-- Products Section -->
     <!--
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="product1.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">$100</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="product2.jpg" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">$150</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="product3.jpg" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">$200</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Footer -->
    <footer class="bg-dark text-white text-start p-3">
        <!-- Footer
        <div class="container">
            <p>&copy; 2024 Limbo, Inc. All Rights Reserved.</p>
        </div>
         Footer -->
        <div class="row ms-5 mt-5">
            <div class="col">
            <img src="<?= BASEURL; ?>/img/logo.jpg" class="rounded-4" width="auto" height="100px" alt="...">
            <p class="text-start mt-3 fw-semibold text-secondary">Limbo Shoe Store</p>
            </div>
            <div class="col">
                <h3>Quick Link</h3>
                <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-start mt-3 text-secondary" href="<?= BASEURL; ?>/Auth/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-start mt-3 text-secondary" href="<?= BASEURL; ?>/Auth">Login Admin</a>
                    </li>
                <?php endif; ?>
            </ul>
            </div>
            <div class="col">
                <h3>Contact</h3>
                <p class="text-start mt-3 fw-semibold text-secondary">+6285283736668</p>
                <p class="text-start fw-semibold text-secondary">naufalfaqih3@gmail.com</p>
                <p class="text-start fw-semibold text-secondary">Tubagus Ismail Dalam, Sekeloa, Bandung</p>
            </div>
        </div>
    </footer>
