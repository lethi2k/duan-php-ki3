<?php ob_start();?>
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
    <style>
        #canchinh {
            height: 50px;
        }
#canle{
    margin-left: 400px;
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
	<form action="" method="post" enctype="multipart/form-data">
                <label for="fname">Mời nhập Ý Kiến Của Bạn</label>
                <input type="text" id="name" name="name" placeholder="Mời nhập Ý Kiến Của Bạn..." minlength="1" required>
                <input type="submit" name="btn_luu" value="Gửi">
            </form>
            <?php 
            if (isset($_POST['btn_luu'])) {
                $name=$_POST['name'];
                $a=$_SESSION['user'];
                $sql="insert into binhluan values('','$name','$chitiet','$a',CURRENT_TIMESTAMP())";
                $kq=$conn->query($sql);
                if($kq){
               header("Refresh:0");
                }
                else{
                echo "Lỗi Bình Luận";
                }
    }
             ?>
</body>
</html>