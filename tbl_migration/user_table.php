<?php
include '../migration/userTbl.php';

$tbl = new UserTable();
$result = $tbl->createTbl();
echo json_encode($result);

?>