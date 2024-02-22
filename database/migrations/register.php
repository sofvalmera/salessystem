<?php
include '../migrations/users.php';

$new = new Users();
$new->TableCreate();
echo $new->Register($_POST);
?>