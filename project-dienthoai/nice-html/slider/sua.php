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
<?php
if (isset($_GET['masua'])) {
    $masua=$_GET['masua'];
    $sql="select * from slider where id='$masua'";
    $kq=$conn->query($sql)->fetch();
}
    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Tiêu Đề</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="images/<?php echo $kq['logo']?>" alt="" width="50"><br><br>
                                <input type="file"  name="logo" width="50"></td>
                            <td><input type="text" class="form-control" name="tieude" value="<?php echo $kq['tieude']?>"></td>
                            <td><input type="text" class="form-control" name="trangthai" value="<?php echo $kq['trangthai']?>"></td>
                            <td><input type="text" class="form-control" name="link" value="<?php echo $kq['link']?>"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success" name="btn_luu">Sửa</button>
            </form>
            <?php 
    if(isset($_POST['btn_luu'])){
        $nameA=$_FILES['logo']['name'];
        $tmA=$_FILES['logo']['tmp_name'];
        move_uploaded_file($tmA,"images/".$nameA);
        if(empty($_FILES['logo']['name'])){
        $nameA=$kq['logo'];
        }
        $tieude=$_POST['tieude'];
        $trangthai=$_POST['trangthai'];
        $link=$_POST['link'];
        $sqlsua="update slider set logo='$nameA',tieude='$tieude',trangthai='$trangthai',link='$link' where id='$masua'";
        $kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     header("Location:slider.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
     ?>

        </div>
</body>
</html>
