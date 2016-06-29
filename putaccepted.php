<?php
require 'conn.php';

$num = $_POST['num'];

$req1=mysqli_query($con,"UPDATE pictures SET status='accepted' WHERE num='$num'");

mysql_close();

?>
