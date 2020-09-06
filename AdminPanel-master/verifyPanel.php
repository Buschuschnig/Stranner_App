<?php

include "functions.php";

function masterconnect(){

	global $dbcon;
	$dbcon = mysqli_connect('127.0.0.1', 'root', '', 'test1', '3306') or die ('Database connection failed');
}

function loginconnect(){

	global $dbconL;
	$dbconL = mysqli_connect('127.0.0.1', 'root', '', 'test1', '3306');
}

function Rconconnect(){

	global $rcon;
	$rcon = new \Nizarii\ArmaRConClass\ARC('127.0.0.0', 0, 'root');
}

global $DBHost;
$DBHost = '127.0.0.1';
global $DBUser;
$DBUser = 'root';
global $DBPass;
$DBPass = '';
global $DBName;
$DBName = 'test1';

global $RconHost;
$RconHost = '127.0.0.0';
global $RconPort;
$RconPort = 0;
global $RconPass;
$RconPass = 'root';

global $maxCop;
$maxCop = 13;
global $maxMedic;
$maxMedic = 13;
global $maxAdmin;
$maxAdmin = 13;
global $maxDonator;
$maxDonator = 3;

global $apiUser;
$apiUser = 'default';
global $apiPass;
$apiPass = 'password';
global $apiEnable;
$apiEnable = 1;

?>
