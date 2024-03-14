<?php
include '../database/db.php';
class UserTable extends Database
{
    public function createTbl()
    {
        $IsCreated = $this->conn->query( "CREATE TABLE IF NOT EXISTS user( 
            id int primary key auto_increment,
            username varchar(255) not null,
            email varchar(255) not null UNIQUE,
            password varchar(255) not null
        )engine=InnoDB");

        if ($IsCreated == true){
            return ['message' =>'users table create successfully'];
        }
       
    }
}



?>