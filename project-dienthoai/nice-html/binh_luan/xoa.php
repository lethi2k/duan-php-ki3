<?php 
include '../quantri/db.php';
if (isset($_GET['maxoa'])) {
 	$maxoa=$_GET['maxoa'];
 	$sql="delete from binhluan where id='$maxoa'";
 	$kq=$conn->prepare($sql);
 	if ($kq->execute()) {
 		header("Location:binhluan.php");
 	}
 	else{
 		echo "Lỗi xóa";
 	}
 } 
 ?>
