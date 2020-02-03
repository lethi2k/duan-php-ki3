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
                   <h1>Thêm Mới Danh Mục</h1>
                <a href="them.php"><button type="button" class="btn btn-success">Thêm Mới Danh Mục</button></a><br><br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Danh Mục</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <?php
        $sql="select * from danhmuc";
        $kq=$conn ->query($sql);
        foreach ($kq as $key => $row){
        	ob_start();
        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $row['tendm']; ?></td>
                            <td><a href="sua.php?masua=<?php echo $row['iddm']?>"><button type="button" class="btn btn-success">Sửa</button></a></td>
                            <td><a href="xoa.php?maxoa=<?php echo $row['iddm']?>; ?>" onclick="return confirm('bạn có muốn xóa không?')"><button type="button" class="btn btn-success">Xóa</button></a></td>                      
                        </tr>
                    </tbody>	
                    <?php
        }
        ?>
                </table>
                
            </div>
</body>
</html>
