<?php
include '../model/User.php';
$user_model = new UserModel();
$result = $user_model->create($_POST);
echo json_encode($result);

?>