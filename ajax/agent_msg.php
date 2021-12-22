<?php
session_start();
require_once('connect.php');

$rating= intval($_POST['rating']); 
$id_arendatel= $_POST['arendatel'];  
$name= $_POST['name'];  
$id=$_SESSION['id'];           
$review_text= $_POST['review_text'];    
	
if (!$_SESSION['name']) {
  
	 	exit();
  }

$sql="INSERT INTO user_review (id_user,id_arendatel,name,review_text,rating) values ('$id','$id_arendatel','$name','$review_text','$rating')";
	$r=mysqli_query($con,$sql) or die (mysqli_error($con));
?>
				<li>
					<div class="rating-result">
						<? for ($i=0; $i<$rating; $i++) { 
							
					?>
					<span class="active"></span>	
					<?}?>
				
					</div>
						<div class="avatar"><img src="images/avatar.jpg" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by"><?  echo "$name"; ?><span class="date"></span>
								
							</div>
							<p><? echo "$review_text"; ?></p>
						</div>

						
					</li>