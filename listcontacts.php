<?php

require 'conn.php';

$myID = $_POST['myID'];

class friend {
        public $idR = "";
	public $first_name = "";
	public $last_name = "";
}

class NUM {
        public $number = "";
}

$req=mysqli_query($con,"SELECT idR FROM contacts WHERE idS='$myID' AND statusS='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

$e1=new NUM();
$e1->number="$myID";
echo json_encode($e1);


for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['idR'];
	$e3=new friend();
	$e3->idR = $val;
	$sql2="SELECT first_name,last_name FROM users WHERE id='$val'";
	$req2=mysqli_query($con,$sql2);
	$row2=$req2->fetch_assoc();
	$e3->first_name=$row2['first_name'];
	$e3->last_name=$row2['last_name'];
	echo ";;;";
	echo json_encode($e3);
}

mysql_close();

?>
