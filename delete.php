<?php
$conn=new mysqli("localhost","root","","try");
$conn->query("delete from tbltry where Name='$_GET[txtname]'");
header("location:php.php");
?>