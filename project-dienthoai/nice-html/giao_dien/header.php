<?php include '../quantri/db.php' ?>
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
        #canchinh {
            height: 50px;
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
    <div class="row">
             <?php 
                    $sql="select * from setting";
                    $kq=$conn ->query($sql);
                    foreach ($kq as $key => $row){
            ?>
                <div class="col-sm-3">
                    <img src="../setting/images/<?php echo $row['logo'] ?>" class="logo" alt="">
                </div>
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3" id="search">
                        <input id="nhap" type="text" name="nhap" class="form-control" placeholder="Mời Bạn Nhập Từ Cần Tìm Kiếm" aria-label="Example text with button addon" aria-describedby="button-addon1" minlength="1" required>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1" name="search">Tìm Kiếm</button>
                    </div>
                    </form>
                    <?php 
                    if (isset($_POST['search'])) {
                        $nhap=$_POST['nhap'];
                    }
                     ?>
                </div>
                <div class="col-sm-3">
                    <p class="dan">Holtle: <?php echo $row['sdt'] ?> or 033334445 <br>Email: <?php echo $row['email'] ?></p>
                    <?php
                    if (isset($_SESSION["user"]) && $_SESSION["vaitro"]==1) {
                    ?>
                    <a href="../quantri/index.php">Quản Trị</a>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
</body>
</html>