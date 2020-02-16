<?php
include_once("dbconnect.php");

$sql = "UPDATE coupon SET code=?, discount=?, is_enable=?, valid_from=?, valid_to=?, total_usage=? WHERE coupon_id=?";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("siissii", $_REQUEST['code'], $_REQUEST['discount'], $_REQUEST['is_enable'], $_REQUEST['valid_from'],  $_REQUEST['valid_to'], $_REQUEST['total_usage'], $_REQUEST['coupon_id']);


$stmt->execute();

$stmt->close();

$mysqli->close();

// echo "<a href=index.php>Return to guest list</p>";
header("Location: ../?p=coupon_manage");
?>