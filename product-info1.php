<?php
require('all_links.php');
require('nav_bar.php');
?>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS library -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    button:focus,
    input:focus {
        outline: none;
        box-shadow: none;
    }

    a,
    a:hover {
        text-decoration: none;
    }

    /*--------------------------*/
    .qty-container {
        display: flex;
    }

    .qty-container .input-qty {
        text-align: center;
        padding: 6px 10px;
        border: 1px solid #d4d4d4;
        max-width: 80px;
    }

    .qty-container .qty-btn-minus,
    .qty-container .qty-btn-plus {
        border: 1px solid #d4d4d4;
        padding: 10px 13px;
        font-size: 10px;
        height: 38px;
        width: 38px;
        transition: 0.3s;
    }

    .qty-container .qty-btn-plus {
        margin-left: -1px;
    }

    .qty-container .qty-btn-minus {
        margin-right: -1px;
    }

    .fa-cart-plus {
        background: #0652DD;
    }

    .addtocart,
    .addtobuy {
        display: block;
        padding: 0.5em 1em 0.5em 1em;
        border-radius: 100px;
        border: none;
        font-size: 2em;
        position: relative;
        background: #0652DD;
        cursor: pointer;
        height: 2em;
        width: 9em;
        overflow: hidden;
        transition: transform 0.1s;
        z-index: 1;
    }

    .addtocart:hover,
    .addtobuy:hover {
        transform: scale(1.1);
    }

    .pretext {
        color: #fff;
        background: #0652DD;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Quicksand', sans-serif;
    }

    .button_text {
        font-size: 1rem;
        padding-left: 1.5rem;
    }
</style>
<!-- product-info page start -->

<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="image-container">
                    <div class="big-image">
                        <img src="https://s3.amazonaws.com/ebcwebstore/images/a-7007.jpg" alt="" id="zoom">
                    </div>
                    <div class="small-images">
                        <img src="https://s3.amazonaws.com/ebcwebstore/images/9789351452065.JPG" alt="">
                        <img src="https://s3.amazonaws.com/ebcwebstore/images/BhartiyaDandSahita1860_2-6-2020.JPG" alt="">
                        <img src="https://s3.amazonaws.com/ebcwebstore/images/the-constitution-of-india-coat-pocket-edition-Gopal-Sankaranarayanan-ebc-front-cover.JPG" alt="">
                    </div>
                </div>
            </div>
            <!-- <div class="product">
    <img id="zoom_01" src="path/to/your-image.jpg" data-zoom-image="path/to/your-large-image.jpg" alt="Product Image">
</div> -->

            <div class="col-lg-7 col-md-6 wow fadeInUp p-2" data-wow-delay="0.3s">
                <div class="product-name py-2">
                    <h1>Dasheri Mango(Best) (4Kg)</h1>
                </div>
                <div class="product-rating py-2">
                    <small class="me-3"><i class="fa fa-star" aria-hidden="true"></i></small>
                    <small class="me-3"><i class="fa fa-star" aria-hidden="true"></i></small>
                    <small class="me-3"><i class="fa fa-star" aria-hidden="true"></i></small>
                    <small class="me-3"><i class="fa fa-star" aria-hidden="true"></i></small>
                    <small class="me-3"><i class="fa fa-star-half" aria-hidden="true"></i></small>
                    <span class="pr">4.2 out of 5</span>
                </div>
                <div class="product-prices py-2">
                    <span class="sale-price"><del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>340.00</bdi></span></del>
                        <ins><span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">₹</span>300.00</bdi></span>
                        </ins>
                    </span>
                </div>
                <div class="product-Available offers py-2">
                    <h5>Available offers</h5>
                    <span class="pao">Buy this product and Get Extra ₹100 Off on Select Room HeatersT&C</span>
                </div>
                <div class="product-description">
                    <h6>Product-Description</h6>
                    <span>
                        To begin with, Dasheri mangoes have a characteristic sweet taste and are native to North India. Also known as “table” mangoes, these are a delicious variety of mangoes that are low in fibers, pulpy and juicy. You can not only slice them or blend them into juices, shakes, and smoothies, but can also enjoy them whole.
                    </span>
                </div>
                <div class="product-addtional-details">
                    <h6>Specifications</h6>
                    <span>
                        ManufacturerFOSSIL INDIA PVT LTD
                        Item Dimensions LxWxH7 x 9 x 9 Centimeters
                        Generic Namecasual watch
                    </span>
                </div>
                <hr>
                <div class="col-md-4 mb-3">
                    <h6 class="pb-2">Quantity</h6>
                    <div class="qty-container">

                        <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                        <input type="text" name="qty" value="0" class="input-qty" />
                        <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <button class="addtocart">
                                <div class="pretext">
                                    <i class="fas fa-cart-plus"></i> <span class="button_text">ADD TO CART</span>
                                </div>
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="addtobuy">
                                <div class="pretext bg-secondary">
                                    <i class="fas fa-shopping-bag"></i><span class="button_text">BUY IT NOW</span>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="container-fluid">
    <h1 class="text-center mt-5 mb-5">
        Bootstrap 4 peoduct slider
    </h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto">
            <div class="carousel-item col-md-3 active">
                <div class="card">
                    <img class="card-img-top img-fluid" src="img/c172.jpg" alt="card-
                     <div class="card-body">
                    <h4 class="card-title"> title 1</h4>
                    <p class="card-text">This is a longer card with supporting text</p>
                    <a class="btn btn-lg btn-info text-light text-capitalize">add to c</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" crossorigin="anonymous">
</script>
<script src="image-zoomer/zoomsl.min.js"></script>

<script>
    $(document).ready(function() {
        $('.small-images img').click(function() {
            var image = $(this).attr('src');
            $('.big-image img').attr('src', image);
        });
        $('#zoom').imagezoomsl({
            zoomrang: [4, 4]
        });
    });
</script>

<style>
    .image-container {
        width: 73%;
    }

    .big-image {
        height: 100%;
        width: 100%;
        padding: 1rem;

    }

    .big-image img {
        height: 36rem;
        width: 22rem;
        object-fit: cover;
    }

    .small-images {
        height: 30%;
        width: 100%;
        display: flex;
        justify-content: space-between;

    }

    .small-images img {
        height: 11rem;
        width: 15rem;
        cursor: pointer;
        object-fit: cover;
        padding: 1rem;
    }
</style>
<!-- product-info page end -->

<?php require('footer.php'); ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->

<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- xZoom JavaScript via CDN -->
<script src="https://cdn.jsdelivr.net/npm/xzoom@1.0.0/dist/xzoom.min.js"></script>
<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>