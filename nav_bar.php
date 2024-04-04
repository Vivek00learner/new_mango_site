
<?php
include('functions/common_function.php');
include('includes/connect.php');
?>
<style>
     .search-box {
       width: fit-content;
       height: fit-content;
       position: relative;
     }

     .input-search {
       height: 50px;
       width: 50px;
       border-style: none;
       padding: 10px;
       font-size: 18px;
       letter-spacing: 2px;
       outline: none;
       border-radius: 25px;
       transition: all .5s ease-in-out;
       background-color: #22a6b3;
       padding-right: 40px;
       color: #fff;
     }

     .input-search::placeholder {
       color: rgba(255, 255, 255, .5);
       font-size: 18px;
       letter-spacing: 2px;
       font-weight: 100;
     }

     .btn-search {
       width: 50px;
       height: 50px;
       border-style: none;
       font-size: 20px;
       font-weight: bold;
       outline: none;
       cursor: pointer;
       border-radius: 50%;
       position: absolute;
       right: 0px;
       color: #ffffff;
       background-color: transparent;
       pointer-events: painted;
     }

     .btn-search:focus~.input-search {
       width: 300px;
       border-radius: 0px;
       background-color: #d9dce3;
       border-bottom: 1px solid rgba(255, 255, 255, .5);
       transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
     }

     .input-search:focus {
       width: 300px;
       border-radius: 0px;
       background-color: gray;
       border-bottom: 1px solid rgba(255, 255, 255, .5);
       transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
     }
   </style>
   <!-- Navbar Start -->
   <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
     <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
       <div class="col-lg-6 px-5 text-start">
         <small><i class="fa fa-map-marker-alt me-2"></i>123 Lucknow, UP</small>
         <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
       </div>
       <div class="col-lg-6 px-5 text-end">
         <small>Follow us:</small>
         <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
         <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
         <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
         <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
       </div>
     </div>

     <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
       <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
         <!-- <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1> -->
         <img src="https://mangobaba.in/wp-content/uploads/2023/06/logo2.webp" width="170px" alt="">
       </a>
       <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto p-4 p-lg-0">
           <a href="index.php" class="nav-item nav-link active">Home</a>
           <a href="product.php" class="nav-item nav-link">Mango Products</a>
           <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mango by Varieties</a>
             <div class="dropdown-menu m-0">
               <a href="blog.php" class="dropdown-item">DASHERI</a>
               <a href="feature.php" class="dropdown-item">SAFEDA</a>
               <a href="testimonial.php" class="dropdown-item">LANGRA</a>
               <a href="404.php" class="dropdown-item">CHAUSA</a>
             </div>
           </div>
           <!-- <a href="about.php" class="nav-item nav-link">About Us</a>  -->
           <a href="contact.php" class="nav-item nav-link">Contact Us</a>
         </div>
         <div class="d-none d-lg-flex ms-2">
           <!-- <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a> -->


           <div class="search-box">
             <form id="searchForm" action="search_product.php" method="get" onsubmit="return onSubmit()">
               <input type="search" class="input-search" name="search_data" id="searchData" placeholder="Type to Search...">
               <input type="hidden" value="Search" name="search_for_product" id="searchForProductInput">
               <button type="submit" class="btn-search">
                 <i class="fas fa-search"></i>
               </button>
             </form>
           </div>
           <a class="btn-sm-square bg-white rounded-circle ms-3" href="./users_area/user_login.php"
 >
    <small class="fa fa-user text-body"></small>
</a>


           


        <a class="btn-sm-square bg-white rounded-circle ms-3"
           data-bs-toggle="popover" 
        data-bs-placement="top" 
        data-bs-html="true" 
        data-bs-content="<?php
        cart_item_body();  
        total_cart_price();                        
        ?>"
           id="cart_items"href="shoping_cart.php">
             <small class="fa fa-shopping-bag text-body">
             <sup>
       <?php
       cart_item();
       ?>
            </sup>
            </small>
          </a>
         </div>
       </div>
     </nav>
   </div>
<div>

</div>
   <!-- Navbar End -->

   <script>
  let isSearchOpen = false;

  function onSubmit() {
    if (isSearchOpen) {
      // Retrieve the value from the search input
      let searchData = document.getElementById('searchData').value.trim();
      // Set the hidden input value
      document.getElementById('searchForProductInput').value = searchData;

      // Reset the form or perform additional actions as needed
      document.getElementById('searchForm').reset();
      closeSearch();

      // Allow the form to submit
      return true;
    } else {
      openSearch();

      // Prevent the form from submitting for now
      return false;
    }
  }

  function openSearch() {
    isSearchOpen = true;
    document.getElementById('searchData').focus();
    document.getElementById('searchForm').classList.add('search-open');
  }

  function closeSearch() {
    isSearchOpen = false;
    document.getElementById('searchForm').classList.remove('search-open');
  }
</script>