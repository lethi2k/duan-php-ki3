<?php 
function danhsachtheloai(){
	$qr = "select * from danhmuc";
	return mysql_query($qr);
}

 ?>