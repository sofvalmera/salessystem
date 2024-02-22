<?php
include '../dbconnect/database.php';
header('Content-type: application/json; charset=UTF-8');
class Users extends Db{
    public $tableName = 'users';

    public function TableCreate(){
        $this->db_connect();

        $created = $this->conn->query("CREATE TABLE IF NOT EXISTS $this->tableName
        (
            id int auto_increment primary key,
            first_name varchar(255) not null,
            last_name varchar(255) not null,
            email varchar(255) not null UNIQUE,
            password varchar(255) not null
            )engine=Innodb

        ");
        if($created){
            return json_encode(['message' => 'table Created']);
    }
}
    public function Register($data){
      $first_name = $data['first_name'];
      $last_name = $data['last_name'];
      $email = $data['email'];
      $password = $data['password'];

      $isEmail = $this->conn->query("SELECT * FROM $this->tableName WHERE email='$email'");
      if($isEmail->num_rows>0){
        return json_encode(['message'=> 'Email is Already Exists']);
      }
      $inserted = $this->conn->query("INSERT INTO $this->tableName (first_name, last_name, email, password)
      VALUES('$first_name', '$last_name', '$email', '$password')");
     if($inserted){
        header('Location: http://localhost/salessystem/dashboard/dashboard.html');
     }else{
        return json_encode(['message'=> 'Failed!']);
     }
    }
    public function logIn($data){
        $email = $data['email'];
        $password = $data['password'];

        $log = $this->conn->query("SELECT * FROM $this->tableName WHERE email = '$email' AND password='$password'");
        if($log->num_rows > 0 ){
            header('Location: http://localhost/salessystem/dashboard/dashboard.html');
        }else{
            return json_encode(
                [
                    'message' => 'Email or Password is Invalid'
                ]
                );
        }
    }
}


?>