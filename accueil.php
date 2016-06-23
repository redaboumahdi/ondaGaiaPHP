<?php
$username = 'root';
$password = 'root';
$host     = 'localhost';
$database = 'ondagaia';

$con=mysqli_connect($host,$username,$password,$database);
$myID = $_POST['myID'];

class picture {
	public $first_name = "";
	public $last_name = "";
	public $status="";
	public $url="";
	public $lat="";
	public $lon="";
}

class NUM {
        public $number = "";
}

$req=mysqli_query($con,"SELECT numS,status,url,lat,lon FROM photo WHERE numR='$myID'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

$eee=new NUM();
$eee->number=$myID;
echo json_encode($eee);

$ee=new NUM();
$ee->number=$count;
echo json_encode($ee);

for ($i = 0; $i < $count; $i++) {
	$valnumS=$set[$i]['numS'];
	$sql1 = "SELECT numR FROM listcontact WHERE numR='$valnumS' AND numS='$myID' AND statusS='accepted'"; 
	$req1 = mysqli_query($con,$sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	if(mysqli_num_rows($req1)>0) {
		$valstatus=$set[$i]['status'];
		$valurl=$set[$i]['url'];
		$vallat=$set[$i]['lat'];
		$vallon=$set[$i]['lon'];
		$e=new picture();
		$reqq=mysqli_query($con,"SELECT first_name,last_name FROM test WHERE num='$valnumS'");
		$roww=$reqq->fetch_assoc();
		$valfirst_name=$roww['first_name'];
		$vallast_name=$roww['last_name'];
		$e->first_name = $valfirst_name;
		$e->last_name = $vallast_name;
		$e->status = $valstatus;
		$e->url = $valurl;
		$e->lat = $vallat;
		$e->lon = $vallon;
		echo json_encode($e);
	}
}

mysql_close();

?>
