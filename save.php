<?php
$conn=new mysqli("localhost","root","","try");
$conn->query("insert into tbltry (name,age) values ('$_GET[txtname]',$_GET[txtage])");
header("location:php.php");
?>