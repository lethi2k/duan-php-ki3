<?php 
include '../quantri/db.php';
if (isset($_GET['maxoa'])) {
 	$maxoa=$_GET['maxoa'];
 	$sql="delete from slider where id='$maxoa'";
 	$kq=$conn->prepare($sql);
 	if ($kq->execute()) {
 		header("Location:slider.php");
 	}
 	else{
 		echo "Lỗi xóa";
 	}
 } 
 ?>
