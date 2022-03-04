<?php
include('DB.php');

class User extends DB
{
    public int $user_id;
    public string $username;
    public string $email;
    public string $password;
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

    public function addUser($user)
    {
        DB::getInstance()->exec(
            "INSERT INTO users(full_name,user_name,email,password,confirm_password,role) 
            VALUES('$user->fullname','$user->username','$user->email','$user->password','$user->cpassword','$user->role');"
        );
    }

    public function signInUser()
    {


        //DB::getInstance()->exec("INSERT INTO signin(email,password) 

        $stmt = DB::getInstance()->prepare("SELECT email,password FROM users");
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }
}
