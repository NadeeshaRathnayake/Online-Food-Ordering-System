<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
   $select_user->execute([$email, $number]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email or number already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES(?,?,?,?)");
         $insert_user->execute([$name, $email, $number, $cpass]);
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
         $select_user->execute([$email, $pass]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         if($select_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="css/new.css">

</head>
<body style="background-image: url('https://cdngeneral.rentcafe.com/dmslivecafe/3/175889/shutterstock_547416616edit.jpg?quality=85&scale=both&');background-repeat: no-repeat;background-size: cover">
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div style="all: initial;" >
    <div class="container" class ="login-bg" style="display: flex; justify-content: space-around ; ">
        <div class="new-card" style="width:50vw">
        <div class="new-card-body">
               <form action="" method="post">
                  <h3>register now</h3>

                        <div class="form-group">
                          <div class="row">
                              <div class="col">
                                  <label for="exampleInputPassword1">Name</label>
                              </div>
                              <div class="col">
                                  <input type="text" name="name" required placeholder="enter your name" class="form-control new-input" style="margin: 0; width:100%">
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label >Email</label>
                                </div>
                                <div class="col">
                                    <input type="email" name="email" required placeholder="enter your email" class="form-control new-input" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" style="margin: 0; width:100%">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label >Number</label>
                                </div>
                                <div class="col">
                                    <input type="number" name="number" required placeholder="enter your number" class="form-control new-input" min="0" max="9999999999" maxlength="10" oninput="this.value = this.value.replace(/\s/g, '')" style="margin: 0; width:100%">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label >Password</label><br>
                                    <ul style="font-size:.75rem;color:gray;padding-left:2rem">
                                        <li>Length must be > 8 </li>
                                        <li>must be contain uppercase and lower case letter </li>
                                        <li>must be contain a number </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" name="pass" required placeholder="enter your password" class="form-control new-input" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" style="margin: 0; width:100%">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label >Conform Password</label>
                                </div>
                                <div class="col">
                                    <input type="password" name="cpass" required placeholder="confirm your password" class="form-control new-input" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" style="margin: 0; width:100%">
                                </div>
                            </div>
                        </div>


                  <input type="submit" value="register now" name="submit" class="btn">
                  <p>already have an account? <a href="login.php">login now</a></p>
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