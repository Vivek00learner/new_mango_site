<?php 
require('all_links.php'); 
require('nav_bar.php'); 
?>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS library -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Latest Blog</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="img/blog-1.jpg" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img class="img-fluid" src="img/blog-2.jpg" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <img class="img-fluid" src="img/blog-3.jpg" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in own firm</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->




<!-- product-info page start -->

<div class="container-xxl py-5">
    <div class="container">
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
<span class="pao">Buy this product and Get Extra ₹100 Off on Select Room HeatersT&C</span>
</div>
<div class="product-description">
<span>
To begin with, Dasheri mangoes have a characteristic sweet taste and are native to North India. Also known as “table” mangoes, these are a delicious variety of mangoes that are low in fibers, pulpy and juicy. You can not only slice them or blend them into juices, shakes, and smoothies, but can also enjoy them whole.
</span>
</div>
<div class="product-addtional-details">
<span>
ManufacturerFOSSIL INDIA PVT LTD
Item Dimensions LxWxH7 x 9 x 9 Centimeters
Generic Namecasual watch
</span>
</div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.0.min.js" 
        integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
        crossorigin="anonymous">
</script>
<script src="image-zoomer/zoomsl.min.js"></script>

<script>
    $(document).ready (function(){
$('.small-images img') .click(function() {
var image = $(this). attr('src');
$('.big-image img').attr('src',image );
});
$('#zoom').imagezoomsl({
zoomrang: [4,4]
});
});
</script>

<style>
 
  .image-container {
    width: 73%;
}

.big-image{
  height:100%;
width:100%;
padding:1rem;

}
.big-image img {
    height: 36rem;
    width: 22rem;
    object-fit: cover;
}
.small-images{
  height:30%;
width:100%;
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