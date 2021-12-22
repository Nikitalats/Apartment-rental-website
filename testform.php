<?php
session_start();
require_once('connect.php');
$_SESSION['city']=$_POST['city'];
$_SESSION['people']=$_POST['people'];
$_SESSION['date']=$_POST['date'];
$_SESSION['date1']=$_POST['date1'];
$_SESSION['price1']=$_POST['price1'];
$_SESSION['price2']=$_POST['price2'];
$_SESSION['rooms']=$_POST['rooms'];
$_SESSION['wifi']=$_POST['wifi'];
$_SESSION['condi']=$_POST['condi'];
$_SESSION['wash']=$_POST['wash'];
$_SESSION['micro']=$_POST['micro'];
header('location: https://tophata.ru/listings.php');
?>

