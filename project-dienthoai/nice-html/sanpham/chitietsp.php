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
            <div class="haha">
                <a href="them.php"><button type="button" class="btn btn-success">Thêm Mới Sản Phẩm</button></a><br><br>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">Chi Tiết Sp</th>
                        </tr>
                    </thead>
                        <?php
if (isset($_GET['chitiet'])) {
    $chitiet=$_GET['chitiet'];
    $sql="select * from sanpham where idsp='$chitiet'";
    $kq=$conn->query($sql)->fetch();
}
    ?>
                    <tbody>
                        <tr>                            
                            <td><?php echo $kq['chitietsp']; ?></td>
                        

                        </tr>
                    </tbody>
      </table>
                
            </div>
</body>
</html>
