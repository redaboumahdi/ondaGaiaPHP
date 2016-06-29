<?php

require 'conn.php';

$idS = $_POST['idS'];
$pseudoR = $_POST['pseudoR'];
$waiting = 'waiting';
$accepted= 'accepted';

$sql1="SELECT id FROM users WHERE pseudo='$pseudoR'";
$req1=mysqli_query($con,$sql1);
$row = $req1->fetch_assoc();
$idR=$row['id'];

$sql2="SELECT idS,idR FROM contacts WHERE idS='$idS' AND idR='$idR'";
$req2=mysqli_query($con,$sql2);

if(mysqli_num_rows($req2)==1) {
	echo 'You already added this contact!';
}
else{
	$sqlS="INSERT INTO contacts (idS,idR,statusS,statusR) VALUES ('$idS','$idR','$accepted','$waiting')";
	$sqlR="INSERT INTO contacts (idS,idR,statusS,statusR) VALUES ('$idR','$idS','$waiting', '$accepted')";
	$reqS = mysqli_query($con,$sqlS) or die('Erreur SQL !<br>'.$sqlS.'<br>'.mysql_error()); 
	$reqR = mysqli_query($con,$sqlR) or die('Erreur SQL !<br>'.$sqlR.'<br>'.mysql_error()); 
}

class friend {
        public $idR = "";
	public $first_name = "";
	public $last_name = "";
}

class NUM {
        public $number = "";
}

$req=mysqli_query($con,"SELECT idR FROM contacts WHERE idS='$idS' AND statusS='accepted'");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

$e1=new NUM();
$e1->number="$idS";
echo json_encode($e1);

$e2=new NUM();
$e2->number=$count;
echo json_encode($e2);

for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['idR'];
	$e3=new friend();
	$e3->idR = $val;
	$sql3="SELECT first_name,last_name FROM users WHERE id='$val'";
	$req3=mysqli_query($con,$sql3);
	$row3=$req3->fetch_assoc();
	$e3->first_name=$row3['first_name'];
	$e3->last_name=$row3['last_name'];
	echo json_encode($e3);
}
mysql_close();

?>
