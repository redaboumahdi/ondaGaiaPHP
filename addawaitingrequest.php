<?php

require 'conn.php';

$myID = $_POST['myID'];
$idR = $_POST['idR'];

$req=mysqli_query($con,"SELECT * FROM contacts WHERE idS='$myID' AND idR='$idR'");
if (mysqli_num_rows($req)==0){
	$req3=mysqli_query($con,"INSERT INTO contacts (idS,idR,statusS,statusR) VALUES ('$myID','$idR','accepted','waiting')");
	$req4=mysqli_query($con,"INSERT INTO contacts (idS,idR,statusS,statusR) VALUES ('$idR','$myID','waiting','accepted')");
}
else{
	$req1=mysqli_query($con,"UPDATE contacts SET statusS='accepted',statusR='accepted' WHERE idS='$myID' AND idR='$idR'");
	$req2=mysqli_query($con,"UPDATE contacts SET statusS='accepted',statusR='accepted' WHERE idS='$idR' AND idR='$myID'");
}


mysql_close();

?>
