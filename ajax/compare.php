<? session_start(); 
$id=$_SESSION['id'];
require_once('../connect.php');
$id_room=$_POST['id_room'];
if(isset($_POST["id_room"]) && strlen($_POST["id_room"])>0)
{

$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$prices=$row['price'];
}

$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];

}

 $comm="SELECT * FROM compare WHERE id_user='$id'  AND id_room='$id_room' ";
                   $comments=mysqli_query($con,$comm);
                  $w=mysqli_fetch_array($comments);
                   if($w['id']!=""  ){ 
                        $id_izbr=$w['id'];
   
	exit();
}

	$id=$_SESSION['id'];
		if (mysqli_query($con,"INSERT INTO compare (id_user,id_room) values ('$id','$id_room')"));
		{

			$resul1=mysqli_query($con,"SELECT name_image,MIN(id_image),id_room from images where id_room='$id_room' ");

while ($row=mysqli_fetch_array($resul1)){

$images=$row['name_image'];

		}?>		
		
<div id="list<?=$id_room?>" class="listing-item compact">
				<a href="detail.php?id=<?=$id_room?>" class="listing-img-container">
					<div class="remove-from-compare" id="del-<?=$id_room; ?>"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title"><?=$adres?><i><?=$prices?></i></span>
					</div>
					<img class="img1" src="uploads/<?=$images?>" alt="">
				</a>
			</div>

		<?

	}
}
elseif(isset($_POST["recordToDelete"]) )
   $idToDelete =$_POST["recordToDelete"];
   $run=mysqli_query($con,"DELETE FROM compare WHERE id_room='$idToDelete'");
}

?>

	
		