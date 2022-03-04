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


function Details()
{
    $details = new User();

    $_SESSION['displayDetails'] = "<table class='table table-striped table-sm'>
    <thead>
              <tr>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Email </th>
                <th>Password</th>
                <th>Role</th>
              </tr></thead><tbody>";
    foreach ($details->showDetails() as $key => $value) {
        $_SESSION['displayDetails'] .= "<tr>
                <td>" . $value['user_name'] . "</td>
                <td>" . $value['full_name'] . "</td>
                <td>" . $value['email'] . "</td>
                <td>" . $value['password'] . "</td>
                <td>" . $value['role'] . "</td>
                
              </tr></tbody></table>";
    }
}
