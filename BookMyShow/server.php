<?php

session_start();
//initialize variables
$errors=array();
//connect to db
$db=mysqli_connect('localhost','root','','Bookmyshow') or die("Could not connect to database");

//Register users
$username=mysqli_real_escape_string($db,$_POST['user']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$password1=mysqli_real_escape_string($db,$_POST['pass1']);
$password2=mysqli_real_escape_string($db,$_POST['pass2']);

//errors
if(empty($username)){array_push($errors, "Username is required");};
if(empty($password1)){array_push($errors, "Password is required");};
if(empty($password2)){array_push($errors, "Email is required");};
if($password1!=$password2)
{
    array_push($errors, "Passwords do not match");
    echo "Passwords do not match <br/> Please try again"; 
    include ("signup.html");
};

//check for existing username

if (count($errors)==0){
    $query= "insert into login(username,email,password) values('$username','$email','$password1')";
    mysqli_query($db,$query);

    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    include ("signin.html");
}

?>