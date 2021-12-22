<?
session_start();
	$id=$_SESSION['id'];
    $name =$_SESSION['name'];
  require_once('connect.php');
  ?>


<!DOCTYPE html>
<head>


<title>Снять квартиру <?=$name_city ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Снять квартиру на сутки, месяц в центре города Березники со всем необходимым для проживания"/>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


 <link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <script src="https://api-maps.yandex.ru/2.1/?apikey=253d8ca7-24be-4033-b444-583bd681b4f7&lang=ru_RU" type="text/javascript"></script>

<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">




<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(73042177, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/73042177" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<style>
  .img {
  object-fit: cover;
  width: 100%;
  height: 150px;
  margin: 2px;
  
  &:nth-child(even) {
      object-fit: contain;
  }
}



</style>

</head>

<body>

<div id="wrapper">



<header id="header-container">



	<div class="clearfix"></div>



	<div id="header">
		<div class="container">
			

			<div class="left-side">
				
	
				<div id="logo">
					<a href="index.php"><img src="images/logoo.png" alt=""></a>
				</div>


				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>



				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="index.php">Главная</a>
						
						</li>
							<li><a href="contact.php">Контакты</a>
						
						</li>


	

					</ul>
				</nav>
				<div class="clearfix"></div>
	
				
			</div>
	
			<div class="right-side">
	
				<div class="header-widget">
<?php
   if (!isset($_SESSION['id']))
   {
    
    echo "<a href='login-register.php' class='sign-in'><i class='fa fa-user'></i> Войти / Регистрация</a>";
   }
 	else 
 	{ 
 ?>
  
					<div class="user-menu">
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name"; ?></div>
						<ul>
							<li><a href="my-profile.php?id=<? echo $id; ?>"><i class="sl sl-icon-user"></i> Профиль</a></li>
									<li><a href="bookmarks.php"><i class="sl sl-icon-star"></i> Избранное</a></li>
							<li><a href="my-properties.php"><i class="sl sl-icon-docs"></i> Мои обьявления</a></li>
								<li><a href="booking.php"><i class="sl sl-icon-home"></i> Бронирование</a></li>
							<li><a href="messenger.php"><i class="sl sl-icon-bubble"></i> Мои сообщения</a></li>
							<li><a href="logout.php"><i class="sl sl-icon-power"></i> Выйти</a></li>
						</ul>
					</div>

	<?			
   }
?>
					<a href="submit-property.php" class="button border">Добавить квартиру</a>
				</div>

			</div>


		</div>
	</div>


</header>

<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Сравнение</h2>
				
				<nav id="breadcrumbs">
					<ul>
						<li><a href="https://tophata.ru/">Главная</a></li>
						<li>Сравнение</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		
			<div class="compare-list-container">
				<ul id="compare-list">


					<li class="compare-list-properties<?=$id_room?>">

<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$ploshad=$row['ploshad'];
	$price=$row['price'];



}


			$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];

}

?>
						<div class="blank-div" ></div>
						<div id="blank-div<?=$id_room?>">
							<a href="#">
								<div class="clp-img">
									<img class="img" src="uploads/<?=$images?>" alt="">
									<span class="remove-from-compare"  id="del-<?=$id_room; ?>"><i class="fa fa-close"></i></span>
								</div>

								<div class="clp-title">
									<h4><?=$adres?></h4>
									<span><?=$price ?> ₽</span>
								</div>
							</a>
						</div>

							<?}?>
					</li>
						
				<div id="room<?=$id_room?>">		
					<li>
					
						<div>Площадь</div>
						

<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$ploshad=$row['ploshad'];
}
?>
						<div id='room7<?=$id_room?>'><?=$ploshad?></div>
				
							<?}?>
					</li>

					<li>
						<div>Комнат</div>
					<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$rooms=$row['rooms'];
}
?>
						<div id='room6<?=$id_room?>'><?=$rooms?></div>
				
							<?}?>
					</li>

					<li>
						<div>Спальных мест</div>
								<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$people=$row['people'];
}
?>
						<div id='room5<?=$id_room?>'>


							<?=$people?></div>
				
							<?}?>
					</li>


					<li>
						<div>Микроволновка</div>
							<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$micro=$row['micro'];

}

if ($micro==''){
	echo "			<div id='room4$id_room'><span class=not-available></span></div>";
}
else
{
	echo "			<div id='room4$id_room'><span class=available></span></div>";	
}
}
?>

					</li>

					<li>
						<div>Стиральная машина</div>
												<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$wash=$row['wash'];

}

if ($wash==''){
	echo "			<div id='room1$id_room'><span class=not-available></span></div>";
}
else
{
	echo "			<div id='room1$id_room'><span class=available></span></div>";	
}
?>

<script type="text/javascript">
		       $("body").on("click", "#blank-div<?=$id_room?> .remove-from-compare", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-"); 
        var DbNumberID = clickedID[1]; 
        var myData = 'recordToDelete='+ DbNumberID; 

        jQuery.ajax({
            type: "POST", 
            url: "compare.php", 

            data:myData, 
            success:function(response){

               $('#blank-div'+DbNumberID).fadeOut("slow");
                  $('#room1'+DbNumberID).fadeOut("slow");
              
            $('#item_'+DbNumberID).fadeOut("slow");
            },
            error:function (xhr, ajaxOptions, thrownError){
    
                alert(thrownError);
            }
        });
    });
</script>
<?
}
?>

					</li>
					
					<li >
						<div>Кондиционер</div>
															<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$condi=$row['condi'];

}

if ($condi==''){
	echo "			<div id='room2$id_room'><span class=not-available></span></div>";
}
else
{
	echo "			<div id='room2$id_room'><span class=available></span></div>";	
}
?>


<?


}
?>

					</li>
			

					<li>
						<div>Интернет</div>
					
										<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$wifi=$row['wifi'];
}

if ($wifi==''){
	echo "			<div id='room3$id_room'><span class=not-available></span></div>";
}
else
{
	echo "			<div id='room3$id_room'><span class=available></span></div>";	
}
}
?>

				
					</li>
</div>
		

				</ul>
<script type="text/javascript">
		       $("body").on("click", "#blank-div<?=$id_room?> .remove-from-compare", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-"); 
        var DbNumberID = clickedID[1]; 
        var myData = 'recordToDelete='+ DbNumberID; 

        jQuery.ajax({
            type: "POST", 
            url: "compare.php", 
       
            data:myData, 
            success:function(response){
        
               $('#blank-div'+DbNumberID).fadeOut("slow");
                  $('#room'+DbNumberID).fadeOut("slow");
              
            $('#item_'+DbNumberID).fadeOut("slow");
            },
            error:function (xhr, ajaxOptions, thrownError){

                alert(thrownError);
            }
        });
    });
</script>

			</div>


		</div>
	</div>
</div>


<div class="margin-top-55"></div>

<div id="footer">

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logoo.png" alt="">
				<br><br>
	
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Полезные ссылки</h4>
				<ul class="footer-links">
					<li><a href="login-register.php">Регистрация</a></li>
					<li><a href="login-register.php">Войти</a></li>
				
					<li><a href="submit-property.php">Добавить квартиру</a></li>

				</ul>

				<ul class="footer-links">
	
					<li><a href="#">Контакты</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Контакты</h4>
				<div class="text-widget">
		
					E-Mail:<span> <a href="#">support@tophata.ru</a> </span><br>
				</div>

			<ul class="social-icons margin-top-20" style="margin-left: 12px;">

					<li><a class="fa fa-instagram" href="#"></a></li>
					<li><a class="fa fa-facebook" href="#"></a></li>
					<li><a class="fa fa-vk" href="#"></a></li>

				</ul>

			</div>

			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Tophata</div>
			</div>
		</div>

	</div>
</div>

<div id="backtotop"><a href="#"></a></div>

<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>





</div>



</body>
</html>