<?php

require 'conn.php';


$myID = $_POST['myID'];
$IDfriend = $_POST['IDfriend'];
$urlpicture = $_POST['urlpicture'];
$orientation=$_POST['orientation'];
$radius=$_POST['radius'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$sql="INSERT INTO pictures (idS,idR,status,url,orientation,radius,lat,lon,date) VALUES('$myID','$IDfriend','waiting','$urlpicture','$orientation','$radius','$lat','$lon','null')";
$req = mysqli_query($con,$sql);

echo "succes";

mysqli.close();
?>
