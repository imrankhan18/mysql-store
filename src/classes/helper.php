<?php
use App\DB;

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
            $_SESSION['user_id'] = $val['user_id'];
            // echo "hello";
            // echo $_SESSION['user_id'];
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
    $user = new User();
    foreach ($user->showDetails() as $key => $val) {
        if ($val['user_id'] == $id) {
            $_SESSION['details'] = $val;
            Details();
            return;
        }
    }
}

function Details()
{
    $value = $_SESSION['details'];
    $_SESSION['displayDetailsUser'] = "<table class='table table-striped table-sm'>
    <thead>
              <tr>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Email </th>
                <th>Password</th>
                <th>Role</th>
              </tr></thead><tbody>
              <tr>
                <td>" . $value['user_name'] . "</td>
                <td>" . $value['full_name'] . "</td>
                <td>" . $value['email'] . "</td>
                <td>" . $value['password'] . "</td>
                <td>" . $value['role'] . "</td>
                <td>  <form action='../classes/editdetails.php' method='post'><button name='action' value='".$value['user_id']."'>Edit</button></form></td>
                
              </tr></tbody></table>";
}

function editDetails()
{
    $details = $_SESSION['details'];
    $_SESSION['editDisplayDetails'] = "<div class='table-responsive'>
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
    <tr>
       <form action='' method='post'>
        
        <td><input name='username' placeholder=" . $details['user_name'] . "></td>
        <td><input name='fullname' placeholder=" . $details['full_name'] . "></td>
        <td><input name='email' placeholder=" . $details['email'] . "></td>
        <td><input name='password' placeholder=" . $details['password'] . "></td>
        <td><input name='role' placeholder=" . $details['role'] . "></td>
        
        <td><button name='action' value='".$details['user_id']."'>update</button></td></form>
      </tr>
      
    </tbody>
  </table>";
}



function DisplayUserDetails()
{
    $user=new User();
    $completeDetails=$user->showDetails();
    $_SESSION['completeDetail']="";
    $_SESSION['completeDetail'].= "<div class='table-responsive'>
    <table class='table table-striped table-sm'>
    <thead>
      <tr>
        
        <th scope='col'>User Name</th>
        <th scope='col'>Full Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Password</th>
        <th scope='col'>Role</th>
        <th scope='col'>status</th>
        
    </thead>
    <tbody>";

    foreach($completeDetails as $key=>$val)
    {
        $act="approve";
        $act1='app';
        if($val['status']=='approve')
         {
             $act1='dis';
             $act='dissapprove';
         }
       if($val['role']!='admin')
        {
                    $_SESSION['completeDetail'].=" <tr> <td>" . $val['user_name'] . "</td>
                <td>" . $val['full_name'] . "</td>
                <td>" . $val['email'] . "</td>
                <td>" . $val['password'] . "</td>
                <td>" . $val['role'] . "</td>

                <td>" . $val['status'] . "</td>
                <td><form action=''method='post'><button name='authenticate' value='".$act1."-".$val['user_id']."'>".$act."</button></form></td></tr>";}

    }
    $_SESSION['completeDetai'].="</tbody></table>";
}


function changeStatus($id,$status)
{
    $user=new User();
    $user->change($id, $status);
    DisplayUserDetails();
}