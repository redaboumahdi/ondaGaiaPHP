<?php

require 'conn.php';

class NUM {
      public $numero = "";
}

$myID = $_POST['myID'];
$IDfriend = $_POST['IDfriend'];
$urlpicture = $_POST['urlpicture'];
$orientation=$_POST['orientation'];
$radius=$_POST['radius'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$sql="INSERT INTO pictures (idS,idR,status,url,orientation,radius,lat,lon,date) VALUES('$myID','$IDfriend','waiting','$urlpicture','$orientation','$radius','$lat','$lon','null')";
$req = mysqli_query($con,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$e=new NUM();
$e->numero = $myID;
echo json_encode($e);

mysqli.close();
?>
