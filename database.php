
<?php

$database = mysqli_connect("localhost","root","");
mysqli_select_db($database,"myapp");

if(!$database){
  die("Database Error");
}


$result1 = mysqli_query($database,"SELECT * FROM mytable where productType=1 ORDER BY productName");
$result2 = mysqli_query($database,"SELECT * FROM mytable where productType=2 ORDER BY productName");
$result3 = mysqli_query($database,"SELECT * FROM mytable where productType=3 ORDER BY productName");

// $result = mysqli_query($database,"SELECT * FROM mytable ORDER BY productType");

$user = mysqli_query($database,"SELECT * FROM users");

?>
