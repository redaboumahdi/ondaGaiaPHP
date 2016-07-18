<?php

require 'conn.php';

$idS = $_POST['idS'];
$pseudoR = $_POST['pseudoR'];
$waiting = 'waiting';
$accepted= 'accepted';

$sql1="SELECT id FROM users WHERE pseudo='$pseudoR'";
$req1=mysqli_query($con,$sql1);
$row = $req1->fetch_assoc();
$idR=$row['id'];

$sql2="SELECT idS,idR FROM contacts WHERE idS='$idS' AND idR='$idR'";
$req2=mysqli_query($con,$sql2);

if(mysqli_num_rows($req2)==1) {
	echo 'You already added this contact!';
}
else{
	$sqlS="INSERT INTO contacts (idS,idR,statusS,statusR) VALUES ('$idS','$idR','$accepted','$waiting')";
	$sqlR="INSERT INTO contacts (idS,idR,statusS,statusR) VALUES ('$idR','$idS','$waiting', '$accepted')";
	$reqS = mysqli_query($con,$sqlS) or die('Erreur SQL !<br>'.$sqlS.'<br>'.mysql_error()); 
	$reqR = mysqli_query($con,$sqlR) or die('Erreur SQL !<br>'.$sqlR.'<br>'.mysql_error()); 
}

mysql_close();

?>
