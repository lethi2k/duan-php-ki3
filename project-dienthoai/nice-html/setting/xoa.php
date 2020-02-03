<?php 
include '../quantri/db.php';
if (isset($_GET['maxoa'])) {
 	$maxoa=$_GET['maxoa'];
 	$sql="delete from setting where id='$maxoa'";
 	$kq=$conn->prepare($sql);
 	if ($kq->execute()) {
 		header("Location:setting.php");
 	}
 	else{
 		echo "Lỗi xóa";
 	}
 } 
 ?>
