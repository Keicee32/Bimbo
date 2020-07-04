<?php
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location:dashboard.php");
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
    
    <form class="form-signin" method="POST" action="processlogin.php">
        <!-- <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <br/>
        <label for="inputUserName" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

       
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        
        <p class="mt-5 mb-3 text-muted">Don't have an account? <a href="signup.php">Sign Up</a> </p>
    </form>

  </body>
</html>
