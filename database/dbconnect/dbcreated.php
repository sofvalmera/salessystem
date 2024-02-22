<?php
include '../dbconnect/database.php';

$new = new Db();
echo $new->db_connect();
?>