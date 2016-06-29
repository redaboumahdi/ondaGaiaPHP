<?php

require 'conn.php';

class NUM {
      public $numero = "";
}

$pseudo = $_POST['pseudo'];
$password = $_POST['password']; 

$sql1 = "SELECT pseudo,password FROM users WHERE pseudo='$pseudo' AND password='$password'"; 
$req1 = mysqli_query($con,$sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 

if(mysqli_num_rows($req1)>0) {
	$sql2 = "SELECT id FROM users WHERE pseudo='$pseudo' AND password='$password'"; 
	$req2 = mysqli_query($con,$sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
	$row = $req2->fetch_assoc();
	$e=new NUM();
	$e->numero = $row['id'];
	echo json_encode($e);
}
else{
	echo 'Your ID and/or your password are incorrect!';
}
mysql_close(); 
?>
