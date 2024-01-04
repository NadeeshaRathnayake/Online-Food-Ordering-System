<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){

        // this will generate number between 10000 and 99999
        $new_password = rand(10000,99999);

         $update_user = $conn->prepare("UPDATE `users` SET `password` = ? WHERE `email` = ?");
         $update_user->execute([sha1($new_password) , $email]);

        // the message
        $msg = "Your new password is : ". $new_password;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail($email,"Forget password",$msg);

        $message[] = 'Your new password was send' . $new_password;
   }else{
      $message[] = 'No user account associated with this email';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forget Password</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/new.css">

</head>
<body style="background-image: url('https://www.guidingtech.com/wp-content/uploads/HD-Mouth-Watering-Food-Wallpapers-for-Desktop-12_4d470f76dc99e18ad75087b1b8410ea9.jpg');background-repeat: no-repeat;background-size: cover">

<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3><span>Forget Password</span></h3>
   <p><a href="home.html">Home  </a> <span> / Forget Password</span></p>
</div>

<div style="all: initial;" >
<div class="container" class ="login-bg" style="display: flex; justify-content: space-around ; ">
    <div class="new-card" style="width:50vw">
        <div class="new-card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputPassword1">Email</label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" required placeholder="enter your email"  maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" class="form-control new-input" style="margin: 0;width:100%"
                                   id="exampleInputPassword1">
                        </div>
                    </div>

                </div>

                <button type="submit" value="login now" name="submit" class="btn btn-success"><i class="fa-solid fa-right-to-bracket"></i> Send new password to the email
                </button>
                <p>don't have an account? <a href="register.php">register now</a></p>
            </form>
        </div>
    </div>
</div>

</div>







<?php include 'components/footer.php'; ?>






<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>