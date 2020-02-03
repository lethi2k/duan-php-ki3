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
     <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function() {
            nicEditors.allTextAreas()
        });
        //]]>
    </script>
    <style>
        .haha {
            margin: 0px auto;
            padding: 10px;
            margin-left: 250px;
        }
        .input-group-text{
            width: 150px;
        }
    </style>
</head>
<body>
<div class="haha"><br>
<?php
if (isset($_GET['masua'])) {
    $masua=$_GET['masua'];
    $sql="select * from setting where id='$masua'";
    $kq=$conn->query($sql)->fetch();
}
?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tên Công Ty</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="tencty" value="<?php echo $kq['tencty']?>"></td>
                            <td><input type="text" class="form-control" name="email" value="<?php echo $kq['email']?>"></td>
                            <td><input type="text" class="form-control" name="sdt" value="<?php echo $kq['sdt']?>"></td>
                            <td><img src="images/<?php echo $kq['logo']?>" alt="" width="50"><br><br>
                                <input type="file"  name="logo" width="50"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success" name="btn_luu">Sửa</button>
            </form>
            <?php 
    if(isset($_POST['btn_luu'])){
        $tencty=$_POST['tencty'];
        $email=$_POST['email'];
        $sdt=$_POST['sdt'];
        $nameA=$_FILES['logo']['name'];
        $tmA=$_FILES['logo']['tmp_name'];
        move_uploaded_file($tmA,"images/".$nameA);
        if(empty($_FILES['logo']['name'])){
        $nameA=$kq['logo'];
        }
        $sqlsua="update setting set tencty='$tencty',email='$email',sdt='$sdt',logo='$nameA' where id='$masua'";
        $kqsua=$conn->prepare($sqlsua);

                     if($kqsua->execute()){
                     header("Location:setting.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
     ?>

        </div>
</body>
</html>
