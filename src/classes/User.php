<?php
include('DB.php');

class User extends DB
{
    public int $user_id;
    public string $username;
    public string $email;
    public string $password;
    public string $cpassword;
    public string $role;

    public function userDetail($fullname, $username, $email, $password, $cpassword,$role)
    {
        //$this->user_id =$user_id;
        $this->fullname = $fullname;
        $this->username = $username;
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
    public function updateDetail($id, $name, $username, $email, $password, $role, $status)
    {
            DB::getInstance()->exec("UPDATE users SET name='$name',username='$username',email='$email',password='$password',role='$role',status='$status' WHERE user_id=$id");

        }

        
    
}


