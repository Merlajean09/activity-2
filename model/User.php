<?php
include '../database/db.php';
header('Content-Type: application/json');
class UserModel extends Database
{
    public function create($params)
    {
        $requiredFields = ['username','email','password'];

        foreach ($requiredFields as $key){
            if(empty($params[$key])) {
                return ['message' => "$key is required" ];
            }
        }
        // if(empty($params['username'])){
        //     return ['message' => 'username is required'];
        // }
        // if(empty($params['email'])){
        //     return ['message' => 'email is required'];
        // }
        // if(empty($params['password'])){
        //     return ['message' => 'password is required'];
        // }
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
        $getAll = $this->conn->query("SELECT * FROM user");
        $result = $getAll->fetch_all(MYSQLI_ASSOC);
        if ($result){
            return $result;
        }
          
       
    }

    public function Search($params)
    {
        if(empty($params['email']))
        {
            return ['message'=> 'email is required'];
        }

        $email = $params['email'] ?? '';
            $isSearch = $this->conn->query("SELECT * FROM user WHERE email LIKE '%$email%'");
            $result = $isSearch->fetch_all(MYSQLI_ASSOC);
              if ($isSearch->num_rows > 0){
                return $result;
              }else{
                return json_encode(['message' => 'No record found!']);
              }
             
             
    }


}

?>