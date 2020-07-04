<?php session_start();

$errorCount = 0;

$fullname = $_POST['fullname'] != "" ? $_POST['fullname'] : $errorCount++;
$username = $_POST['username'] != "" ? $_POST['username'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != ""  ? $_POST['password'] : $errorCount++;

$_SESSION['fullname'] = $fullname;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;



if($_POST){

    if($errorCount > 0)
    {
        $_SESSION["error"] = "You have " . $errorCount . " error(s) in your form submission";
        header('location:register.php?');
        die();

    } else{

        // This connects the vscode to the database

        require 'db_conn.php';
        $conn = connect_db();

        if(isset($_POST['register']) ){
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

            //sanitize your input
            $fullname = mysqli_real_escape_string($conn, $fullname);
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $passwordHashed = mysqli_real_escape_string($conn, $passwordHashed);

            //check for existing record 

            $sql = "Select simplycoding_user.username From simplycoding_user Where username = '$username'";
            $sql = $conn->query($sql);
            $sql = $sql->fetch_assoc();

            if($sql){ 
                $_SESSION['error'] = "Registration failed. User exists";
                header('location: signup.php');
                die();
            }

            // This inserts the details into the database
            else{
            
            $sql = "Insert Into simplycoding_user (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$passwordHashed')";
            $sql = $conn->query($sql);
            if($sql){
                $_SESSION['message'] = "Registration Successful " . $first_name . ". Proceed to Login";
                header('location: index.php');
            }
            //$sql = $sql->fetch_assoc();
            //echo $username.$email.$password;
            }
        }
    }
}

// Validating email entry
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is a valid email address");
    } else {
    $_SESSION["error"] = "Invalid Email address" ;
      header("Location: register.php");
    }
    
  // validate first name 
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
    $_SESSION["error"] = "For names Only letters and white space allowed" ;
      header("Location: register.php");
     }
  // validate second name
    // if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    // $_SESSION["error"] = "For names Only letters and white space allowed" ;
    // header("Location: register.php");}

?>