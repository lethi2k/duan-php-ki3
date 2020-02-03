<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sửa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php
include 'db.php';
if (isset($_GET['masua'])) {
    $masua=$_GET['masua'];
    $sql="select * from danhmuc where iddm='$masua'";
    $kq=$conn->query($sql)->fetch();
}
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Danh Mục</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="iddm" value="<?php echo $kq['iddm']?>"></td>
                    <td><input type="text" name="tendm" value="<?php echo $kq['tendm']?>"></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="btn_luu" value="Lưu">
    </form>
    <?php 
    if(isset($_POST['btn_luu'])){
        $iddm=$_POST['iddm'];
        $tendm=$_POST['tendm'];
        $sqlsua="update danhmuc set tendm='$tendm' where iddm='$masua'";
        $kqsua=$conn->prepare($sqlsua);

                     if($kqsua->execute()){
                     header("Location:../danhmuc.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
     ?>
</body>

</html>
