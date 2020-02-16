<?php
require "dbconnect.php";
$sql = "INSERT INTO coupon (code, discount, is_enable, valid_from,valid_to,total_usage) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("siissi", $_REQUEST['code'],  $_REQUEST['discount'], $_REQUEST['is_enable'], $_REQUEST['valid_from'],  $_REQUEST['valid_to'], $_REQUEST['total_usage']);

$stmt->execute();

$stmt->close();
$mysqli->close();


header("Location: ?p=coupon_manage");
?>