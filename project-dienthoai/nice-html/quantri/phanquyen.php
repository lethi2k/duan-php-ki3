<?php
include '../quantri/db.php';
if (isset($_GET['anhien'])) {
    $anhien=$_GET['anhien'];
}
    $sql="select * from user where user='$anhien'";
    $kq=$conn->query($sql)->fetch();
    if ($kq['user']==1) {
    	$sqlsua="UPDATE user SET user ='0' WHERE user='$anhien'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("Location:user.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
      else{
    	$sqlsua="UPDATE user SET user='1' WHERE user='$anhien'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("location:user.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
    ?>