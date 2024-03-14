<?php
include '../database/db.php';
header('Content-Type: application/json');
class UserModel extends Database
{
    public function create($params)
    {
        if(empty($params['username'])){
            return ['message' => 'username is required'];
        }
        if(empty($params['email'])){
            return ['message' => 'email is required'];
        }
        if(empty($params['password'])){
            return ['message' => 'password is required'];
        }
        $username = $params['username'];
        $email = $params['email'];
        $password = $params['password'];

        $checkMail = $this->conn->query("SELECT * FROM user WHERE email = '$email'");
         if($checkMail->num_rows > 0){
            return ['message' => 'naay email'];
         }

         $isInserted = $this->conn->query("INSERT INTO user (username, email, password)
         VALUES ('$username', '$email','$password')
         ");


         if ($isInserted) 
         {
            return ['message' => 'inserted successfully'];
         }
    }


    public function getAll()
    {
        $getAll = $this->conn->query("SELECT * FROM users");
        
        if ($getAll->num_rows > 0)
          $result = $getAll->fetch_all(MYSQLI_ASSOC);
          return $result;
    }

    public function Search($params)
    {
        if(empty($params['email']))
        {
            return ['message'=> 'email is required'];
        }

        $email = $params['email'] ?? '';
            $isSearch = $this->conn->query("SELECT * FROM user WHERE email LIKE '%email%'");

              if ($isSearch->num_rows > 0)
              $result = $isSearch->fetch_all(MYSQLI_ASSOC);
              return $result;
    }


}

?>