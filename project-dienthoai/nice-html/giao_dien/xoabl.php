<?php 
include '../quantri/db.php';
if (isset($_GET['maxoa'])&&isset($_GET['chitiet'])) {
 	$maxoa=$_GET['maxoa'];
 	$chitiet=$_GET['chitiet'];
 	$sql="delete from binhluan where id='$maxoa'";
 	$kq=$conn->prepare($sql);
 	if ($kq->execute()) {
 		header("Location:chitietsp.php?chitiet=$chitiet");
 	}
 	else{
 		echo "Lỗi xóa";
 	}
 } 
 ?>