<?php
$dsn = 'mysql:host=localhost;dbname=wif_data';
$username = 'accessUser';
$pass = 'thePASSword';

try{
	$db = new PDO($dsn, $username, $pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "connection failed: " . $e->getMessage();
}
?>
