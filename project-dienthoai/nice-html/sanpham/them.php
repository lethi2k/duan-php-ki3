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
        p{
            color: red;
            font-weight: 600;
            font-size: 18px;
        }
    </style>
</head>
<body>
     <div class="haha"><br>
  <article>
    <?php
    $ten=$gia=$giamgia=$soluong=$chitietsp=$thongbao="";
    if(isset($_POST['btn_luu'])){
    $errors= array();
    $target_dir = "";
    $target_file = $target_dir . basename($_FILES['anhdd']['name']);
    // Kiểm tra kiểu file hợp lệ
    $type_file = pathinfo($_FILES['anhdd']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        $thongbao = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
    }
    //Kiểm tra kích thước file
    $size_file = $_FILES['anhdd']['size'];
    if ($size_file > 5242880) {
        $thongbao = "File bạn chọn không được quá 5MB";
    }
        if (empty($error)) {
        if (move_uploaded_file($_FILES["anhdd"]["tmp_name"],"images/".$target_file)) {
            $flag = true;
        }
        $tensp=$_POST['tensp'];
        if ($tensp =="") {
            $ten = "Tên không được bỏ trống <br>";
        }
        $chitietsp=$_POST['area1'];
        if ($chitietsp =="") {
            $chitietsp = "chi tiết không được bỏ trống <br>";
            }
        $soluong=$_POST['soluong'];
        if (!is_numeric($soluong)){
            $soluong = 'Yêu cầu nhập số lượng <br>';
        }
        $gia=$_POST['gia'];
        if (!is_numeric($gia)){
            $gia = 'Yêu cầu nhập giá <br>';
        }
        $giamgia=$_POST['giamgia'];
         if (!is_numeric($giamgia)){
            $giamgia = 'Yêu cầu nhập giảm giá <br>';
        }
        else{
        $iddm=$_POST['iddm'];
        $sql="insert into sanpham values('','$tensp','$target_file','$gia','$giamgia','$chitietsp','$soluong','0','$iddm')";
        $kq=$conn->exec($sql);
        if($kq==1){
              header('Location:show.php');
        }
        else{
            echo "không thêm được dữ liệu";
        }
    }
}
}
    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Thêm Sản Phẩm</h2><br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping" >Tên Sản Phẩm</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Tên Sản Phẩm" name="tensp" aria-label="Tên Sản Phẩm" aria-describedby="addon-wrapping">
                </div><br>
                <p><?php echo $ten; ?></p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="anhdd" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div><br>
                <p><?php echo $thongbao; ?></p>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Giá </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Giá " name="gia" aria-label="Giá " aria-describedby="addon-wrapping">
                </div><br>
                <p><?php echo $gia; ?></p>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Giảm Giá</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Giảm Giá" name="giamgia" aria-label="Giảm Giá" aria-describedby="addon-wrapping">
                </div><br>
                <p><?php echo $giamgia; ?></p>
                <br>
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Số Lượng</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Số Lượng" name="soluong" aria-label="Số Lượng" aria-describedby="addon-wrapping">
                </div>
                <br>
                <p><?php echo $soluong; ?></p>
              <!--   <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Id Danh Mục</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Danh Mục" name="iddm" aria-label="Thêm Danh Mục" aria-describedby="addon-wrapping">
                </div> -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Iddm</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="iddm" >
                        <?php 
                        $sql="select * from danhmuc";
                        $kq=$conn ->query($sql);
                        foreach ($kq as $key => $row){
                        ?>
                        <option  selected value="<?php echo $row['iddm'];?>" ><?php echo $row['tendm']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                  <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Chi Tiết Sản Phẩm</span>
                        <div id="sample">
                            <textarea name="area1" cols="210" class="ha">
                </textarea>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="btn_luu">Thêm</button>
            </form>
            
        </article>
                
            </div>
</body>
</html>