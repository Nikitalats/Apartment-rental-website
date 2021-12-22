<?
session_start();
require_once('connect.php');
$id=$_SESSION['id'];
$name=$_SESSION['name'];
if ($_SESSION['id']=='') {
header ('location: https://tophata.ru/login-register.php');
}
?>
<!DOCTYPE html>
<head>


<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
<link rel="shortcut icon" href="images/loggg.png" type="image.png">



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



<div class="margin-top-55"></div>
<div class="clearfix"></div>



<div class="container">

	<div class="row">


		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Наши контакты:</h4>

	
			<div class="sidebar-textbox">


				<ul class="contact-details">
	
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#">tophata@mail.ru</a></span></li>
				</ul>
			</div>

		</div>


		<div class="col-md-8">
	
			<section id="contact">
				<h4 class="headline margin-bottom-35">Контактная форма</h4>

				<div id="contact-message"></div> 

					<form method="post" action="ajax/mail.php" name="contactform" id="contactform" >

					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="namee" type="text" id="namee" placeholder="Имя" required />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="tema" type="text" id="tema" placeholder="Тема" required="required" />
					</div>

					<div>
						<textarea name="messagess" cols="40" rows="3" id="messagess" placeholder="Сообщение" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button" id="btn_submit" value="Отправить" />
					<div id="erconts"></div>

					</form>
			</section>
		</div>
	

	</div>

</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){

            $('#btn_submit').click(function(){
                event.preventDefault();
                var user_name    = $('#namee').val();
                var user_email   = $('#email').val();
                var user_tema = $('#tema').val();
                var text_comment = $('#messagess').val();

                $.ajax({
                    url: "ajax/mail.php", 
                    type: "post", 
                    data: { 
                        "namee":    user_name,
                        "email":   user_email,
                        "tema":   user_tema,
                        "messagess": text_comment
                    },
                    error:function(){$("#erconts").html("Произошла ошибка!");}, 
           
                    beforeSend: function() {                     
                        $("#erconts").html("Отправляем данные...");                   
                    },                 
                    success: function(result){                     
                  
                        $('#erconts').html(result); 
            
                        console.log("ntcn");                 
                    }  
                });
            });
        });
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











</body>
</html>