<?php
ob_start();
session_start();
include '../quantri/db.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #canchinh {
            height: 50px;
        }

        #canchinh img {
            width: auto;
            height: 50px;
        }
        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}
        #len {
            float: left;
            margin-left: 3px;
        }
        .maubl {
            margin: auto;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        #phai{
            margin-left: 450px;
        }
         #food{
            margin-left: 10px;
            margin-top: 10px;
        }
        #len {
            float: left;
            margin-left: 3px;
        }

        input[type=text] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #007bff;;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #007bff;;
        }

        .imgbl {
            float: left;
            padding: 0px 20px 0px 0px;
        }

        .binhluan {
            border: 1px solid #bfbebe;
            padding: 30px;
            padding-bottom: 50px;
        }

        #cu {
            font-size: 14px;
        }

        .phantrang {
            clear: both;
            float: right;
        }

        #theh5 {
            font-size: 25px;
            font-weight: bold;
        }

        #gui {
            float: right;

        }

        .phai {
            float: right;
        }

        #h1 {
            border-bottom: 3px solid #007bff;
            font-size: 17px;
            font-weight: 450;
        }

        .menu {
            background-color: #007bff;;
            padding: 10px 0px 10px 0px;

        }

        .text {
            line-height: 1.9;
            text-align: justify;
            text-indent: 50px;
            margin-top: 20px;
        }

        #dangnhap {
            font-size: 13px;
        }

        footer {
            clear: both;
            font-size: 13px;
            line-height: 1.7;
            border-top: 3px solid #007bff;
        }

        .card-title {
            font-size: 13px;
        }

        .menu ul li a {
            color: white;
        }

        #anh {
            min-height: 580px;
        }

        #tulam {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px;
        }

        #icont {
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 1rem;
            width: 20px;
        }

        #mauchu {
            color: red;
            font-size: 30px;
            font-weight: bold;
        }

        .logo {
            width: 200px;
            height: auto;
        }

        #search {
            margin-top: 4rem;
        }

        .dan {
            margin-top: 55px;
        }

        b {
            color: red;
        }

        #chua {
            max-width: 300px;
            height: auto;
            padding: 10px;
        }

    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="row">
                <div class="col-sm-3">
                    <img src="img/logo.jpg" class="logo" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="input-group mb-3" id="search">
                        <input id="nhap" type="text" class="form-control" placeholder="Mời Bạn Nhập Từ Cần Tìm Kiếm" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">Tìm Kiếm</button>
                    </div>
                </div>
                <div class="col-sm-3">
                    <p class="dan">Holtle: 0986966813 or 033334445 <br>Email: thildph07746@gmail.com</p>
                </div>
            </div>
        </header>
          <nav class="menu">
            <ul class="nav">
                <li class="nav-item">
                    <img src="img/_ionicons_svg_md-home.svg" alt="" id="icont">
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sanpham.html">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin Tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>
                  <?php if (isset($_SESSION['user'])) {
                     ?>
                <li class="nav-item">
                <a class="nav-link active" id="phai" href="../quantri/login.php"><?php echo  $_SESSION['user']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../quantri/huysession.php">Đăng Xuất</a>
                </li>
                <?php  }?>
                <?php if (!isset($_SESSION['user'])) {
                     ?>
                <li class="nav-item">
                <a class="nav-link active" id="phai" href="../quantri/login.php">Đăng Nhập</a>
                </li>
                     <?php  }?>
            </ul>
        </nav>
        <div class="w3-display-container">
    <?php
        $sql="select * from slider";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        ?>
        <?php if ($row['trangthai']==1) { ?>
  <a href="<?php echo $row['link'] ?>"><img class="mySlides demo" src="../slider/images/<?php echo $row['logo']; ?>" style="width:100%"></a>
        <?php 
}
    } 

        ?>
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script><br><br>

        <?php 
if (isset($_GET['chitiet'])) {
    $chitiet=$_GET['chitiet'];
    $sql="select * from sanpham where idsp='$chitiet'";
    $kq=$conn->query($sql);
     foreach ($kq as $key => $row){

         ?>
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
                Thông Tin Chi Tiết Về Sản Phẩm <?php echo $row['tensp']; ?>
            </button>
            <!--sản phẩm 1-->
            <div class="card mb-3" id="len">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="../sanpham/images/<?php echo $row['anhdd']; ?>" id="chua" class="card-img" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title" id="theh5"><?php echo $row['tensp']; ?></h5>
                            <?php 
                            $gia=$row['gia'];
                            $giamgia=$row['giamgia'];
                            $phantram=ceil((($giamgia-$gia)/$giamgia)*100);
                             ?>
                            <span id="cu"><b>Giá Bán: </b><del><?php echo number_format("$giamgia",3); ?>đ </del><br><button type="button" class="btn btn-primary" id="cu"> <?php echo $phantram ?>% </button><br><b> Chỉ Còn: </b><?php echo number_format("$gia",3); ?>đ</span><br><br>
                            <b>Số Lượng:</b> <input type="number" placeholder="1"><br><br>

                            <p><b>Mã Sp:</b> <?php echo $row['idsp']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <h3> Tin Tức Về Sản Phẩm <?php echo $row['tensp']; ?>:</h3>

            <p class="text"><?php echo $row['chitietsp']; ?></p>

        </div>
    <?php }} ?>
        <button type="button" class="list-group-item list-group-item-action active">
            Bình Luận Về Sản Phẩm:
        </button><br><br>
        <?php 
        $sql="SELECT * FROM binhluan INNER JOIN sanpham ON binhluan.idsp=sanpham.idsp where sanpham.idsp=$chitiet ORDER BY ngaydang DESC";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $value){
         ?>
        <div class="binhluan">
            <img src="img/bl.png" class="imgbl" alt="" width="50">
            <p><b><?php echo $value['user'] ?></b></p>
            <h6><?php echo $value['noidung'] ?></h6>
            <p class="phai"><?php echo $value['ngaydang'] ?></p>
            <?php 
            $sql="select * from sanpham where idsp='$chitiet'";
            $kq=$conn->query($sql)->fetch();
            $id=$kq['idsp'];
             ?>
            <?php if (isset($_SESSION['user'])) { 
                if ($_SESSION["user"] == $value["user"]) {
                ?>
            <a href="xoabl.php?maxoa=<?php echo $value['id']?>&&chitiet=<?php echo $id ?>" onclick="return confirm('bạn có muốn xóa không?')"><button type="button" class="btn btn-success">Xóa</button></a>
        <?php }} ?>
        </div>
        <?php } ?>
        <br>
        <?php if (isset($_SESSION['user'])) { ?>
        <div class="maubl">
            <center>
                <h2>Để Lại Câu Trả lời</h2>
            </center>
            <?php require "binhluan.php" ?>
        </div>
        <?php } ?>
        <br> 

        <i style="font-size:24px" class="fa fa-eye">
        <?php 
            echo $row['view'];
            $sqlsua="update sanpham set view=view+1 where idsp ='$chitiet'";
             $kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                      }
                      else{
                          echo "lỗi";
                      }
         ?>
        </i><br><br>
       
        <!--phần sản phẩm Mới nhất hiện nay-->
        <div>
            <h1 class="input-group-text" id="h1">Sản Phẩm Cùng Loại</h1>
        </div>
        <hr>
        <!--Đây là phần khung Chứa sản phẩm-->
        <?php
        $ab=$row['iddm'];
        $sql="SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.iddm=danhmuc.iddm where sanpham.iddm=$ab limit 0,5 ";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
            if ($row['idsp']!==$chitiet) {
            
         ?>
        <div class="card mb-3" id="len" style="max-width: 270px;">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <a class="tger" href="chitietsp.php?chitiet=<?php echo $row['idsp']?>"><img src="../sanpham/images/<?php echo $row['anhdd']; ?>" id="chua" class="card-img" alt="..."></a>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <?php 
                                    $gia=$row['gia'];
                                    $giamgia=$row['giamgia'];
                                    $phantram=ceil((($giamgia-$gia)/$giamgia)*100);
                                 ?>
                        <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                        <span id="cu"><del><?php echo number_format("$gia",3); ?>.đ </del><button type="button" class="btn btn-primary" id="cu"><?php echo $phantram ?></button><br><?php echo number_format("$giamgia",3); ?>.đ </span><br><br>
                        <a class="tger" href="chitietsp.php?chitiet=<?php echo $row['idsp']?>"><button type="button" id="cu" class="btn btn-outline-primary">Xem ngay</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
}
}
     ?>

        <!--kết thúc-->
    
        <!--ket thuc-->
        <footer>
            <div class="card">
                <div class="card-header">
                    <center>
                        <p>Mọi thắc mắc hoặc bị sự cố về bất cứ vấn đề gì xin hãy gọi điện thoại vào số 0986966813 để được hỗ trợ tốt nhất</p>
                    </center>
                </div>
                <div class="row" id="food">
                    <div class="col-sm-4">
                        <h5 class="card-title">Bạn Đang Gặp Sự Cố</h5>
                        <p class="card-text">Chúng tôi là đơn vị cung cấp sản phẩm chất lượng cao</p>
                        <a href="#" class="btn btn-primary" id="cu">Đến Trang Liên Hệ</a>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            Giới thiệu về công ty <br>
                            Câu hỏi thường gặp mua hàng <br>
                            Chính sách bảo mật <br>
                            Quy chế hoạt động
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            0986966813 <br>
                            ledinhthi2909@gmail.com <br>
                            thildph07746@fpt.edu.vn
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
