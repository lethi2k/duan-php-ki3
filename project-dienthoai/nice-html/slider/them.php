<?php require "../quantri/index.php"?>
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
            <h2>Thêm Slider</h2>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="logo" minlength="1" required>
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div><br><br>
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Thêm Tiêu Đề</span>
                </div>
                <input type="text" class="form-control" placeholder="Thêm Danh Mục" name="tieude" aria-label="Thêm Danh Mục" aria-describedby="addon-wrapping" minlength="1" required>
            </div><br><br>
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Thêm Link</span>
                </div>
                <input type="text" class="form-control" placeholder="Thêm Danh Mục" name="link" aria-label="Thêm Danh Mục" aria-describedby="addon-wrapping" minlength="1" required>
            </div><br><br>
            <button type="submit" class="btn btn-success" name="btn_luu">Thêm</button>
        </form>
        <?php
    if(isset($_POST['btn_luu'])){
        $nameA=$_FILES['logo']['name'];
        $tmA=$_FILES['logo']['tmp_name'];
        move_uploaded_file($tmA,"images/".$nameA);
        $tieude=$_POST['tieude'];
        $link=$_POST['link'];
        $sql="insert into slider values('','$nameA','$tieude','1','$link')";
        $kq=$conn->exec($sql);
        if($kq==1){
             header("Location:slider.php");
        }
        else{
            echo "không thêm được dữ liệu";
        }
    }
    ?>
    </article>
            </div>
</body>
</html>