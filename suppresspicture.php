<?php

require 'conn.php';


$num = $_POST['num'];


$sql="DELETE FROM pictures WHERE num='$num'";
$req = mysqli_query($con,$sql);

echo "succes";

mysqli.close();
?>
