<?
require_once('../connect.php');
$id_user= $_POST["recordToDelete"];
echo "$id_user";   
$run=mysqli_query($con, "DELETE from users where id='$id_user' ") or die (mysqli_error($con)); 
?>