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
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/new.css">

</head>
<body style="background-image: url('images/bg/15.jpg');background-repeat: no-repeat;background-size: cover">

<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3><span>Login</span></h3>
   <p><a href="home.html">Home </a> <span> / Login</span></p>
</div>

<div style="all: initial;" >
<div class="container" class ="login-bg" style="display: flex; justify-content: space-around ; ">
    <div class="new-card" style="width:50vw">
        <div class="new-card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputPassword1">User name</label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" required placeholder="enter your email"  maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" class="form-control new-input" style="margin: 0;width:100%"
                                   id="exampleInputPassword1">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputPassword1">Password</label>
                        </div>
                        <div class="col">
                            <input type="password" name="pass" required placeholder="enter your password"  maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" class="form-control new-input" style="margin: 0; width:100%"
                                   id="exampleInputPassword1">
                        </div>
                    </div>
                </div>

                <button type="submit" value="login now" name="submit" class="btn btn-success"><i class="fa-solid fa-right-to-bracket"></i> login
                </button>
                <br>
                <p>I can't remember my password <a href="forget_password.php">forget password</a></p>
                <br>
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