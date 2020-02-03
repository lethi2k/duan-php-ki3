<?php ob_start(); ?>
<?php
include '../quantri/db.php';
include '../quantri/index.php';
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
        <div class="haha"><br>
    <?php
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
                            <th scope="col">Tên Danh Mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td><input type="text" class="form-control" placeholder="Thêm Danh Mục" name="tendm" aria-label="Thêm Danh Mục" aria-describedby="addon-wrapping" name="tendm" value="<?php echo $kq['tendm']?>"></td>
                        </tr>
                    </tbody>
                </table>
                 <button type="submit" class="btn btn-success" name="btn_luu">Sửa</button>
            </form>
            <?php
    if(isset($_POST['btn_luu'])){
        $tendm=$_POST['tendm'];
        $sqlsua="update danhmuc set tendm='$tendm' where iddm='$masua'";
        $kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                        ob_start();
                    header('Location:show.php');
                     die();
                      }
                      else{
                          echo "lỗi";
                      }
            }
ob_end_flush();
     ?>

        </div>
</body>
</html>