<?php 
include '../quantri/db.php';
if (isset($_GET['maxoa'])) {
 	$maxoa=$_GET['maxoa'];
 	$sql="delete from sanpham where idsp='$maxoa'";
 	$kq=$conn->prepare($sql);
 	if ($kq->execute()) {
 		header("Location:show.php");
 	}
 	else{
 		echo "Lỗi xóa";
 	}
 } 
 ?>
