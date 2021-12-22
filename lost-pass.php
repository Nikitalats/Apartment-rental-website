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
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>

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

				<h2>Восстановление пароля</h2>
				

				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Главная</a></li>
						<li>Восстановление пароля</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<div class="container full-width">

	<div class="row">

		<article id="post-564" class="col-md-12 post-564 page type-page status-publish hentry">
			<div class="col-md-8">
	<div class="row">
		<div class="col-md-6 my-account">
									<form id="lostpasswordform" action="" method="post">
				
			<p class="form-row">
				<label for="user_login">Email:<i class="im im-icon-Mail"></i>
					<input type="text" name="email" id="user_login">
				</label>
			</p>
   <div id="inform2"></div> 
			
			<p class="lostpassword-submit">
				<input id="lost" type="submit" name="submit" class="button" value="Восстановить">
			</p>
		</form>

	</div>
	</div>
</div>

			 
			
		</article>
		
		
	</div>

</div>

              <script>
     $("#lost").click(function(event){
       event.preventDefault();
       var email=$("#user_login").val();
       var code=$("#code").val();
       
       $.ajax({
          type:"post",
          url:"ajax/recovery.php",
          data:{
             
              
               email:email,
                      code:code
           
          },
          success:function(data){
              
             $("#inform2").html(data); 
     
   
          }
       });
   });
</script>  


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