
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
                            <th scope="col">User</th>
                            <th scope="col">pass</th>
                            <th scope="col">ảnh đại diện</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Kích Hoạt</th>
                            <th scope="col">Vai Trò</th>
                            <th scope="col">Thời Gian</th>
                        </tr>
                    </thead>
                    <?php
        $sql="select * from user";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $row['user']; ?></td>
                            <td><?php echo $row['pass']; ?></td>
                            <td><?php echo $row['anhdd']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['diachi']; ?></td>
                            <td><?php echo $row['kichhoat']; ?></td>
                                <?php if ($row['vaitro']==0) { 
                            echo '<td><a href="phanquyen.php?anhien='.$row['user'].'"><button type="submit" class="btn btn-success">Người Dùng </button></a></td>';
                        }
                            else{
                           echo '<td><a href="phanquyen.php?anhien='.$row['user'].'"><button type="submit" class="btn btn-success">Admin</button></a></td>';
                         }?>
                            <td><?php echo $row['thoigian']; ?></td>
                        </tr>
                    </tbody>
                    <?php
        }
        ?>
                </table>
                
            </div>
</body>
</html>
