<?php
require 'conn.php';

$num = $_POST['num'];
$date = $_POST['date'];

$req=mysqli_query($con,"UPDATE pictures SET status='accepted',date='$date' WHERE num='$num'");

echo "OK";

mysqli_close();

?>
