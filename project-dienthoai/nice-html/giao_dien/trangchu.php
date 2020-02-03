                    <?php 
                    if (isset($_GET["search"])) {
                        $nhap=$_POST['nhap'];
                         header('Location:index.php?tukhoa='.$nhap);
                        // echo "test";
                    }
                     ?>