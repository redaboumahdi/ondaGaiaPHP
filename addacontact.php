<?php
$username = 'root';
$password = 'root';
$host     = 'localhost';
$database = 'ondagaia';

$con=mysqli_connect($host,$username,$password,$database);


$numS = $_POST['numS'];
$IDReceiver = $_POST['idR'];
$waiting = 'waiting';
$accepted= 'accepted';

$sql1="SELECT num FROM test WHERE id='$IDReceiver'";
$req1=mysqli_query($con,$sql1);
$row = $req1->fetch_assoc();
$numR=$row['num'];
echo $numR;
$sql2="SELECT numS,numR FROM listcontact WHERE numS='$numS' AND numR='$numR'";
$req2=mysqli_query($con,$sql2);

if(mysqli_num_rows($req2)==1) {
	echo 'You already added this contact!';
}
else{
	$sqlS="INSERT INTO listcontact (numS,numR,statusS,statusR) VALUES ('$numS','$numR','$accepted','$waiting')";
	$sqlR="INSERT INTO listcontact (numS,numR,statusS,statusR) VALUES ('$numR','$numS','$waiting', '$accepted')";
	$reqS = mysqli_query($con,$sqlS) or die('Erreur SQL !<br>'.$sqlS.'<br>'.mysql_error()); 
	$reqR = mysqli_query($con,$sqlR) or die('Erreur SQL !<br>'.$sqlR.'<br>'.mysql_error()); 
}

class friend {
        public $numR = "";
	public $first_name = "";
	public $last_name = "";
}

class NUM {
        public $number = "";
}

$req=mysqli_query($con,"SELECT numR FROM listcontact WHERE numS='$numS' AND statusS='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

$eee=new NUM();
$eee->number="$numS";
echo json_encode($eee);

$ee=new NUM();
$ee->number=$count;
echo json_encode($ee);

for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['numR'];
	$e=new friend();
	$e->numR = $val;
	$sql3="SELECT num,first_name,last_name FROM test WHERE num='$val'";
	$req3=mysqli_query($con,$sql3);
	$row3=$req3->fetch_assoc();
	$e->first_name=$row3['first_name'];
	$e->last_name=$row3['last_name'];
	echo json_encode($e);
}
mysql_close();

?>
