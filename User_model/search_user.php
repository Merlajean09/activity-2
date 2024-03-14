<?php
include '../model/User.php';

$user_model = new UserModel();
$data = $user_model->Search($_GET);
echo json_encode($data);

?>