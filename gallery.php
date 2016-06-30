<?php

require 'conn.php';

$myID = $_POST['myID'];

class friend {
	public $first_name = "";
	public $last_name = "";
	public $url="";
	public $orientation="";
	public $date="";
}

class NUM {
        public $number = "";
}

$req=mysqli_query($con,"SELECT idS,url,orientation,date FROM pictures WHERE idR='$myID' AND status='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count=count($set);

$e1=new NUM();
$e1->number="$myID";
echo json_encode($e1);

for ($i = 0; $i < $count; $i++) {
	$validS=$set[$i]['idS'];
	$valurl=$set[$i]['url'];
	$valorientation=$set[$i]['orientation'];
	$valdate=$set[$i]['date'];
	$sql2="SELECT first_name,last_name FROM users WHERE id='$validS'";
	$req2=mysqli_query($con,$sql2);
	$row2=$req2->fetch_assoc();
	$e3=new friend();
	$e3->first_name=$row2['first_name'];
	$e3->last_name=$row2['last_name'];
	$e3->url=$valurl;
	$e3->orientation=$valorientation;
	$e3->date=$valdate;
	echo ";;;";
	echo json_encode($e3);
}

mysqli.close();

?>
