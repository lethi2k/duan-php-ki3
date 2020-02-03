<?php
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
    <div class="container">
        <form action="#" method="post" enctype="application/x-www-form-urlencoded">
           <center>
            <h1>Đăng Kí Thành Viên</h1>
        </center><br>
        <div class="row">
            <div class="col-sm-2">
                <label for="">Tài Khoản</label>
            </div>
            <div class="col-sm-9">
                <input type="text" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Thông Tin" name="user" minlength="1" required>
            </div>
        </div>
        <!-- thẻ Tên-->
        <br><br>
        <div class="row">
            <div class="col-sm-2">
                <label for="">Mật khẩu</label>
            </div>
            <div class="col-sm-9">
                <input type="password" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Thông Tin" name="pass" minlength="1" required>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-2">
                <label for="">Họ Và Tên :</label>
            </div>
            <div class="col-sm-9">
                <input type="text" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Thông Tin" name="name" minlength="1" required>
            </div>
        </div>
        <br><br>
        
        <div class="row">
            <div class="col-sm-2">
                <label for="">Địa Chỉ</label>
            </div>
            <div class="col-sm-9">
                <input type="text" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Thông Tin" name="diachi" minlength="1" required>
            </div>
        </div><br>
        <button type="submit" class="btn btn-primary" name="btn_luu">Đăng Kí</button><br><br>
        <a href="login.php" class="thea"><button type="button" class="btn btn-outline-success">Đăng Nhập</button></a>
        </form>
    </div>
    <?php
if (isset($_POST['btn_luu'])) {
    $user=$_POST['user'];
    $pass=md5($_POST['pass']);
    $name=$_POST['name'];
    $diachi=$_POST['diachi'];
    $sql="insert into user values('$user','$pass','null','$name','$diachi','Kích Hoạt','0',CURRENT_TIMESTAMP())";
    $kq=$conn->exec($sql);
        if($kq==1){
              echo "Đăng Kí Thành Công";
        }
        else{
            echo "không thêm được dữ liệu";
        }
}
     ?>
</body>

</html>
