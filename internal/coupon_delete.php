<?php
require "dbconnect.php";

$sql="DELETE FROM coupon WHERE coupon_id=?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);

$id = $_REQUEST['id'];
$stmt->execute();

$stmt->close();
$mysqli->close();

// echo "<a href=index.php>Return to guest list</p>";
header("Location: ../?p=coupon_manage");
?>