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
     <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function() {
            nicEditors.allTextAreas()
        });
        //]]>
    </script>
    <style>
        .haha {
            margin: 0px auto;
            padding: 10px;
            margin-left: 250px;
        }
        .input-group-text{
            width: 150px;
        }
    </style>
</head>
<body>
     <div class="haha"><br>
  <article>
    <?php 
if (isset($_GET['masua'])) {
    $masua=$_GET['masua'];
    $sql="select * from sanpham where idsp='$masua'";
    $kq=$conn->query($sql)->fetch();
}
    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Sửa Sản Phẩm</h2><br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping" >Tên Sản Phẩm</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Tên Sản Phẩm" value="<?php echo $kq['tensp']?>" name="tensp" aria-label="Tên Sản Phẩm" aria-describedby="addon-wrapping">
                </div><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                    <img src="images/<?php echo $kq['anhdd']?>" alt="" width="50">
                    <input type="file" name="anhdd"><br>
                    </div>
                </div><br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Giảm Giá</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Giá" value="<?php echo $kq['gia']?>" name="gia" aria-label="Giá " aria-describedby="addon-wrapping">
                </div><br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Giảm Gốc</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Giảm Giá" value="<?php echo $kq['giamgia']?>" name="giamgia" aria-label="Giảm Giá" aria-describedby="addon-wrapping">
                </div><br>
                <br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Số Lượng</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Số Lượng" value="<?php echo $kq['soluong']?>" name="soluong" aria-label="Số Lượng" aria-describedby="addon-wrapping">
                </div>
                <br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Id Danh Mục</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Danh Mục" value="<?php echo $kq['iddm']?>" name="iddm" aria-label="Thêm Danh Mục" aria-describedby="addon-wrapping">
                </div>
                <br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Chi Tiết Sản Phẩm</span>
                        <div id="sample">
                            <textarea name="area1" cols="210" class="ha" value="<?php echo $kq['tensp']?>">
                </textarea>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="btn_luu">Sửa</button>
            </form>
      <?php
    if(isset($_POST['btn_luu'])){
        $tensp=$_POST['tensp'];
        $errors= array();
        $target_dir = "";
        $target_file = $target_dir . basename($_FILES['anhdd']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['anhdd']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if(empty($_FILES['anhdd']['name'])){
        $nameA=$kq['anhdd'];
        }
        if ($_FILES['anhdd']['name']>5242880) {
            echo "ảnh không được quá 5 mb";
            exit();
        }
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
        echo "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        exit();
    }
        $gia=$_POST['gia'];
        $chitietsp=$_POST['area1'];
        $giamgia=$_POST['giamgia'];
        $soluong=$_POST['soluong'];
        $iddm=$_POST['iddm'];
        if (empty($error)) {
        if (move_uploaded_file($_FILES["anhdd"]["tmp_name"],"images/".$target_file)) {
            $flag = true;
        }
         $sqlsua="update sanpham set tensp='$tensp',anhdd='$target_file',gia='$gia',giamgia='$giamgia',chitietsp='$chitietsp',soluong='$soluong',iddm='$iddm' where idsp ='$masua'";
        $kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                        ob_start();
                    header('Location:show.php');
                     die();
                      }
                      else{
                          echo "lỗi";
                      }
            }}
ob_end_flush();
     ?>
        </article>
                
            </div>
</body>
</html>
