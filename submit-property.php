<?
session_start();
require_once('connect.php');
$id_user=$_SESSION['id'];
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

<?php
  echo '<link rel="stylesheet" type="text/css" href="css/style.css?ver=' . filemtime('css/style.css') . '" />';
?>
<link rel="stylesheet" href="css/color.css">
  
<?php
  echo '<link rel="stylesheet" type="text/css" href="select2/dist/css/select2.css?ver=' . filemtime('select2/dist/css/select2.css') . '" />';
?>
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> 
<script type="text/javascript" src="select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="select2/dist/js/i18n/ru.js"></script> 
<script src="https://api-maps.yandex.ru/2.1/?apikey=253d8ca7-24be-4033-b444-583bd681b4f7&lang=ru_RU" type="text/javascript"></script>
<script src="js/cord.js" type="text/javascript"></script>

<?php
  echo ' <script type="text/javascript" src="scripts/dropzone.js?ver=' . filemtime('scripts/dropzone.js') . '" ></script>';
?>

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
			
							<li><a href="my-properties.php"><i class="sl sl-icon-docs"></i> Мои объявления</a></li>
								<li><a href="booking.php"><i class="sl sl-icon-home"></i> Бронирование</a></li>
								<li><a href="messenger.php"><i class="sl sl-icon-bubble"></i> Сообщения</a></li>
				
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


<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i> Добавить квартиру</h2>
			</div>
		</div>
	</div>
</div>


<div class="container">
<div class="row">


	<div class="col-md-12">
		<div class="submit-page">
		    
		    
<?php
   if (!isset($_SESSION['id']))
   {
    ?>
  <div class='user-menu'>
<div class="notification notice large margin-bottom-55">
	  
	    <p>Зарегистрируйтесь чтобы добавлять объявления</p>
	</div>
  </div>
  <?
   }

   ?>
		    

		<h3>Информация</h3>
		<div class="submit-section">


<h3>Галерея</h3>
<div class="col-md-12">
<div class="content">
 <div class="col-lg-12">
<div class="panel">
    <div class="image_upload_div">
                <form   action="uploads.php" class="dropzone" >
                    <div class="dz-message">
                        Перетащите файлы или нажмите<br>
                       
                    </div>
                    
                </form>
              
            </div>
    </div></div></div>
</div>
 
 

 
<script type="text/javascript">
Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
 addRemoveLinks: true,
 removedfile: function(file) {
   var name = file.name; 
   
   $.ajax({
     type: 'POST',
     url: 'uploads.php',
     data: {name: name,request: 2},
     sucess: function(data){
        console.log('success: ' + data);
     }
   });
   var _ref;
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
 },
 
 
 
});
</script>

</div>
    <form name="forma1" method="POST" id="formx" action="javascript:void(null);" onsubmit="call()">
			<div class="row with-forms">
	

					<div class="col-md-4">
					<h5>Комнат </h5>
					<div class="select-input ">
						<input type="text" data-unit="" name="rooms" required>
					</div>
				</div>



				<div class="col-md-4">
					<h5>Цена за сутки </h5>
					<div class="select-input disabled-first-option">
						<input type="text"  data-unit="" name="price" required>
					</div>
				</div>
				
	
				<div class="col-md-4">
					<h5>Цена за месяц</h5>
					<div class="select-input disabled-first-option">
						<input type="text"  data-unit="" name="price_m" required>
					</div>
				</div>
</div>
	<div class="row with-forms">
					<div class="col-md-4">
					<h5>Площадь</h5>
					<div class="select-input disabled-first-option">
						<input type="text"  data-unit="" name="ploshad" required>
					</div>
				</div>

					<div class="col-md-4">
					<h5>Этаж</h5>
					<div class="select-input disabled-first-option">
						<input type="text"  data-unit="" name="floor" required>
					</div>
				</div>	

				
				<div class="col-md-4">
					<h5>Cпальных мест</h5>
					<select class="chosen-select-no-single" name="people" required>
						
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							
						</select>
				</div>

	
			
			</div>

		<h3>Расположение</h3>
		
		<div class="submit-section"  style="margin-bottom:0px; ">

<div id="map" style="width: 100%; height: 370px; "></div>

			<div class="row with-forms" style="padding-top:30px; ">


				<div class="col-md-6">
				  
					<h5>Адрес</h5>
					<input id="adres" type="text" name="adres" required>
			
				</div>

				<div class="col-md-6">
					<h5>Город</h5>

							<select class="select2" name="city" >
 <?  

							$result=mysqli_query($con,"SELECT* from geo_city");


							while ($row=mysqli_fetch_array($result)){
								$name=$row['name'];
								$id=$row['id'];
								echo "<option value=''></option> 
								<option value='$id'>$name</option> ";
							} 
							
							?>
</select>
						
   
                
   <input class="input" type="hidden" name="Address" size="40" value="" placeholder="Адрес"><br>


<input type="hidden" id="coordinates" name="point" placeholder="Координаты"><br>    

                        
                </div>

            </div>

        </div> 
        
     <script>
   $("#adres").keyup(function () {
     var value = $(this).val();
     $(".input").val(value);
   });
</script>   

<script>


$ ( ".select2" ). select2 ({ 
	placeholder: "Выберите город",
    	language: "ru"
     });
</script>
		<h3>Подробная информация</h3>
		<div class="submit-section">

		
			<div class="form">
				<h5>Описание</h5>
				<textarea class="WYSIWYG" name="text" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
			</div>

		
		
			
	</div>

			<h5 class="margin-top-30">Удобства</h5>
			
			<div class="checkboxes in-row margin-bottom-20">
		
				<input id="check-2" type="checkbox" name="wifi">
				<label for="check-2">Wi-fi</label>

				<input id="check-3" type="checkbox" name="micro">
				<label for="check-3">Микроволновка</label>

				<input id="check-4" type="checkbox" name="condi" >
				<label for="check-4">Кондиционер</label>

				<input id="check-5" type="checkbox" name="wash" >
				<label for="check-5">Стиральная машина</label>
		
				<input  type="hidden" name="id_user" value="<?=$id_user?>" >
		
			</div>

<button  type="submit" id="startUpload" class="button preview margin-top-5" style="margin-bottom: 20px;">Опубликовать <i class="fa fa-arrow-circle-right"></i></button>
	 <div id="results"></div>
		</div>
					
</form>

     <script type="text/javascript" language="javascript">
                function call() {
                  var msg   = $('#formx').serialize();
                     $.ajax({
                       type: 'POST',
                       url: 'uploads.php',
                       data: msg,
                       success: function(data) {
              window.open('my-properties.php');
                       },
                       error:  function(xhr, str){
                   alert('Возникла ошибка: ' + xhr.responseCode);
                       }
                     });
              
                 }
             </script>
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

<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-migrate-3.1.0.min.js"></script>

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