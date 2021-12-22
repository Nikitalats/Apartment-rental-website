<?php

require_once('connect.php');
if (isset($_GET['id'])) {
	$id_reserve=$_GET['id'];
	$q="DELETE from reserve where id_reserve='$id_reserve'";
	$delet=mysqli_query($con,$q);
		echo "<script>window.open('booking.php','_self')</script>";
    }
?>