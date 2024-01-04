<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/new.css">

</head>
<body style="background-image: url('https://media.istockphoto.com/photos/food-background-picture-id936991552?k=20&m=936991552&s=170667a&w=0&h=8ZJN_tOUn5uEhxOGZRZHm6KbPJFmfmLUOt_XUy4oIo0=');background-repeat: no-repeat;background-size: contain">
   
<?php include 'components/user_header.php'; ?>

<div style="all: initial;" >
<div class="container" class ="login-bg" style="display: flex; justify-content: space-around ; ">
<div class="new-card" style="width:50vw">
<div class="new-card-body">
   <h1 class="title"><span>quick view</span></h1>

   <?php
      $pid = $_GET['pid'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$pid]);
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
      <center><img style ="width:100%" src="uploaded_img/<?= $fetch_products['image']; ?>" alt=""></center> <br>
      <span> Product Category : <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat "><?= $fetch_products['category']; ?></a> <br></span>
      <div class="name" >Product Name : <?= $fetch_products['name']; ?></div> <br>
      <div class="flex">
         <div class="price"><span>Price : Rs.</span><?= $fetch_products['price']; ?></div>
         <input type="number" name="qty" class="qty form-control new-input" min="1" max="99" value="1" style="margin : 0" maxlength="2">
      </div> <br>
      <button type="submit" name="add_to_cart" class="btn btn-info"> <i class="fa-solid fa-cart-shopping"></i> add to cart</button>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>

</div>
</div>
</div>
</div>
















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>