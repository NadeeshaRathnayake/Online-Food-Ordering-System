<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3><span>About</span> us</h3>
   <p><a href="home.php">Home </a> <span> / About</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/bg/7-1.gif">
      </div>

      <div class="content">
         <h3>why should you choose us?</h3>
         <p>Because we are dedicated to you 24 hours a day, bringing any of our products selected according to your needs to you with the highest quality and freshness in as little as 30 minutes, allowing you to pay with convenient payment methods.</p>
         <a href="menu.php" class="btn">Our menu</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title"><span>4 simple steps</span></h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.jpg" alt="">
         <h3>choose your favorite food</h3>
         <p>Choose and order any food we have in our establishment according to your wish.</p>
      </div>

      <div class="box">
         <img src="images/step-2.jpg" alt="">
         <h3>30 minutes delivery</h3>
         <p>We are ready to deliver the product you ordered through our agent within 30 minutes maximum.</p>
      </div>
      <div class="box">
         <img src="images/step-3.jpg" alt="">
         <h3>easy payments methods</h3>
         <p> You can pay for your orders in a convenient way. (by cash or card) </p>
         
      </div>

      <div class="box">
         <img src="images/step-4.jpg" alt="">
         <h3>Enjoy your food!</h3>
         <p>Feel free to enjoy our products at your convenience and tell us your thoughts.</p>
      </div>
      

   </div>

</section>
<hr>

<section class="steps">
      
      
   <h1 class="title">Our Professional <span>Chefs</span></h1>

   <div class="box-container">

      <div class="box">
         <img src="images/shutterstock_1518533924-min.jpg" alt="">
         <p>Chef Mr. David</p>
      </div>

      <div class="box">
         <img src="images/z_p31-Sumit-Ba.jpg" alt="">
         <p>Chef Mr. perera</p>
      </div>

      <div class="box">
         <img src="images/27chef-ranveer-brar-1.jpg" alt="">
         <p>Chef Mr. Silva</p>
      </div>
      

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">customer's <span>reivews</span></h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/pic-1.png" alt="">
            <p> It`s a very useful website with a lot of services. I live in Uk so it is convenient to send things to my family through this website. Good quality products and services. Thank you very much.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>S.Perera</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-2.png" alt="">
            <p>You are fast and very efficient and really user friendly, really appreciate your fast and efficient service, will definitely recommend this site to everyone.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>A.Fanando</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-3.png" alt="">
            <p>You are fast and very efficient and really user friendly, really appreciate your fast and efficient service, will definitely recommend this site to everyone.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>B.Rathnayake</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-4.png" alt="">
            <p>You are fast and very efficient and really user friendly, really appreciate your fast and efficient service, will definitely recommend this site to everyone.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>B.Rajapaksha</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-5.png" alt="">
            <p>You are fast and very efficient and really user friendly, really appreciate your fast and efficient service, will definitely recommend this site to everyone.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>T.Perera</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-6.png" alt="">
            <p>You are fast and very efficient and really user friendly, really appreciate your fast and efficient service, will definitely recommend this site to everyone.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>S.Herath</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>
<!-- reviews section ends -->



















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=


<div class="loader">
   <img src="images/loader.gif" alt="">
</div>



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>