<?php 
if(isset($_GET['catid'])){
	$_SESSION['bookSearch']['category'] = $_GET['catid'];
	$_SESSION['bookSearch']['author'] = "";
	$_SESSION['bookSearch']['priceFrom'] = "";
	$_SESSION['bookSearch']['priceTo'] = "";
	unset($_SESSION['bookSearch']['searchbox']);
	header('Location: index.php?p=products');
}
die();
?>