<?php session_start();

if ($_POST){

    require 'db_conn.php';
    $conn = connect_db();

    if(isset($_POST['login']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

        $sql = "Select * From simplycoding_user Where username = '$username'";
        $sql = $conn->query($sql);
        if($sql){
          $sql = $sql->fetch_assoc();
            if(password_verify($password, $sql['password'])){
                session_start();
                $_SESSION['username'] = $username;
                echo 'You have successfully loggedin';
                header('location: dashboard.php');
            } else {
                echo "Incorrect username or password";
                header('location: index.php');
            }

        }
    }
} 

?>