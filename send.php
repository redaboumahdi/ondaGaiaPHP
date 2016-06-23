<?php
$username = 'root';
$password = 'root';
$host     = 'localhost';
$database = 'ondagaia';

class NUM {
      public $numero = "";
}

$con=mysqli_connect($host,$username,$password,$database);
$IDme = $_POST['IDme'];
$IDfriend = $_POST['IDfriend'];
$urlpicture = $_POST['urlpicture'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$sql="INSERT INTO photo (numS,numR,status,url,lat,lon) VALUES ('$IDme','$IDfriend','waiting','$urlpicture','$lat','$lon')";
$req = mysqli_query($con,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$e=new NUM();
$e->numero = $IDme;
echo json_encode($e);

mysqli.close();
?>
