<?php 
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //header("Location:dashboard.php");
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

  </head>

  <body class="text-center">

    
    <form class="form-signin" method="POST" action="processregister.php">

        <p>
          <?php
              if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                  echo "<span style='color: red'>" . $_SESSION['error'] . "</span>";

                  // session_unset();
                  session_destroy();
              }
          ?>
        </p>
        
        <h1 class="h3 mb-3 font-weight-normal">Please register</h1>

        <label for="inputFullName" class="sr-only">Full Name</label>
        <input type="text" id="inputPassword" class="form-control" name="fullname" placeholder="Full Name" required>

        <br/>

        <label for="inputUserName" class="sr-only">Username</label>
        <input type="text" id="inputPassword" class="form-control" name="username" placeholder="Username" required>

        <br/>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>

        <br/>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>


       
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Sign Up</button>
        

        <p class="mt-5 mb-3 text-muted">Already a user? <a href="index.php">Login</a> </p>
    </form>

  </body>
</html>
