<?php 
require "../quantri/index.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .haha {
            margin: 0px auto;
            padding: 10px;
            margin-left: 250px;
        }
    </style>
</head>
<body>
     <div class="haha"><br>
        <article>
        <form action="" method="post" enctype="multipart/form-data">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Tên Công Ty</span>
                </div>
                <input type="text" class="form-control" placeholder="Tên Công Ty" name="tencty" aria-label="Tên Công Ty" aria-describedby="addon-wrapping" minlength="1" required>
            </div><br><br>
             <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Email</span>
                </div>
                <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email" aria-describedby="addon-wrapping" minlength="1" required>
            </div><br><br>
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Số Điện Thoại</span>
                </div>
                <input type="text" class="form-control" placeholder="Số Điện Thoại" name="sdt" aria-label="Số Điện Thoại" aria-describedby="addon-wrapping" minlength="1" required>
            </div><br><br>
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Logo</span>
                </div>
                <input type="file" class="form-control" placeholder="" name="logo" aria-label="" aria-describedby="addon-wrapping" minlength="1" required>
            </div><br><br>
         <button type="submit" class="btn btn-success" name="btn_luu">Thêm</button>
        </form>

    </article>
                
            </div>
            <?php
    if(isset($_POST['btn_luu'])){
    $errors= array();
    $target_dir = "";
    $target_file = $target_dir . basename($_FILES['logo']['name']);
    // Kiểm tra kiểu file hợp lệ
    $type_file = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        echo "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        exit();
    }
    //Kiểm tra kích thước file
    $size_file = $_FILES['logo']['size'];
    if ($size_file > 5242880) {
        echo "File bạn chọn không được quá 5MB";
        exit();
    }
        if (empty($error)) {
        if (move_uploaded_file($_FILES["logo"]["tmp_name"],"images/".$target_file)) {
            $flag = true;
        }
        $tencty=$_POST['tencty'];
        $email=$_POST['email'];
        $sdt=$_POST['sdt'];
        $sql="insert into setting values('','$tencty','$email','$sdt','$target_file')";
        $kq=$conn->exec($sql);
        if($kq==1){
             header("Location:setting.php");
        }
        else{
            echo "không thêm được dữ liệu";
        }
    }
}
    ?>
        
</body>
</html>
