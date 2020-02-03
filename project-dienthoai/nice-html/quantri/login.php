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
        $thongbao="";
        if(isset($_POST['btn_luu'])){
            $tk=$_POST['taikhoan'];
            $mk=md5($_POST["matkhau"]);
            $sql="SELECT * FROM user WHERE user='$tk' and pass='$mk'";
            $kq=$conn->query($sql);
            $row_count = $kq->rowCount();
            if($row_count==1){
            $kr=$conn->query($sql)->fetch();
            $_SESSION['user']=$kr['user'];
            $_SESSION['vaitro']=$kr['vaitro'];
            $_SESSION['password']=$kr['pass'];
                header("Location:../giao_dien/index.php");
            }else{
                $thongbao ="Bạn nhập sai mật khẩu hoặc tài khoản";
            }
        }
        ?>
    <div class="container">
        <form action="#" method="post" enctype="application/x-www-form-urlencoded">
            <center>
            <h1>Đăng Nhập Hệ Thống</h1>
        </center><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">User name</span>
            </div>
            <input type="text" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Thông Tin" name="taikhoan">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>
            <input type="password" aria-label="First name" class="form-control" placeholder="Mời Bạn Nhập Mật Khẩu" name="matkhau">
            
        </div> <br>
        <div class="col"><a href="#" title="Ver Carasteres"><?php echo $thongbao;?></a></div><br>
        <button type="submit" class="btn btn-primary" name="btn_luu">Đăng Nhập</button><br><br>
        <a href="dangki.php" class="thea"><button type="button" class="btn btn-outline-success">Đăng Kí</button></a>
        <a href="../giao_dien/index.php" class="thea"><button type="button" class="btn btn-outline-success">Giao Diện</button></a>
        </form>
    </div>
    
</body>

</html>
