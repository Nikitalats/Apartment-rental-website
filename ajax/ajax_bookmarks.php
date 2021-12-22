<?

session_start();
$name=$_SESSION['name'];

	$id_user=$_SESSION['id'];
  require_once('connect.php');
	
		$id_room=$_POST['id_room'];
				
 $comm="SELECT * FROM bookmarks WHERE id_user='$id_user'  AND id_room='$id_room' ";
                   $comments=mysqli_query($con,$comm);
                  $w=mysqli_fetch_array($comments);
                   if($w['id']!=""  ){ 
                        $id_izbr=$w['id'];
    
     
$run=mysqli_query($con, "DELETE from bookmarks where id='$id_izbr' ") or die (mysqli_error($con)); 
exit();
}

		$sql="INSERT INTO bookmarks (id_user,id_room) values ('$id_user','$id_room')";
		$run_query=mysqli_query($con,$sql);
		
	
	?>