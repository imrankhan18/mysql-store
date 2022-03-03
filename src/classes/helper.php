<?php
include('User.php');

function addNewUser($username,$email,$password)
{
    $add=new User();
    $add->userDetail($username,$email,$password);
    $add->addUser($add);
}
function User($email,$password){

    $sign=new User();
    $sign->signInUser($email,$password);
    // $sign->signInUser($sign);
}
?>
