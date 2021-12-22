<?
session_start();
require_once('connect.php');
$id=$_SESSION['id'];
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<head>

<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">

</head>

<body>

<div id="wrapper">

<header id="header-container">


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
 else { 
   ?>
  
			     <div class="user-menu" >
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name"; ?></div>
						<ul>
							<li><a href="my-profile.php?id=<? echo $id; ?>"><i class="sl sl-icon-user"></i> Профиль</a></li>
									<li><a href="bookmarks.php"><i class="sl sl-icon-star"></i> Избранное</a></li>
							<li><a href="my-properties.php"><i class="sl sl-icon-docs"></i> Мои объявления</a></li>
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
<div class="clearfix"></div>

<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Избранное</h2>


				<nav id="breadcrumbs">
					<ul>
						<li><a href="https://tophata.ru/">Главная</a></li>
						<li>Избранное</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">


		<div class="col-md-4">
			<div class="sidebar left">

				<div class="my-account-nav-container">
					
					<ul class="my-account-nav">
						
							<li><a href="my-profile.php?id=<? echo $id; ?>"><i class="sl sl-icon-user"></i>Мой профиль</a></li>
					</ul>
					
					<ul class="my-account-nav">
					
						
						<li><a href="my-properties.php"><i class="sl sl-icon-docs"></i> Мои квартиры</a></li>
						<li><a href="bookmarks.php"><i class="sl sl-icon-star"></i> Избранное</a></li>
						<li><a href="messenger.php"><i class="sl sl-icon-bubble"></i> Сообщения</a></li>
						<li><a href="booking.php"><i class="sl sl-icon-home"></i> Бронирование</a></li>
						<li><a href="submit-property.php"><i class="sl sl-icon-action-redo"></i> Добавить новое объявление</a></li>
					</ul>

					<ul class="my-account-nav">
						<li><a href="change-password.php"><i class="sl sl-icon-lock"></i> Изменить пароль</a></li>
						<li><a href="#"><i class="sl sl-icon-power"></i> Выйти</a></li>
					</ul>

				</div>

			</div>
		</div>

		<div class="col-md-8">
			<table class="manage-table bookmarks-table responsive-table">

				<tr>
					<th><i class="fa fa-file-text"></i> Избранное</th>
					<th></th>
				</tr>

<?php
$result=mysqli_query($con,"SELECT bookmarks.id_room,bookmarks.id_user,room.id_room,room.adres,room.price,room.price_m FROM bookmarks
              	inner join room on bookmarks.id_room=room.id_room
              WHERE  bookmarks.id_user='$id' ");
while ($row=mysqli_fetch_array($result)){
            $id_room=$row['id_room'];
            $adres=$row['adres'];
            $description=$row['descrition'];
            $price=$row['price'];

?>
				<tr id="tr<?=$id_room?>">
					<td  class="title-container">
<?
$resul1=mysqli_query($con,"SELECT name_image,MIN(id_image),id_room from images where id_room='$id_room' ");
while ($row=mysqli_fetch_array($resul1)){
$images=$row['name_image'];
}?>
						<img src="uploads/<?=$images?>" alt="">
				
						<div class="title">
							<h4><a href="https://tophata.ru/detail.php?id=<?=$id_room?>"><? echo "$adres"; ?></a></h4>
						
						
							<span class="table-property-price"><?=$price?> ₽</span>
						</div>
					</td>
					<td class="action">
						<a  data-id="<?=$id_room?>" class="delete"  id="id_room1<?=$id_room?>" value="<?=$id_room ?>"><i class="fa fa-remove"></i> Удалить</a>
					</td>
				</tr>
<script type="text/javascript" language="javascript">
$("#id_room1<?=$id_room?>").click(function(event){
var val = $(this).data('id');
$.post('ajax/del_izbr.php', {id_room: val}, function(data)
{
console.log(data);
  $('#tr<?=$id_room?>').fadeOut("slow");
   $('#id_room1<?=$id_room?>').fadeOut("slow");
});
});
</script> 	

<?

}
?>
			</table>
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
					<li><a href="login-register.php#tab2">Регистрация</a></li>
					<li><a href="login-register.php">Войти</a></li>
				
					<li><a href="submit-property.php">Добавить квартиру</a></li>
				</ul>

				<ul class="footer-links">
		
					<li><a href="contact.php">Контакты</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Контакты</h4>
				<div class="text-widget">
			
					E-Mail:<span> <a href="#">tophata@mail.ru</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20" style="margin-left: 12px;">
                	<li><a target="blank" class="fa fa-facebook" href="https://www.facebook.com/groups/3745188922183769"></a></li>
					<li><a class="fa fa-instagram" href="https://www.instagram.com" target="_blank"></a></li>
					<li><a class="fa fa-vk" href="#"> </a></li>

				</ul>

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



<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>

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