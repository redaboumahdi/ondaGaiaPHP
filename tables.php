<?php

require 'conn.php';

$sql1="CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pseudo VARCHAR(255) NOT NULL,
first_name VARCHAR(255) NOT NULL,
last_name VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
phone VARCHAR(225) NOT NULL,
mail VARCHAR(255) NOT NULL
)";

if ($con->query($sql1) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$sql2="CREATE TABLE contacts (
num INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
idS INT(6) UNSIGNED,
idR INT(6) UNSIGNED,
statusS VARCHAR(255) NOT NULL,
statusR VARCHAR(255) NOT NULL
)";

if ($con->query($sql2) === TRUE) {
    echo "Table contacts created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$sql3="CREATE TABLE pictures (
num INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
idS INT(6) UNSIGNED,
idR INT(6) UNSIGNED,
status VARCHAR(255) NOT NULL,
url VARCHAR(255) NOT NULL,
orientation VARCHAR(255) NOT NULL,
radius VARCHAR(255) NOT NULL,
lat FLOAT UNSIGNED,
lon FLOAT UNSIGNED,
date VARCHAR(255) NOT NULL
)";

if ($con->query($sql3) === TRUE) {
    echo "Table pictures created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$sql4="CREATE TABLE chat (
id_send INT(10) NOT NULL,
id_rec INT(10) NOT NULL,
message VARCHAR(255) NOT NULL,
date DATETIME NOT NULL,
readMessage INT(10) NOT NULL
)";

if ($con->query($sql4) === TRUE) {
    echo "Table chat created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

mysqli.close();

?>

