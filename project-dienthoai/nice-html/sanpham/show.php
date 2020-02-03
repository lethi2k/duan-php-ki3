<?php require "../quantri/index.php";
$sotin1trang=3;
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
                            <th scope="col">#</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Tên ảnh đại diện</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">sô lượng</th>
                            <th scope="col">view</th>
                            <th scope="col">Tên Danh Mục</th>
                            <th scope="col">Chi Tiết Sp</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <?php
        $sql="select * from sanpham LIMIT $from,$sotin1trang";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['idsp']; ?></td>
                            <td><?php echo $row['tensp']; ?></td>
                            <td><img src="images/<?php echo $row['anhdd']; ?>" alt="" width="50"></td>
                            <?php 
                                    $gia=$row['gia'];
                                    $giamgia=$row['giamgia'];

                                 ?>
                            <td><?php echo number_format("$gia",3); ?></td>
                            <td><?php echo number_format("$giamgia",3); ?></td>
                            <td><?php echo $row['soluong']; ?></td>
                            <td><?php echo $row['view']; ?></td>
                            <?php 
                                $idsp=$row['iddm'];
                                $sql="select * from danhmuc where iddm='$idsp'";
                                 $kq=$conn->query($sql)->fetch();
                             ?>
                            <td><?php echo $kq['tendm']; ?></td>
                            <td><a href="chitietsp.php?chitiet=<?php echo $row['idsp']?>"><button type="button" class="btn btn-success">Chi Tiết</button></a></td>
                            <td><a href="sua.php?masua=<?php echo $row['idsp']?>"><button type="button" class="btn btn-success">Sửa</button></a></td>
                            <td><a href="xoa.php?maxoa=<?php echo $row['idsp']?>; ?>" onclick="return confirm('bạn có muốn xóa không?')"><button type="button" class="btn btn-success">Xóa</button></a></td>
                        

                        </tr>
                    </tbody>


                    <?php
        }
        ?>
                </table>
                <div>
                   <nav aria-label="...">
        <ul class="pagination">
            <?php if ($page>1) {
                $prev_page=$page-1;
             ?>
            <a class="page-link" href="?page=<?php echo $prev_page; ?>">Trước</a>
            <?php } ?>
            <?php for ($i=1; $i <= $sotrang ; $i++) { 
                 if ($i == $page)    {
                echo'<li class="page-item"><a class="page-link" style="background-color: blue; color: white">'.$i.'</a></li>';
            }else{
                echo '<li class="page-item"><a class="page-link" href="show.php?page='.  $i.'">'. $i.'</a></li>';
            }
            }
             ?>
            <?php if ($page<$qr['count(idsp)']-1) {
                $next_page=$page+1;
             ?>
            <a class="page-link" href="?page=<?php echo $next_page; ?>">Sau</a>
            <?php } ?>
        </ul>
    </nav>
                    </div>
                
            </div>
</body>
</html>
