<?php
include '../model/User.php';

$getAll = new UserModel();
$data = $getAll->getAll();
echo json_encode($data);

?>