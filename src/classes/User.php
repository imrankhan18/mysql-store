<?php
use App\DB;

include('DB.php');

class User extends DB
{
    public int $checkout_id;
    public string $checkoutname;
    public string $email;
    public string $password;
    public string $cpassword;
    public string $role;

    public function userDetail($fullname, $checkoutname, $email, $password, $cpassword,$role)
    {
        //$this->user_id =$checkout_id;
        $this->fullname = $fullname;
        $this->username = $checkoutname;
        $this->email = $email;
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->role = $role;
    }
    public $status='pending';
    public function addUser($user)
    {
        DB::getInstance()->exec(
            "INSERT INTO users(full_name,user_name,email,password,confirm_password,role,status) 
            VALUES('$user->fullname','$user->username','$user->email','$user->password','$user->cpassword','$user->role','$user->status');"
        );
    }


    public function signInUser()
    {


        //DB::getInstance()->exec("INSERT INTO signin(email,password) 

        $stmt = DB::getInstance()->prepare("SELECT user_id,email,password,role,status FROM users");
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function showDetails()
    {
   
        $stmt = DB::getInstance()->prepare("SELECT * FROM users");
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }
    public function updateDetail($id, $name, $checkoutname, $email, $password, $role, $status)
    {
            DB::getInstance()->exec("UPDATE users SET name='$name',username='$checkoutname',email='$email',password='$password',role='$role',status='$status' WHERE user_id=$id");

        }

        
    
}


