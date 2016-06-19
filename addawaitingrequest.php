<?php
$username = 'root';
$password = 'root';
$host     = 'localhost';
$database = 'ondagaia';

$con=mysqli_connect($host,$username,$password,$database);
$myID = $_POST['myID'];
$idR = $_POST['idR'];

class friend {
        public $numR = "";
	public $first_name = "";
	public $last_name = "";
}

class NUM {
        public $number = "";
}

$req1=mysqli_query($con,"UPDATE listcontact SET statusS='accepted',statusR='accepted' WHERE numS='$myID' AND numR='$idR'");
$req2=mysqli_query($con,"UPDATE listcontact SET statusS='accepted',statusR='accepted' WHERE numS='$idR' AND numR='$myID'");

$req=mysqli_query($con,"SELECT numR FROM listcontact WHERE numS='$myID' AND statusS='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

$eee=new NUM();
$eee->number="$myID";
echo json_encode($eee);

$ee=new NUM();
$ee->number=$count;
echo json_encode($ee);

for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['numR'];
	$e=new friend();
	$e->numR = $val;
	$sql2="SELECT num,first_name,last_name FROM test WHERE num='$val'";
	$req2=mysqli_query($con,$sql2);
	$row2=$req2->fetch_assoc();
	$e->first_name=$row2['first_name'];
	$e->last_name=$row2['last_name'];
	echo json_encode($e);
}

mysql_close();

?>
