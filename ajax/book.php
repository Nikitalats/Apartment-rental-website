<?php
session_start();
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$test_city=$_SESSION['city'];
$test_people=$_SESSION['people'];
require_once('connect.php');

if(isset($_POST)){
$id_room=$_POST['room'];
$id_city=$_POST['city'];
$id_arendadatel=$_POST['arendatel'];
$date=$_POST['date'];
$date1=$_POST['date1'];
    if ($id==''){
?>
			<div class="notification error">Бронировать могут только зарегистрированные пользователи</div>	
	
			<?
exit();
}

    if ($date==''){
?>
			<div class="notification error">Выберите даты проживания</div>	
	
			<?
exit();
}
   
  
    if ($date1==''){
?>
			<div class="notification error">Выберите даты проживания</div>	
	
			<?
exit();
}
    
   
     
$run=mysqli_query($con, "INSERT into reserve (id_room,id_user,id_arendatel,id_city,datearrive,dateleave)  values ('$id_room','$id','$id_arendadatel','$id_city','$date','$date1')") or die (mysqli_error($con)); 

?>

   <div class="notification success">Заявка отпралена<strong id="calc" class="calc-output"> </strong></div> 

<script>
window.location = "https://tophata.ru/booking.php"
</script>


