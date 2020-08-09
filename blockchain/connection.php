<?php

$servername='localhost';
$username='root';
$password='';
$blockchain='alpha';

$connect=mysqli_connect($servername,$username,$password,$blockchain);

if(!$connect){
	 die('connection failed'.mysqli_connect_error());
} else
{ //echo 'connect worked';


}

error_reporting(0);
?>
