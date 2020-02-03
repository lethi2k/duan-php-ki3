<?php
include '../quantri/db.php';
session_start();
$sotin1trang=6;
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
?>        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        #canchinh {
            height: 50px;
        }
.tger{
    color: black;
}
.mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}
        #len {
            float: left;
            margin-left: 3px;
        }
        #canchinh img {
            width: auto;
            height: 50px;
        }

        #len {
            float: left;
            margin-left: 3px;
        }

        #cu {
            font-size: 14px;
        }
        #phai{
            margin-left: 450px;
        }
        .phantrang {
            clear: both;
            float: right;
        }

        #h1 {
            border-bottom: 3px solid #007bff;
            font-size: 17px;
            clear: both;
            font-weight: 450;
        }
        #food{
            margin-left: 10px;
            margin-top: 10px;
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
            font-size: 13px;
            clear: both;
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
        a:hover{
            text-decoration: none;
        }
        #mauchu {
            color: red;
            font-size: 30px;
            font-weight: bold;
        }

        .logo {
            width: 200px;
            height: auto;
            margin-top: 50px;
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
            <div class="row">
                <?php 
                    $sql="select * from setting";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $row){
            ?>
                <div class="col-sm-3">
                    <img src="../setting/images/<?php echo $row['logo'] ?>" class="logo" alt="">
                </div>
            <?php } ?>
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
                                    <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </button>
                </a>
                <?php } ?>
                   
                    <!--kết thúc-->
                </div><br><br>
                <!--kết thúc 10 sản phẩm được yêu thích-->
            </article>
            <!--phần 2 show sản phẩm bán hàng-->
            <aside class="col-sm-9">
                <!--phần sản phẩm Mới nhất hiện nay-->
                 <!--phần sản phẩm Mới nhất hiện nay-->
                <div>
                    <h1 class="input-group-text" id="h1">Sản Phẩm</h1>
                </div>
                <hr>
                <!--Đây là phần khung Chứa sản phẩm-->
                <?php
                if (isset($_GET['danhmuc'])) {
                    $iddm=$_GET['danhmuc'];
                }
                    $sql="SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.iddm=danhmuc.iddm where sanpham.iddm=$iddm limit $from,$sotin1trang";
                    $kq=$conn ->query($sql);
                    // var_dump($kq);
                    // exit();
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
                                <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                                <?php 
                                    $gia=$row['gia'];
                                    $giamgia=$row['giamgia'];
                                    $phantram=ceil((($giamgia-$gia)/$giamgia)*100);
                                 ?>
                                <span id="cu"><del><?php echo number_format("$giamgia",3); ?>đ</del><button type="button" class="btn btn-primary" id="cu"><?php echo $phantram ?>%</button><br><?php echo number_format("$gia",3); ?>đ</span><br><br>
                                <button type="button" id="cu" class="btn btn-outline-primary">Xem ngay</button>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php } ?>
            <div class="phantrang">
                   <nav aria-label="...">
        <ul class="pagination">
            <?php if ($page>1) {
                
             ?>
            <a class="page-link" href="sanpham.php?page=<?php echo $page-1; ?>&&danhmuc=<?php echo $iddm; ?>">Trước</a>
            <?php } ?>
            <?php for ($i=1; $i <= $sotrang ; $i++) {
            if ($i == $page)    {
                echo'<li class="page-item"><a class="page-link" style="background-color: blue; color: white">'.$i.'</a></li>';
            }else{
                echo '<li class="page-item"><a class="page-link" href="sanpham.php?page='.  $i.'&&danhmuc='. $iddm.'">'. $i.'</a></li>';
            }
             ?>
            
            
            <?php } ?>
            <?php if ($page<$qr['count(idsp)']-1) {
                $next_page=$page+1;
             ?>
            <a class="page-link" href="sanpham.php?page=<?php echo $next_page; ?>&&danhmuc=<?php echo $iddm; ?>">Sau</a>
            <?php } ?>
        </ul>
    </nav>
            </div>
        </div>
        <!--kết thúc class row-->
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
    <!--kết thúc class container-->
</body>

</html>
