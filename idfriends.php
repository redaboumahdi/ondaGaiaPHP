<?php

require 'conn.php';

$myID = $_POST['myID'];

class friends {
        public $idR = "";
	public $first_name="";
	public $last_name="";
}


$req=mysqli_query($con,"SELECT idR FROM contacts WHERE idS='$myID' AND statusS='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['idR'];
	$sql2="SELECT first_name,last_name FROM users WHERE id='$val'";
	$req2=mysqli_query($con,$sql2);
	$row2=$req2->fetch_assoc();
	$e=new friends();
	$e->first_name=$row2['first_name'];
	$e->last_name=$row2['last_name'];
	$e->idR = $val;
	echo json_encode($e);
	echo ";;;";
}

mysql_close();

?>
