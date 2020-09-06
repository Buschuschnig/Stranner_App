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

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 style = "margin-top: 70px">Cop Information</h1>
    <div id="alert-area"></div>
    <form action='editPlayer.php' method='post'>
        <div class="btn-group" role="group" aria-label="...">
            <input class = 'btn btn-primary btn-outline' type='submit' name='remove' value='Reset Civ Licenses'>
        </div>
        <div class="btn-group" role="group" aria-label="...">
            <input class = 'btn btn-primary btn-outline' type='submit' name='give' value='Give All Civ Licenses'>
        </div>
        <input type=hidden name=hidden value= <?php echo $uidPlayer; ?> >
        <input type=hidden name=guid value= <?php echo $guidPlayer; ?> >
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#myModal">Player Inventory</button>
    </form>
</div>
<br>


<div class="topnav">
    <a href="">General</a>
    <a class="active" href="player_cop.php">Cop</a>
    <a href="player_med.php">Medic</a>
    <a href="player_vehicles.php">Vehicles</a>
</div>

<style>
    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: white;
        color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #118324;
        color: white;
    }
</style>
