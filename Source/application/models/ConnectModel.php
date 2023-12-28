<?php 
     $servername = 'localhost:3306';
     $username = 'root';
     $password = 'Nobisuke.8888';
     $databasename = 'travle';
 
     $connect = new mysqli($servername,$username,$password,$databasename);
     if($connect->connect_error){
         die("Kết nối thất bại ".$connect->connect_error);
     }
?>