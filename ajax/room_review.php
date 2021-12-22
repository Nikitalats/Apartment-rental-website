<?php
session_start();
require_once('..//connect.php');

	$rating= intval($_POST['rating']); 
	$id_room= $_POST['id_room'];
	$name= $_POST['name'];  
	$id=$_SESSION['id'];    
	$review_text= $_POST['review_text']; 
    $date = date("m-d-Y");  

		  if (!$_SESSION['name']) {

  ?><div class="col-md-6">
<div class="notification error closeable">
				<p>Войдите чтобы оставить отзыв</p>
			</div>   
			</div>  

  <?
	 	exit();
  }
  
   $comm="SELECT * FROM reserve WHERE id_user='$id'  AND id_room='$id_room' and dogovor_arendatel='1' ";
                  $comments=mysqli_query($con,$comm);
                  $w=mysqli_fetch_array($comments);
                   if($w['id_reserve']==""  ){ 
                        $id_reserve=$w['id'];
    
     
?>
<div class="notification error closeable">
				<p>Вы не жили в этой квартире</p>
			</div>  
<?
exit();
}

$sql="INSERT INTO room_review (id_room,id_user,name,text_review,data_review,rating) values ('$id_room','$id','$name','$review_text','$date','$rating')";
	$r=mysqli_query($con,$sql) or die (mysqli_error($con));

$query="SELECT round(AVG(rating),1) AS Average_Price FROM room_review where id_room='$id_room'";

$run= mysqli_query($con,$query);
$run1= mysqli_query($con,$query1);
$count=mysqli_num_rows($run1);
while ( $row=mysqli_fetch_array($run)){

	$rating1= $row['Average_Price'];

}

$sql5="Update room set rating='$rating1' where id_room='$id_room'";
$r5=mysqli_query($con,$sql5) or die (mysqli_error($con));
?>

					<div class="rating-result">
						<? for ($i=0; $i<$rating; $i++) { 
							
					?>
					<span class="active"></span>	
					<?}?>
				
					</div>
						<div class="avatar"><img src="images/avatar.jpg" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by"><?  echo "$name"; ?><span class="date"></span>
							<?=$date?>	
							</div>
							<p><? echo "$review_text"; ?></p>
						</div>

						
					</li>