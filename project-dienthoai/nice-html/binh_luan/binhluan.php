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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Idsp</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">ảnh sản phẩm</th>
                        <th>Tổng Số Lượng bình luận</th>
                        <th scope="col">Ngày bình luận</th>
                        <th scope="col">Chi Tiết</th>
                    </tr>
                </thead>
                <?php
        $sql="select * from binhluan GROUP BY idsp";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row['idsp']; ?></td>
                         <?php 
                                $idsp=$row['idsp'];
                                $sql="select * from sanpham where idsp='$idsp'";
                                 $kq=$conn->query($sql)->fetch();
                             ?>
                        <td><?php echo $kq['tensp']; ?></td>
                        <td><img src="../sanpham/images/<?php echo $kq['anhdd']; ?>" alt="" width="50"></td>
                        <?php 
                        $idsp=$row['idsp'];
                            $dem="SELECT COUNT(id) AS dem FROM binhluan JOIN sanpham ON binhluan.idsp=sanpham.idsp WHERE binhluan.idsp='$idsp'";
                            $ka=$conn->query($dem)->fetch();
                            $num_row=$ka['dem'];
                         ?>
                        <td><?php echo $num_row; ?></td>
                        <td><?php echo $row['ngaydang']; ?></td>
                        <td><a href="chitiet.php?chitiet=<?php echo $row['idsp']?>"><button type="button" class="btn btn-success">Chi Tiết</button></a></td>


                    </tr>
                </tbody>


                <?php
        }
        ?>
            </table>

        </div>
</body>
</html>
