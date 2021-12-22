<?php
session_start();
$name=$_SESSION['name'];
require_once('connect.php');

?>


<!DOCTYPE html>
<head>

<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
  
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">

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
</head>

<body>


<div id="wrapper">


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
  
					<div class="user-menu">
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name"; ?></div>
						<ul>
							<li><a href="my-profile.php?id=<? echo $id; ?>"><i class="sl sl-icon-user"></i> Профиль</a></li>
							<li><a href="my-bookmarks.php"><i class="sl sl-icon-star"></i> Избранное</a></li>
							<li><a href="my-properties.php"><i class="sl sl-icon-docs"></i> Мои объявления</a></li>
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

				<h2>Войти / Регистрация</h2>
				

				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Главная</a></li>
						<li>Войти / Регистрация</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<div class="container">

	<div class="row">
	<div class="col-md-4 col-md-offset-4">


	<div class="my-account style-1 margin-top-5 margin-bottom-40">

		<ul class="tabs-nav">
			<li class=""><a href="#tab1">Войти</a></li>
			<li><a href="#tab2">Регистрация</a></li>
		</ul>

		<div class="tabs-container alt">



	
			<div class="tab-content" id="tab1" style="display: none;">
				<form method="post" class="login">

					<p class="form-row form-row-wide">
						<label for="username">Email:
							<i class="im im-icon-Mail"></i>
							<input type="text" class="input-text" name="email1" id="username" value="" />
						</label>
					</p>

					<p class="form-row form-row-wide">
						<label for="password">Пароль:
							<i class="im im-icon-Lock-2"></i>
							<input class="input-text" type="password" name="password" id="password"/>
						</label>
					</p>
	<p class="lost_password">
						<a href="lost-pass.php" >Забыли пароль?</a>
					</p>

					<p class="form-row">
						<input type="submit" class="button border margin-top-10" name="login" value="Войти" />
					
					
				</form>
			</div>


			<div class="tab-content" id="tab2" style="display: none;">

				<form method="post" class="register">
					
				<p class="form-row form-row-wide">
					<label for="username2">Имя:
						<i class="im im-icon-Male"></i>
						<input type="text" class="input-text" name="name" id="username2" value=""required/>
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email:
						<i class="im im-icon-Mail"></i>
						<input type="text" class="input-text" name="email" id="email2" value="" required />
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Пароль:
						<i class="im im-icon-Lock-2"></i>
						<input class="input-text" type="password" name="pass1" id="password1" required/>
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">Повторите пароль:
						<i class="im im-icon-Lock-2"></i>
						<input class="input-text" type="password" name="pass2" id="password2" required/>
					</label>
				</p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="regi" value="Зарегистрироваться" />
				</p>

				</form>
			</div>

		</div>
	</div>



	</div>
	</div>

</div>



<?php

	if (isset($_POST['regi'])) {
	
		$login=$_POST['name'];	
		$email=$_POST["email"];
		$pass1=$_POST["pass1"];
		$pass2=$_POST["pass2"];			
		$images='images/avatar.jpg';
		$dogovor='users/doc.docx';

 if ( $pass1 ==$pass2) {

		$insert=mysqli_query($con,"INSERT INTO users (name,pass,role,email,images,dogovor) VALUES ('$login',md5('$pass1'),'$role','$email','$images','$dogovor')");


 	}else {
  echo "<script>alert('Пароли не совпадают!')</script>";

 }

}

?>

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

<?
if ($_POST['email1']!='' and $_POST['password']!='')
{
	$safe_name=mysqli_escape_string($con,$_POST['email1']);
	$safe_pass=mysqli_escape_string($con,$_POST['password']);
	$safe_pass=md5($safe_pass);
	$sql="SELECT * from users WHERE
	email='$safe_name' and pass='$safe_pass'";

	$result=mysqli_query($con,$sql);

		if (!mysqli_num_rows($result))
		{
		
  echo "<script>alert('Неверный логин или пароль')</script>";
}
		else
		{
			$line=mysqli_fetch_row($result);
			$_SESSION['autorized']=true;
			$_SESSION['email']=$_POST['email1'];
			$id=$_SESSION['id']=$line[0];
			$email=$_SESSION['name']=$line[1];

			 if ($_SESSION['role']=='admin') 
			 {
			   echo "<script>document.location.replace('https://tophata.ru/admin/report.php');</script>";
								
			 }
			else{

				echo "<script>document.location.replace('index.php');</script>";
			}

			}
		}
?>
</div>



</body>
</html>