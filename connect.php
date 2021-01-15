<?php
$server='localhost';
$name='root';
$password="";
$dbname='basic_php_crud';
$port=3308;
$db = mysqli_connect($server,$name,$password,$dbname,$port);
if($db == true){
   // echo "Data connected successfully";
}
else{
    die("error:" .mysqli_connect_error($db));
}



?>