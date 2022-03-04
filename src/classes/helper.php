<?php
session_start();
include('User.php');

function addNewUser($fullname,$username, $email, $password,$cpassword,$role)
{
    if($password!=$cpassword){
        echo "enter correct pasword";
   
    }
    else{
         $add = new User();
         $add->userDetail($fullname,$username, $email, $password,$cpassword,$role);
         $add->addUser($add);
    }
}
function UserLogin($email, $password)
{

    $sign = new User();
    foreach ($sign->signInUser() as $key => $val) 
        {
        if ($val['email'] == $email && $val['password'] == $password) {
            $_SESSION['login']='yes';
            // if($val['status']=='approved')
            // $_SESSION['disp']='block';
            // return true;
            //return "matched";
            // $_SESSION['status']='approved';
            // header("location:../dashboard.php");
            // $_SESSION['status']='pending';
            // header('loaction:../signin.php');
            // echo "not approved";

           
        // }else{
        //     echo "not macthed";
         }
        
}

return "not matched";
}
