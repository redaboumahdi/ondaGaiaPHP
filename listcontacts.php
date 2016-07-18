<?php

require 'conn.php';

$myID = $_POST['myID'];

class friend {
        public $idR = "";
	public $first_name = "";
	public $last_name = "";
}


$req=mysqli_query($con,"SELECT idR FROM contacts WHERE idS='$myID' AND statusS='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);


if ($count>0){
	for ($i = 0; $i < $count; $i++) {
		$val=$set[$i]['idR'];
		$e3=new friend();
		$e3->idR = $val;
		$sql2="SELECT first_name,last_name FROM users WHERE id='$val'";
		$req2=mysqli_query($con,$sql2);
		$row2=$req2->fetch_assoc();
		$e3->first_name=$row2['first_name'];
		$e3->last_name=$row2['last_name'];
		echo json_encode($e3);
		echo ";;;";
	}
}
else{
	echo "empty";
}


echo "!!!";

$req3=mysqli_query($con,"SELECT idR FROM contacts WHERE idS='$myID' AND statusS='waiting'");
for ($set3 = array (); $row3 = $req3->fetch_assoc(); $set3[] = $row3);
$count3 = count($set3);

if($count3>0){
	for ($i = 0; $i < $count3; $i++) {
		$val=$set3[$i]['idR'];
		$e4=new friend();
		$e4->idR = $val;
		$sql4="SELECT first_name,last_name FROM users WHERE id='$val'";
		$req4=mysqli_query($con,$sql4);
		$row4=$req4->fetch_assoc();
		$e4->first_name=$row4['first_name'];
		$e4->last_name=$row4['last_name'];
		echo json_encode($e4);
		echo ";;;";
	}
}
else{
	echo "empty";
}

echo "!!!";


class NUM {
        public $phonenumber = "";
}

$req5=mysqli_query($con,"SELECT phone FROM users");
for ($set5 = array (); $row5 = $req5->fetch_assoc(); $set5[] = $row5);
$count5 = count($set5);

if($count5>0){
	for ($i = 0; $i < $count5; $i++) {
		$val=$set5[$i]['phone'];
		$e5=new NUM();
		$e5->phonenumber = $val;
		echo json_encode($e5);
		echo ";;;";
	}
}
else{
	echo "empty";
}	


mysql_close();

?>
