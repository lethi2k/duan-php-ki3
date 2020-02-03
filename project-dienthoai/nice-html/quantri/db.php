<?php
try{
   $conn= new PDO("mysql:host=localhost;dbname=thildph07746_duanmau;charset=utf8","root",""); 
}
catch (PDOException $e){
    echo 'Lỗi';
}
?>