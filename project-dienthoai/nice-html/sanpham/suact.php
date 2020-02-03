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
  <article>
     <?php 
if (isset($_GET['masua'])) {
    $masua=$_GET['masua'];
    $sql="select * from sanpham where idsp='$masua'";
    $kq=$conn->query($sql)->fetch();
}
    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Sửa Chi tiết</h2><br>
                  <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Chi Tiết Sản Phẩm</span>
                        <div id="sample">
                            <textarea name="area1" cols="210" class="ha" value="<?php echo $kq['chitietsp']?>">
                </textarea>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="btn_luu">Thêm</button>
            </form>
            <?php
    if(isset($_POST['btn_luu'])){   
        $chitietsp=$_POST['area1'];
       $sqlsua="update sanpham set chitietsp='$chitietsp' where idsp ='$masua'";
        $kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                        ob_start();
                    header('Location:chitietsp.php');
                     die();
                      }
                      else{
                          echo "lỗi";
                      }
            }
    ?>
        </article>
                
            </div>
</body>
</html>
