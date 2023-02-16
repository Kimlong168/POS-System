<?php
session_start();
unset($_SESSION['username']);
// setcookie("username","",time()-100,"/",false,false);
header("Location: /login.php");
exit();
