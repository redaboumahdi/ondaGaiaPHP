<?php

require 'conn.php';

$phone = $_POST['phone'];
$myID = $_POST['myID'];

class friend {
        public $idR = "";
	public $first_name = "";
	public $last_name = "";
}


$req=mysqli_query($con,"SELECT id,first_name,last_name FROM users WHERE phone='$phone'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['id'];
	$sql2="SELECT * FROM contacts WHERE idS='$val' and idR='$myID'";
	$req2=mysqli_query($con,$sql2);
	if (mysqli_num_rows($req2)==0 && $val!=$myID){
		$e3=new friend();
		$e3->idR = $val;
		$e3->first_name=$set[$i]['first_name'];
		$e3->last_name=$set[$i]['last_name'];
		echo json_encode($e3);
		echo ";;;";
	}
}

mysqli.close();

?>
