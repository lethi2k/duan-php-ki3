<?php 
mysqli_connect('localhost', 'root', '') or die ('Không thể kết nối tới database');
mysql_select_db("thildph07746_duanmau");
function get_user($user,$pass){
$sql=mysql_query("SELECT * FROM user WHERE user='$user' and pass='$pass'");
if (mysql_num_rows($sql)>0) {
	$row=mysql_fetch_array($sql);
	$_SESSION['currUser']=$row['user'];
	if ($row['vaitro']==1) {
		$_SESSION['currUser']=$row['vaitro'];
		header("Location:index.php");
	}
}
else{
	header("Location../giao_dien/index.php");
}
}

 ?>