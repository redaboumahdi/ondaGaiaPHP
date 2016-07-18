<?php

require 'conn.php';

class NUM {
        public $phonenumber = "";
}

$req=mysqli_query($con,"SELECT phone FROM users");
for ($set = array (); $row = $req->fetch_assoc(); $set[] = $row);
$count = count($set);

for ($i = 0; $i < $count; $i++) {
	$val=$set[$i]['phone'];
	$e3=new NUM();
	$e3->phonenumber = $val;
	echo json_encode($e3);
	echo ";;;";
}

mysqli.close();

?>
