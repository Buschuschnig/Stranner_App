<?php
error_reporting(0);
session_start();
ob_start();
$version = '';

if (!isset($_SESSION['logged'])) {
    header('Location: index.php');
    die();
}

$staffPerms = $_SESSION['perms'];
$user = $_SESSION['user'];

$uidPlayer = $_POST['hidden'];
$guidPlayer = $_POST['guid'];

include 'verifyPanel.php';
masterconnect();

$sql = "SELECT * FROM `players` WHERE uid = '$uidPlayer'";
$result = mysqli_query($dbcon, $sql);
$player = $result->fetch_object();


$username = utf8_encode($player->name);
$pid = playerID($player);
include 'header/header.php';
?>