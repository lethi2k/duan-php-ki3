<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lorgin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .container {
            max-width: 800px;

            border: 1px solid #e9ecef;
            padding: 10px;
        }

        h1 {
            color: green;
        }

    </style>
</head>

<body>
    <?php 
    $thongbao='';
    if (isset($_POST['btn_luu'])) {
       $a=$_SESSION['user'];
       $b=$_SESSION['password'];
       $taikhoan=$_POST['taikhoan'];
       $matkhau=md5($_POST["matkhau"]);
       $newmatkhau=md5($_POST["newmatkhau"]);
       if($taikhoan==$a && $matkhau==$b) {
          $sqlsua="UPDATE user SET pass='$newmatkhau' WHERE user='$a'";
          $kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                          $thongbao= "đổi mật khẩu thành công";
                      }
                      else{
                          $thongbao= "lỗi";
                      }
       }else{
        $thongbao="Mật Khẩu Hoặc Tài Khoản không đúng vui lòng nhập lại";
       }
    }
     ?>
    <div class="container">
        <form action="#" method="post" enctype="application/x-www-form-urlencoded">
            <center>
            <h1>Xin Chào <?php echo  $_SESSION['user']; ?> Bạn Đang Đổi Mật Khẩu</h1>
        </center><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">User name</span>
            </div>
            <input type="text" aria-label="First name" class="form-control"  placeholder="Mời Bạn Nhập Thông Tin" name="taikhoan" value="<?php echo  $_SESSION['user']; ?>">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Password Cũ</span>
            </div>
            <input type="password" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Mật Khẩu" name="matkhau">
        </div> <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Password Mới</span>
            </div>
            <input type="password" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Mật Khẩu" name="newmatkhau">
        </div> <br>
        <div class="col"><a href="#" title="Ver Carasteres"><?php echo $thongbao; ?></a></div><br>
        <button type="submit" class="btn btn-primary" name="btn_luu">Đổi Mật Khẩu</button><br><br>
        <a href="login.php" class="thea"><button type="button" class="btn btn-outline-success">Đăng Nhập</button></a>
        </form>
    </div>
    
</body>

</html>
