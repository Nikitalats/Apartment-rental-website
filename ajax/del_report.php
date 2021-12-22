<?
require_once('../connect.php');
$id_report=$_POST['id_report'];
$id_room=$_POST['id_room'];
echo $id_report;	     
$run=mysqli_query($con, "DELETE from report where id_report='$id_report' ") or die (mysqli_error($con)); 	
?>