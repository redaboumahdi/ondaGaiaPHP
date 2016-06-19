<?php
$username = 'root';
$password = 'root';
$host     = 'localhost';
$database = 'ondagaia';

$con=mysqli_connect($host,$username,$password,$database);

class NUM {
      public $numero = "";
}

$id = $_POST['IDENTIFICATION'];
$password = $_POST['PASSWORD']; 

$sql1 = "SELECT id,password FROM test WHERE id='$id' AND password='$password'"; 
$req1 = mysqli_query($con,$sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error()); 

if(mysqli_num_rows($req1)>0) {
	$sql2 = "SELECT num FROM test WHERE id='$id' AND password='$password'"; 
	$req2 = mysqli_query($con,$sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error()); 
	$row = $req2->fetch_assoc();
	$e=new NUM();
	$e->numero = $row['num'];
	echo json_encode($e);
}
else{
	echo 'Your ID and/or your password are incorrect!';
}
mysql_close(); 
?>
