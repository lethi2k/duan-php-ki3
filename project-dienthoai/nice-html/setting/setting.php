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
                <a href="them.php"><button type="button" class="btn btn-success">Thêm Mới</button></a><br><br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Công Ty</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <?php
        $sql="select * from setting";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $row['tencty']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['sdt']; ?></td>
                            <td><img src="images/<?php echo $row['logo']; ?>" alt="" width="50"></td>
                            <td><a href="sua.php?masua=<?php echo $row['id']?>"><button type="button" class="btn btn-success">Sửa</button></a></td>
                            <td><a href="xoa.php?maxoa=<?php echo $row['id']?>; ?>" onclick="return confirm('bạn có muốn xóa không?')"><button type="button" class="btn btn-success">Xóa</button></a></td>
                           

                        </tr>
                    </tbody>


                    <?php
        }
        ?>
                </table>
                
            </div>
</body>
</html>
