<?php include '../quantri/db.php';
session_start();
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
#canle{
    margin-left: 350px;
}
        #canchinh img {
            width: auto;
            height: 50px;
        }
        .xem{
            line-height: 200%;
        }
        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}
        #len {
            float: left;
            margin-left: 3px;
        }

        #cu {
            font-size: 14px;
        }

        .phantrang {
            clear: both;
            float: right;
        }

        a:hover {
            text-decoration: none;
        }

        #h1 {
            border-bottom: 3px solid #007bff;
            font-size: 17px;
            clear: both;
            font-weight: 450;
        }

        .menu {
            background-color: #007bff;
            ;
            padding: 10px 0px 10px 0px;

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

        #phai {
            margin-left: 450px;
        }

        #food {
            margin-left: 10px;
            margin-top: 10px;
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

        #chua {
            margin-top: 40px;
            min-height: 120px;
            max-width: 170px;
        }

        .thea {
            text-decoration: none;
            font-size: 13px;
            color: red;
            margin-bottom: 10px;
            margin-left: 5px;
        }

        .thea:hover {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="container">
        <header>
            <?php require "header.php" ?>
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
                    <a class="nav-link" href="#">Sản Phẩm</a>
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
                <a  class="nav-link" id="canle" href="#"><?php echo  $_SESSION['user']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../quantri/huysession.php">Đăng Xuất</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../quantri/doimk.php">Đổi Mật Khẩu</a>
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
</script>
<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<br><br>
        <!--Đây là phần mở đầu class row-->
        <div class="row">
            <article class="col-sm-3">
                <!--Phần Đăng Nhập-->
                <!--Phần danh mục sản phẩm-->
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">
                        Danh Mục Sản Phẩm
                    </button>
                    <?php 
                    $sql="select * from danhmuc";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $row){
        ?>
                    <a href="sanpham.php?danhmuc=<?php echo $row['iddm']?>"><button type="button" class="list-group-item list-group-item-action"><?php echo $row['tendm']; ?></button></a>
                    <?php    
                    } 
                    ?>
                    <!-- <a href="maytinhbang.html"><button type="button" class="list-group-item list-group-item-action">Máy Tính Bảng</button></a>
                    <a href="labtop.html"><button type="button" class="list-group-item list-group-item-action">Laptop</button></a>
                    <button type="button" class="list-group-item list-group-item-action">Phụ Kiện</button>
                    <button type="button" class="list-group-item list-group-item-action">Quà Tặng</button>-->
                </div><br><br>
                <!--sản phẩm được yêu thích nhất-->
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">
                        Top 10 Sản Phẩm Được Yêu Thích Nhất
                    </button>
                    <!--sản phẩm 1-->
                    <?php 
                    $sql="SELECT * FROM sanpham ORDER BY view DESC LIMIT 0,10";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $row){
                     ?>
                     <a class="tger" href="chitietsp.php?chitiet=<?php echo $row['idsp']?>">
                    <button type="button" class="list-group-item list-group-item-action">
                        <div class="row no-gutters" id="canchinh">
                            <div class="col-md-4">
                                <img src="../sanpham/images/<?php echo $row['anhdd']; ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?php echo $row['tensp']; ?></b><p class="xem"> <i style="font-size:14px" class="fa fa-eye"></i> <?php echo $row['view'] ?></p></h5> 
                                </div>
                            </div>
                        </div>
                    </button>
                </a>
                <?php } ?>
                </div>
                <!--kết thúc 10 sản phẩm được yêu thích-->
            </article>
            <!--phần 2 show sản phẩm bán hàng-->
            <aside class="col-sm-9">
                <!--phần sản phẩm Mới nhất hiện nay-->
                <div>
                    <h1 class="input-group-text" id="h1">Sản Phẩm Mới Nhất Hiện Nay</h1>
                </div>
                <hr>
                <!--Đây là phần khung Chứa sản phẩm-->
                <?php
                if (isset($_GET['danhmuc'])) {
                    $iddm=$_GET['danhmuc'];
                }
                if (isset($_POST['search'])) {
                    $sql="SELECT * FROM sanpham WHERE tensp LIKE '%$nhap%' limit 0,15";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $row){
                    ?>
                <div class="card mb-3" id="len" style="max-width: 270px;">
                    <a class="tger" href="chitietsp.php?chitiet=<?php echo $row['idsp']?>">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                         <img src="../sanpham/images/<?php echo $row['anhdd']; ?>" id="chua" class="card-img" alt="..." width="50">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <?php 
                                    $gia=$row['gia'];
                                    $giamgia=$row['giamgia'];

                                 ?>
                                <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                                <span id="cu"><del><?php echo number_format("$giamgia",3); ?>đ</del><button type="button" class="btn btn-primary" id="cu">10%</button><br><?php echo number_format("$gia",3) ; ?>đ</span><br><br>
                                <button type="button" id="cu" class="btn btn-outline-primary">Xem ngay</button>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php }}else{ 
                $sotin1trang=15;
                if (isset($_GET["page"])) {
                $page=$_GET["page"];
                }
                else{
                    $page=1;
                }
                $from=($page-1)*$sotin1trang;
                $sql_dem="select count(idsp) from sanpham";
                $qr=$conn->query($sql_dem)->fetch(PDO :: FETCH_ASSOC);
                $sotrang=ceil($qr['count(idsp)']/$sotin1trang);
                $sql="SELECT * FROM sanpham limit $from,$sotin1trang";
                $kq=$conn ->query($sql);
                foreach ($kq as $key => $row){
                ?> 
                    
              <div class="card mb-3" id="len" style="max-width: 270px;">
                    <a class="tger" href="chitietsp.php?chitiet=<?php echo $row['idsp']?>">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                         <img src="../sanpham/images/<?php echo $row['anhdd']; ?>" id="chua" class="card-img" alt="..." width="50">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <?php 
                                    $gia=$row['gia'];
                                    $giamgia=$row['giamgia'];
                                    $phantram=ceil((($giamgia-$gia)/$giamgia)*100);
                                 ?>
                                <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                                <span id="cu"><del><?php echo number_format("$giamgia",3); ?>đ</del><button type="button" class="btn btn-primary" id="cu"><?php echo $phantram; ?>%</button><br><?php echo number_format("$gia",3) ; ?>đ</span><br><br>
                                <button type="button" id="cu" class="btn btn-outline-primary">Xem ngay</button>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php }} ?>
            
                <?php if (isset($_POST['search'])) {}else{
                 ?>
                <div class="phantrang">
            <nav aria-label="...">
            <ul class="pagination">
            <?php if ($page>1) {
                
             ?>
            <a class="page-link" href="index.php?page=<?php echo $page-1; ?>">Trước</a>
            <?php } ?>
            <?php for ($i=1; $i <= $sotrang ; $i++) {
            if ($i == $page)    {
                echo'<li class="page-item"><a class="page-link" style="background-color: blue; color: white">'.$i.'</a></li>';
            }else{
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
             ?>
            
            
            <?php } ?>
            <?php if ($page<$qr['count(idsp)']-1) {
                $next_page=$page+1;
             ?>
            <a class="page-link" href="index.php?page=<?php echo $next_page; ?>">Sau</a>
            <?php } ?>
            </ul>
            </nav>
            </div>
        <?php } ?>
                <!--Đây là phần khung Chứa sản phẩm-->
            </aside>
        </div>
        <!--kết thúc class row-->
        <footer>
            <?php 
                    $sql="select * from setting";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $row){
            ?>
            <div class="card">
                <div class="card-header">
                    <center>
                        <p>Mọi thắc mắc hoặc bị sự cố về bất cứ vấn đề gì xin hãy gọi điện thoại vào số <?php echo $row['sdt'] ?> để được hỗ trợ tốt nhất</p>
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
                            <?php echo $row['sdt'] ?> <br>
                            <?php echo $row['email'] ?> <br>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </footer>
    </div>
    <!--kết thúc class container-->
</body>

</html>
