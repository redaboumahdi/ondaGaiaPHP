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
$first_name = $_POST['FIRST_NAME'];
$last_name = $_POST['LAST_NAME'];
$password = $_POST['PASSWORD'];
$sql1="SELECT id FROM test WHERE id='$id'";
$req1=mysqli_query($con,$sql1);

if(mysqli_num_rows($req1)>0) {
	echo 'This ID already exists!';
}
else{
	$sql2="INSERT INTO test (id,first_name,last_name,password) VALUES ('$id','$first_name','$last_name','$password')";
	$req2 = mysqli_query($con,$sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	$sql3="SELECT num FROM test WHERE id='$id'";
	$req3 = mysqli_query($con,$sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error()); 
	$row = $req3->fetch_assoc();
	$e=new NUM();
	$e->numero = $row['num'];
	echo json_encode($e);
}

mysql_close();

?>
