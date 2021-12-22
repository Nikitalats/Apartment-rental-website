<?
  require_once('../connect.php');
		$id_user=$_POST['id_user'];
		$id_room=$_POST['id_room'];
$sql="Select * from room where id_room='$id_room'";
		$run_query1=mysqli_query($con,$sql);
	while ( $w1=mysqli_fetch_array($run_query1))
                  { 
                      $id_city=$w1['id_city'];
       
  $show=$w1['shows'];

}
	
if ( $show!='0'){
$run=mysqli_query($con, "Update room set shows='0' where id_room='$id_room' ") or die (mysqli_error($con)); 
	
}
else {
	$run1=mysqli_query($con, "Update room set shows='1' where id_room='$id_room' ") or die (mysqli_error($con)); 
} 
?>