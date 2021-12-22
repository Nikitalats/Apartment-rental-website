<?php
session_start();
$id=$_SESSION['id'];
$name=$_SESSION['name'];
require_once('connect.php');

?>
<!DOCTYPE html>
<head>


<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
  
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">
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
						<li><a href="index.php">Контакты</a></li>			
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
						<div class="user-menu">
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name"; ?></div>
						<ul>
							<li><a href="my-profile.php?id=<? echo $id; ?>"><i class="sl sl-icon-user"></i> Профиль</a></li>
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
<div class="clearfix"></div>



<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Изменение пароля</h2>
	
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li>Изменение пароля</li>
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
						<li><a href="logout.php"><i class="sl sl-icon-power"></i> Выйти</a></li>
					</ul>

				</div>

			</div>
		</div>
<form id="form1" method="Post" action="ajax/edit_pass.php" >
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6  my-profile">
					<h4 class="margin-top-0 margin-bottom-30">Изменение пароля</h4>

					<label>Пароль</label>
					<input type="password" id="pass1" name="pass1" required>

					<label>Повторите пароль</label>
					<input type="password" id="pass2" name="pass2"  required>

			

					<button class="margin-top-20 button" name='pass' type="submit" onClick="call()">Сохранить изменения</button>
				<div id="results"></div>
				</div>

			</div>
		</div>

	</div>
</div>


</form>


<script type="text/javascript" language="javascript">
                function call() {
                  event.preventDefault();
                  var msg   = $('#form1').serialize();
                     $.ajax({
                       type: 'POST',
                       url: 'ajax/edit_pass.php',
                       data: msg,
                       success: function(data) {
                         $('#pass1').val('');
                         $('#pass2').val('');
                         $('#results').html(data);
                       },
                       error:  function(xhr, str){
                   alert('Возникла ошибка: ' + xhr.responseCode);
                       }
                     });
              
                 }
             </script> 

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
			
					E-Mail:<span> <a href="#">tophata@mail.ru</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20" style="margin-left: 12px;">

					<li><a class="fa fa-instagram" href="#"></a></li>
					<li><a class="fa fa-facebook" href="#"></a></li>
					<li><a class="fa fa-vk" href="#"></a></li>

				</ul>

			</div>

		</div>
		

		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Tophata</div>
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