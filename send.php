<?php

require 'conn.php';

class NUM {
      public $numero = "";
}

$myID = $_POST['myID'];
$IDfriend = $_POST['IDfriend'];
$urlpicture = $_POST['urlpicture'];
$orientation=$_POST['orientation'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$sql="INSERT INTO pictures (idS,idR,status,url,orientation,lat,lon) VALUES ('$myID','$IDfriend','waiting','$urlpicture','$orientation','$lat','$lon')";
$req = mysqli_query($con,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$e=new NUM();
$e->numero = $myID;
echo json_encode($e);

mysqli.close();
?>
