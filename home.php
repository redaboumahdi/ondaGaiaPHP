<?php

require 'conn.php';

$myID = $_POST['myID'];

class picture {
	public $num="";
	public $first_name = "";
	public $last_name = "";
	public $status="";
	public $url="";
	public $orientation="";
	public $lat="";
	public $lon="";
}

class NUM {
        public $number = "";
}

$req=mysqli_query($con,"SELECT num,idS,status,url,orientation,lat,lon FROM pictures WHERE idR='$myID'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

$e1=new NUM();
$e1->number=$myID;
echo json_encode($e1);

$e2=new NUM();
$e2->number=$count;
echo json_encode($e2);

for ($i = 0; $i < $count; $i++) {
	$validS=$set[$i]['idS'];
	$sql1 = "SELECT idR FROM contacts WHERE idR='$validS' AND idS='$myID' AND statusS='accepted'"; 
	$req1 = mysqli_query($con,$sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	if(mysqli_num_rows($req1)>0) {
		$valnum=$set[$i]['num'];
		$valstatus=$set[$i]['status'];
		$valurl=$set[$i]['url'];
		$valorientation=$set[$i]['orientation'];
		$vallat=$set[$i]['lat'];
		$vallon=$set[$i]['lon'];
		$e3=new picture();
		$reqq=mysqli_query($con,"SELECT first_name,last_name FROM users WHERE id='$validS'");
		$roww=$reqq->fetch_assoc();
		$valfirst_name=$roww['first_name'];
		$vallast_name=$roww['last_name'];
		$e3->num=$valnum;
		$e3->first_name = $valfirst_name;
		$e3->last_name = $vallast_name;
		$e3->status = $valstatus;
		$e3->url = $valurl;
		$e3->orientation=$valorientation;
		$e3->lat = $vallat;
		$e3->lon = $vallon;
		echo json_encode($e3);
	}
}

mysql_close();

?>
