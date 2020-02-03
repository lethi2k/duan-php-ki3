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
            <a href="them.php"><button type="button" class="btn btn-success">Thêm slider</button></a><br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Tiêu Đề</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Link</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <?php
        $sql="select * from slider";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><img src="images/<?php echo $row['logo']; ?>" alt="" width="50"></td>
                        <td><?php echo $row['tieude']; ?></td>
                            <?php if ($row['trangthai']==0) { 
                            echo '<td><a href="anhien.php?anhien='.$row['id'].'"><button type="submit" class="btn btn-success">Ẩn</button></a></td>';
                        }
                            else{
                           echo '<td><a href="anhien.php?anhien='.$row['id'].'"><button type="submit" class="btn btn-success">Hiện</button></a></td>';
                         }?>
                        <td><?php echo $row['link']; ?></td>
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
