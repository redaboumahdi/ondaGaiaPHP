<?php

require 'conn.php';

class NUM {
      public $numero = "";
}


$pseudo = $_POST['pseudo'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$sql1="SELECT pseudo FROM users WHERE pseudo='$pseudo'";
$req1=mysqli_query($con,$sql1);

if(mysqli_num_rows($req1)>0) {
	echo 'This ID already exists!';
}
else{
	$sql2="INSERT INTO users (pseudo,first_name,last_name,password) VALUES ('$pseudo','$first_name','$last_name','$password')";
	$req2 = mysqli_query($con,$sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	$sql3="SELECT id FROM users WHERE pseudo='$pseudo'";
	$req3 = mysqli_query($con,$sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
	$row = $req3->fetch_assoc();
	$e=new NUM();
	$e->numero = $row['id'];
	echo json_encode($e);
}

mysql_close();

?>
