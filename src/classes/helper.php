<?php
session_start();
include('User.php');

function addNewUser($fullname, $username, $email, $password, $cpassword, $role, $status = "pending")
{
    if ($password != $cpassword) {
        echo "enter correct pasword";
    } else {
        $add = new User();
        $add->userDetail($fullname, $username, $email, $password, $cpassword, $role, $status = "pending");
        $add->addUser($add);
    }
}
function UserLogin($email, $password, $role)
{

    $sign = new User();
    foreach ($sign->signInUser() as $key => $val) {
        if ($val['email'] == $email && $val['password'] == $password && $val['role'] == $role) {
            $_SESSION['login'] = 'yes';
            $_SESSION['id']=$val['user_id'];
            // if($val['status']=='approved')
            // $_SESSION['disp']='block';
            // return true;
            // $_SESSION['status']='approved';
            // header("location:../dashboard.php");
            // $_SESSION['status']='pending';
            // header('loaction:../signin.php');
            // echo "not approved";
            if ($role == "admin") {
                $_SESSION['display'] = 'block';
            }
            if ($role == "user") {
                $_SESSION['display'] = 'none';
            }


            // }else{
            //     echo "not macthed";
        }
    }

    return "not matched";
}


function myDetails($id)
{
    $user=new User();
    foreach($user->showDetails() as $key=>$val)
    {
        if($val['user_id']==$id)
        {
            $_SESSION['details']=$val;
            Details();
            return;
        }
    }

}

function Details()
{   $details=$_SESSION['details'];
    $_SESSION['displayDetails'] = "<table class='table table-striped table-sm'>
    <thead>
              <tr>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Email </th>
                <th>Password</th>
                <th>Role</th>
              </tr></thead><tbody>
              <tr>
                <td>" . $details['user_name'] . "</td>
                <td>" . $details['full_name'] . "</td>
                <td>" . $details['email'] . "</td>
                <td>" . $details['password'] . "</td>
                <td>" . $details['role'] . "</td>
                <td><form action=''method='post'><button name='action' value='edit'>Edit</button></td>
                
              </tr></tbody></table>";
        }

function editDetails(){
    $details=$_SESSION['details'];
    $_SESSION['displayDetails']="<div class='table-responsive'>
    <table class='table table-striped table-sm'>
    <thead>
      <tr>
        
        <th scope='col'>User Name</th>
        <th scope='col'>Full Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Password</th>
        <th scope='col'>Role</th>
        
    </thead>
    <tbody>
      <tr><form action='' method='post'>
       
        
        <td><input name='username' placeholder=".$details['user_name']."></td>
        <td><input name='fullname' placeholder=".$details['full_name']."></td>
        <td><input name='email' placeholder=".$details['email']."></td>
        <td><input name='password' placeholder=".$details['password']."></td>
        <td><input name='role' placeholder=".$details['role']."></td>
        
        <td><button name='action' value='update'>update</button></td></form>
      </tr>
      
    </tbody>
  </table>";


}

