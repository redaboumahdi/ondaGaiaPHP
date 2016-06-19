<?php
$username = 'root';
$password = 'root';
$host     = 'localhost';
$database = 'ondagaia';

# connect to the database or die
$con=mysqli_connect($host,$username,$password,$database);
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

$sql1="CREATE TABLE test (
num INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id VARCHAR(255) NOT NULL,
first_name VARCHAR(255) NOT NULL,
last_name VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL
)";
if ($con->query($sql1) === TRUE) {
    echo "Table test created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$sql2="CREATE TABLE listcontact (
num INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
numS INT(6) UNSIGNED,
numR INT(6) UNSIGNED,
statusS VARCHAR(255) NOT NULL,
statusR VARCHAR(255) NOT NULL
)";
if ($con->query($sql2) === TRUE) {
    echo "Table listcontact created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$sql3="CREATE TABLE photo (
num INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
numS INT(6) UNSIGNED,
numR INT(6) UNSIGNED,
status VARCHAR(255) NOT NULL,
url VARCHAR(255) NOT NULL,
lat FLOAT UNSIGNED,
lon FLOAT UNSIGNED
)";
if ($con->query($sql3) === TRUE) {
    echo "Table photo created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

mysqli.close();
?>
