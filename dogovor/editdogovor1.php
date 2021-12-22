<?php
session_start();
$id=$_SESSION['id'];
$name=$_SESSION['name'];
require_once('..//connect.php');
?>

<!DOCTYPE html>
<head>


<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">

<script type="text/javascript" src="..//scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="..//scripts/jquery.maskedinput.js"></script>
<link rel="stylesheet" href="..//css/style.css">
<link rel="stylesheet" href="..//css/color.css">
  



</head>

<body>

<div id="wrapper">

<header id="header-container">


	<div id="header">
		<div class="container">
			

			<div class="left-side">
	
				<div id="logo">
					<a href="..//index.php"><img src="..//images/logoo.png" alt=""></a>
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

						<li><a href="..//index.php">Главная</a>
							<li><a href="..//contact.php">Контакты</a></li>
				
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
    
    echo "<a href='..//login-register.php' class='sign-in'><i class='fa fa-user'></i> Войти / Регистрация</a>";
   }
 else { 
   ?>
  
					<div class="user-menu">
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name"; ?></div>
						<ul>
							<li><a href="https://tophata.ru/my-profile.php?id=<? echo $id; ?>"><i class="sl sl-icon-user"></i> Профиль</a></li>
							<li><a href="https://tophata.ru/my-properties.php"><i class="sl sl-icon-docs"></i> Мои объявления</a></li>
								<li><a href="https://tophata.ru/booking.php"><i class="sl sl-icon-home"></i> Бронирование</a></li>
							<li><a href="https://tophata.ru/messenger.php"><i class="sl sl-icon-bubble"></i> Мои сообщения</a></li>
							<li><a href="https://tophata.ru/logout.php"><i class="sl sl-icon-power"></i> Выйти</a></li>
						</ul>
					</div>
	<?			
   }
?>
   
	
					<a href="..//submit-property.php" class="button border">Добавить квартиру</a>
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

				<h2>Бронирование</h2>

	
				<nav id="breadcrumbs">
					<ul>
						<li><a href="..//index.php">Главная</a></li>
						<li>Бронирование</li>
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
						
						<li><a href="my-profile.php" class="current"><i class="sl sl-icon-user"></i> Мой профиль</a></li>

					</ul>
					
					<ul class="my-account-nav">
					
						<li><a href="https://tophata.ru/my-properties.php"><i class="sl sl-icon-docs"></i> Мои квартиры</a></li>
						<li><a href="https://tophata.ru/messenger.php"><i class="sl sl-icon-bubble"></i> Сообщения</a></li>
						<li><a href="https://tophata.ru/booking.php"><i class="sl sl-icon-home"></i> Бронирование</a></li>
						<li><a href="https://tophata.ru/submit-property.php"><i class="sl sl-icon-action-redo"></i> Добавить новое объявление</a></li>
					</ul>

					<ul class="my-account-nav">
						<li><a href="https://tophata.ru/change-password.php"><i class="sl sl-icon-lock"></i> Изменить пароль</a></li>
						<li><a href="#"><i class="sl sl-icon-power"></i> Выйти</a></li>
					</ul>

				</div>

			</div>
		</div>

		<div class="col-md-8">
<?
	  $id_reserve=$_GET['id'];
	  

  $result=mysqli_query($con,"SELECT * FROM users
              WHERE  id='$id'");

              while ($row=mysqli_fetch_array($result)){
      
              $tele=$row['telephone'];

}
	  
  $result=mysqli_query($con,"SELECT * FROM reserve
              WHERE  id_reserve='$id_reserve'");

              while ($row=mysqli_fetch_array($result)){
      
              $id_city=$row['id_city'];
                      $datearrive=$row['datearrive'];
                      $dateleave=$row['dateleave'];
                           
                                  $id_room=$row['id_room'];
                                  $id_arendatel=$row['id_arendatel'];

}

$run1=mysqli_query($con,"SELECT * from geo_city where id='$id_city' ");

while ($row=mysqli_fetch_array($run1)){


$name_city=$row['name'];


}

$run=mysqli_query($con,"SELECT * from room where id_room='$id_room' ");

while ($row=mysqli_fetch_array($run)){


$rooms=$row['rooms'];


}
?>

<?
$_monthsList = array(
"1"=>"Январь","2"=>"Февраль","3"=>"Март",
"4"=>"Апрель","5"=>"Май", "6"=>"Июнь",
"7"=>"Июль","8"=>"Август","9"=>"Сентябрь",
"10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");
 
$month = $_monthsList[date("n")];
 
$year = date('y');

$day = date('d');
?>
	<form action="editword1.php" method="POST" enctype="multipart/form-data">
			<div class="row with-forms">
	

					<div class="col-md-6">
					<h5>ФИО</h5>
				
						<input type="text" data-unit="" class="input-ru" name="fio1" value="<? echo $_COOKIE['name1']; ?>" required>
						<input type="hidden" name="id_city" value="<?=$name_city ?>">
				<input type="hidden" name="datearrive" value="<?=$datearrive ?>">
						<input type="hidden" name="dateleave" value="<?=$dateleave ?>">
								<input type="hidden" name="rooms" value="<?=$rooms ?>">
				</div>
	<input type="hidden" name="id_reserve" value="<?=$id_reserve ?>">
		<input type="hidden" name="id_user" value="<?=$id ?>">
				<div class="col-md-6">
					<h5>Адрес</h5>
				
					<div class="select-input disabled-first-option">
						<input type="text"  class="input-reg"  data-unit="" name="adres1" value="<? echo $_COOKIE['adres1']; ?>" required>
					</div>
				</div>
					<div class="col-md-6">
					<h5>Серия</h5>
					<div class="select-input disabled-first-option">
						<input class="input-number" maxlength="4"  type="text"  data-unit="" name="seria1" value="<? echo $_COOKIE['seria1']; ?>"  required>
					</div>
				</div>
					<div class="col-md-6">
					<h5>Номер</h5>
		
						<input type="text"  class="input-number1" maxlength="6"  data-unit="" name="nomer1" value="<? echo $_COOKIE['nomer1']; ?>"  required>
			
				</div>
					<div class="col-md-6">
					<h5>Кем выдан</h5>
			
						<input  data-unit="" class="input-ru" name="vidan1" value="<? echo $_COOKIE['vidan1']; ?>"  required>
				
				</div>
				<div class="col-md-6">
					<h5>Дата рождения</h5>
				
						<input id="datepicker1"  data-unit="" name="birth1" value="<? echo $_COOKIE['birth1']; ?>"  required>
				</div>

					<input type="hidden"  data-unit="" name="telephone" value="<?=$tele?>" value="<? echo $_COOKIE['telephone']; ?>"  required>
	
			
					<div class="col-md-6">
					<h5>Улица</h5>
					<div class="select-input disabled-first-option">
					<input type="text" class="input-ru" data-unit="" name="ylica" value="<? echo $_COOKIE['ylica']; ?>" required>
					</div>
				</div>
					<div class="col-md-6">
					<h5>Дом</h5>
			
					<input type="text"  data-unit="" name="dom" value="<? echo $_COOKIE['dom']; ?>" required>
		
				</div>
					<div class="col-md-6">
					<h5>Квартира</h5>
					<div class="select-input disabled-first-option">
					<input type="text"  data-unit="" name="kvartira" value="<? echo $_COOKIE['kvartira']; ?>" required>
					</div>
				</div>
		
					<div class="col-md-6">
					<h5>Месячная или посуточная оплата</h5>
		
					<input type="text"  data-unit="₽" name="summa" value="<? echo $_COOKIE['summa']; ?>" required>
			
				</div>
			</div>
			<button  type="submit" id="startUpload" class="button preview margin-top-5" style="margin-bottom: 20px;">Отправить</button>
       </form>   
<script>
$(function(){
	$("#datepicker1").datepicker({
	    changeYear: true,
	       defaultDate: '01.01.1985',
 changeMonth: true, yearRange:'-100:-18' });

});
</script>       
</div>
</div>
</div>
</div>
</div>
</div>
<div class="margin-top-55"></div>

<div id="footer">

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="..//images/logoo.png" alt="">
				<br><br>
	
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Полезные ссылки</h4>
				<ul class="footer-links">
					<li><a href="..//login-register.php">Регистрация</a></li>
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

		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Tophata</div>
			</div>
		</div>

	</div>
</div>


  <script>
$(function(){
	$("#datepicker,#datepicker1").datepicker({changeYear: true,
 changeMonth: true, yearRange:'-90:+0' });

});
</script>
  

<div id="backtotop"><a href="#"></a></div>

<link rel="stylesheet" href="..//css/jquery-ui.css">

<script>
    $('body').on('input', '.input-number', function(){

	this.value = this.value.replace(/[^0-9]/g, '');

});

$('body').on('input', '.input-ru', function(){
	this.value = this.value.replace(/[^а-яё\s]/gi, '');
	
});


$('.input-reg').bind("change keyup input click", function() {
if (this.value.match(/[^[^а-яё\s\.\-Z0-9]/gi)) {
this.value = this.value.replace(/[^[^а-яё\s\.\-Z0-9]/gi, '');
}
});
</script>

<script>
    $('body').on('input', '.input-number1', function(){
	this.value = this.value.replace(/[^0-9]/g, '');
});
</script>

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
  


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

<script>


$.datepicker.regional['ru'] = {
	closeText: 'Закрыть',
	prevText: 'Предыдущий',
	nextText: 'Следующий',
	currentText: 'Сегодня',
	monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
	monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
	dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
	dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
	dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
	weekHeader: 'Не',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);
</script>

<script>

$(document).ready(function(){ 

  $("#phone").mask("8(999) 999-9999");
});
</script>



</div>



</body>
</html>