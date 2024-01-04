<?php

$db_server_name = "localhost";
$db_user_name   = "root";
$db_password    = "";
$db_name        = "bnkms";

$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

if ($db_con) {
	echo " ";
} else {
	echo "Not Connected";
}
?>