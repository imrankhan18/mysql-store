<?php
include('DB.php');

    class User extends DB
    {
        public int $user_id;
        public string $username;
        public string $email;
        public string $password;
        

        // public function __construct($username, $email, $password)
        // {
        //     // $this->user_id =$user_id;
        //     $this->username = $username;
        //     $this->email = $email;
        //     $this->password = $password;
            
        // }

        public function userDetail($username, $email, $password)
        {
            // $this->user_id =$user_id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            
        }

        public function addUser($user){
            DB::getInstance()->exec("INSERT INTO users(user_name,email,password) 
            VALUES('$user->username','$user->email','$user->password');"
            );
            
        }
    
        public function signInUser($email,$password){

            
            //DB::getInstance()->exec("INSERT INTO signin(email,password) 

            $stmt = DB::getInstance()->prepare("SELECT email,password FROM users");
            $stmt->execute();
            //VALUES('$sign->email','$sign->password');"
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
           // print_r($stmt->fetchAll());

            $array=$stmt->fetchAll();

            foreach($array as $key=>$val){
        
            if($email==$val['email']){
                echo "matched";
                }
                else{
                    echo "false";
                }
            }
            
        
       
      } 
     }
?>