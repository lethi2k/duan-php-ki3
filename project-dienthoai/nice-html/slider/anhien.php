<?php
include '../quantri/db.php';
if (isset($_GET['anhien'])) {
    $anhien=$_GET['anhien'];
}
    $sql="select * from slider where id='$anhien'";
    $kq=$conn->query($sql)->fetch();
    if ($kq['trangthai']==1) {
    	$sqlsua="UPDATE slider SET trangthai ='0' WHERE id='$anhien'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("Location:slider.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
    else{
    	$sqlsua="UPDATE slider SET trangthai='1' WHERE id='$anhien'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("location:slider.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
    ?>