<?php

session_start();

$db=mysqli_connect('localhost','root','','Bookmyshow') or die("Could not connect to database");

if(isset($_POST['user'])){
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $query="select * from login where username='".$username."' and password='".$password."'limit 1";
    $result = mysqli_query($db,$query);
 
    if(mysqli_num_rows($result)==1){
        $_SESSION['user']="$username";
        header ('location: main.html');
        exit();
    }
    else
        echo "Incorrect Username or Password !!";
        echo "Please try again !";
}

?>