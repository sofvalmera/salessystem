<?php

class Db{
    protected $conn;
    public $dbName = 'shoessales';

    public function db_connect(){
        $this->conn = new mysqli('localhost', 'root', '', $this->dbName);
        if($this->conn){
            return json_encode(
                [
                    'message' => 'Database is Successfully Created!'
                ]
                );
        }
    }
}



?>