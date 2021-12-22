<?
require_once('../connect.php');
$id_room=$_POST['id_room'];
    
$run=mysqli_query($con, "DELETE from bookmarks where id_room='$id_room' ") or die (mysqli_error($con)); 

?>