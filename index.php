<?
session_start();
require_once('connect.php');
$id_u=$_SESSION['id'];
$name=$_SESSION['name'];
$city=$_SESSION['city'];
$people=$_SESSION['people'];
$datearrive=$_SESSION['date'];
$dateleave=$_SESSION['date1'];
$rooms=$_SESSION['rooms'];


?>
<!DOCTYPE html>
<head>

<title>Топхата - аренда квартир, бесплатное размещение</title>
<meta charset="utf-8">
<meta name="yandex-verification" content="0e286a0a0c3908d4" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">



<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>


<script type="text/javascript" src="select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="select2/dist/js/i18n/ru.js"></script> 


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<meta name="keywords" content="Снять квартиру, аренда квартир, квартиры посуточно" />
<meta name="description" content="Топхата - поиск квартир для аренды по всей России"/>
<?php
  echo '<link rel="stylesheet" type="text/css" href="css/style.css?ver=' . filemtime('css/style.css') . '" />';
?>
<link rel="stylesheet" href="css/color.css">
<link rel="stylesheet" href="css/rating.css">
<?php
  echo '<link rel="stylesheet" type="text/css" href="select2/dist/css/select2.css?ver=' . filemtime('select2/dist/css/select2.css') . '" />';
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

<div class="compare-slide-menu">

	<div class="csm-trigger"></div>

	<div class="csm-content">
		<h4>Сравнение <div class="csm-mobile-trigger"></div></h4>

		<div class="csm-properties">			

<?
$run=mysqli_query($con,"Select * from compare where id_user='$id_u'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];
	$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];

}

$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$prices=$row['price'];
}

$resul1=mysqli_query($con,"SELECT name_image,MIN(id_image),id_room from images where id_room='$id_room' ");

while ($row=mysqli_fetch_array($resul1)){

$images=$row['name_image'];

		}?>

<div id="list<?=$id_room?>" class="listing-item compact">





				<a href="detail.php?id=<?=$id_room?>" class="listing-img-container">
					<div class="remove-from-compare" id="del-<?=$id_room; ?>"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
		
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title"><?=$adres?><i><?=$prices?> ₽</i></span>

					</div>
					<img class="img1" src="uploads/<?=$images?>" alt="">
				</a>
			</div>

			<script type="text/javascript">
	     $("#id_room<?=$id_room?>").click(function(event){
       event.preventDefault();
     
 
          var id_room=$("#id_room<?=$id_room?>").val();
       
       $.ajax({
          type:"post",
          url:"ajax/compare.php",
          data:{
                  
               id_room: id_room
           
          },
          success:function(data){
            
             $("#inform1").append(data); 
          }
       });
   });

	       $("body").on("click", "#list<?=$id_room?> .remove-from-compare", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-"); 
        var DbNumberID = clickedID[1]; 
        var myData = 'recordToDelete='+ DbNumberID; 

        jQuery.ajax({
            type: "POST", 
            url: "ajax/compare.php", 
       
            data:myData, 
            success:function(response){
      
               $('#list'+DbNumberID).fadeOut("slow");
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
			<div id="inform1"></div>			
		</div>
		<div class="csm-buttons">
			<a href="compare.php" class="button">Сравнить</a>			
		</div>
	</div>

</div>
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

						<li><a href="index.php">Главная</a></li>
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
    
    echo "<a href='login-register.php' class='sign-in'><i class='fa fa-user'></i>Войти/Регистрация</a>";
   }
 else { 
   ?>
  
			     <div class="user-menu" >
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name"; ?></div>
						<ul>
							<li><a href="my-profile.php?id=<? echo $id_u; ?>"><i class="sl sl-icon-user"></i> Профиль</a></li>
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

<div id="asyncImage" data-src="images/banner.jpg" class="parallax" data-background="images/banner.jpg" data-color="#36383e" data-color-opacity="0.5" data-img-width="2500" data-img-height="1600">


	<div class="container">
		<div class="row">
			<div class="col-md-12" >
				<form method="POST" id="formx"   action="testform.php">

				<div class="search-container">

				
					<h2>Найти квартиру</h2>

					
					<div class="row with-forms">

				
						<div class="col-md-2">
									<select class="select2" name="city" >
 <?  
 $run_city=mysqli_query($con,"SELECT * from geo_city where id='$city'");

while ($row=mysqli_fetch_array($run_city)){

$id_region=$row['region_id'];
$name_city=$row['name'];

}
 
 
	echo "<option value='$city'>$name_city</option>";
							$result=mysqli_query($con,"SELECT* from geo_city");


							while ($row=mysqli_fetch_array($result)){
								$name=$row['name'];
								$id=$row['id'];
								echo "<option value=''></option> 
								<option value='$id'>$name</option> ";
							} 
							
							?>
</select>
						</div>


						
						<div class="col-md-2">
								<input  id="datepicker" style="height: 57px;"  name="date" placeholder="Дата заезда" readonly="readonly" value="<?=	$datearrive;?>">
							</div>			
							
								<div class="col-md-2">
								<input  id="datepicker1" style="height:  57px;"  name="date1" placeholder="Дата выезда" readonly="readonly"      value="<?=	$dateleave;?>" >
							</div>

<script type="text/javascript">

const $pickEnd = $("#datepicker1").datepicker({
  dateFormat: 'dd.mm.yy'
});

$("#datepicker").datepicker({
  dateFormat: 'dd.mm.yy',
  minDate: new Date(),
  maxDate: '+2y',
  onSelect: function(date) {

    let parsedDate = $.datepicker.parseDate('dd.mm.yy', date);
    let selectedDate = new Date(parsedDate);
    let endDate = new Date(selectedDate.getTime() );

    $pickEnd.datepicker('option', {
      'minDate': endDate,
      'maxDate': '+2y'
    });

  }
});
</script>

			<div class="col-md-2">
								
							<? if ($rooms!='null' and $rooms!=''){?>
							<select class="chosen-select" name="rooms">
							<option value='<?=$rooms?>'><?=$rooms?></option> 
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<?} else { ?>
							<select class="chosen-select" name="rooms">
							<option value="null">Комнат</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<?}?>
						</select>
							</div>

							<div class="col-md-3">
									
							<? if ($people!='null' and $people!=''){?>
							<select class="chosen-select" name="people">
							<option value='<?=$people?>'><?=$people?></option> 
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5+</option>
							<?} else { ?>
							<select class="chosen-select" name="people">
							<option value="null">Человек</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5+</option>
							<?}?>
						</select>
						</div>
	
					
						<div class="col-md-1">
							<div class="main-search-input" >
								
								<button style="margin-left: 0px;" class="button" ><i class="fa fa-search"></i></button>
							</div>
						</div>

					</div>

<script>


$ ( ".select2" ). select2 ({ 
	placeholder: "Выберите город",
    	language: "ru"
     });
</script>

				</div>

			</div>
		</div>
	</div>

</div>
</form>
				

	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<h3 style="font-size:25px;" class="headline margin-bottom-25 margin-top-65">Недавно добавленные</h3>
		</div>
				

	<div class="col-md-12">
			<div class="carousel">
				
<?
	$result=mysqli_query($con,"SELECT * FROM room where id_city!='' ORDER BY id_room DESC ");
             



     while ($row=mysqli_fetch_array($result)){
          $id_room=$row['id_room'];
          $id_city=$row['id_city'];
          $adres=$row['adres'];
          $description=$row['descrition'];
          $id_user=$row['id_user'];
          $image=$row['name_image'];
          $cena=$row['price'];
          $cena_m=$row['price_m'];
          $floor=$row['floor'];
          $rooms=$row['rooms'];
          $ploshad=$row['ploshad'];
          $people=$row['people'];
          $rating=$row['rating'];
 
$users="select * from users where id='$id_user'";
$run=mysqli_query($con,$users);
while ($row=mysqli_fetch_array($run)) 
{
    $user_name=$row['name'];
}


$run_city=mysqli_query($con,"SELECT * from geo_city where id='$id_city'");

while ($row=mysqli_fetch_array($run_city)){


$name_city=$row['name'];

}
?>
			
					<div class="carousel-item">
					<div class="listing-item">

						<a href="detail.php?id=<? echo $id_room ?>" class="listing-img-container">

							<div class="listing-img-content">
								<span class="listing-price">₽<? echo $cena_m ?>/месяц <i>₽<? echo $cena ?> /сутки</i></span>
							
							</div>


	<span data-id="<?=$id_room?>" 	data-tip-content="Добавить в избранное"  type="submit" class="like-icon with-tip 		
<? 
				$comm="SELECT * FROM bookmarks WHERE id_user='$id_u'  AND id_room='$id_room' ";
                $comments=mysqli_query($con,$comm);
                $r=mysqli_fetch_array($comments);
                   if($r['id_room']==$id_room ){ 
                        $like='liked';
                        echo "$like";            
}  ?>"   id="id_room1<?=$id_room?>" value="<?=$id_room ?>"  >
</span>
	
	
<form >
	<button  type="submit"  class="compare-button with-tip "  	data-tip-content="Добавить к сравнению"   id="id_room<?=$id_room?>" value="<?=$id_room ?>" >
	</button>
				
<script type="text/javascript" language="javascript">
     $("#id_room1<?=$id_room?>").click(function(event){


var val = $(this).data('id');

$.post('ajax/ajax_bookmarks.php', {id_room: val}, function(data)
{
console.log(data);
});
   });
</script> 					
						
						

<script type="text/javascript">
	   $("#id_room<?=$id_room?>").click(function(event){
       event.preventDefault();
 
          var id_room=$("#id_room<?=$id_room?>").val();
       
       $.ajax({
          type:"post",
          url:"ajax/compare.php",
          data:{
                     
               id_room: id_room
           
          },
          success:function(data){   
            
             $("#inform1").append(data); 
          }
       });
   });

	    $("body").on("click", "#inform1 .remove-from-compare", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-"); 
        var DbNumberID = clickedID[1]; 
        var myData = 'recordToDelete='+ DbNumberID; 

        jQuery.ajax({
            type: "POST", 
            url: "ajax/compare.php", 
            data:myData, 
            success:function(response){
       
               $('#list'+DbNumberID).fadeOut("slow");
            $('#item_'+DbNumberID).fadeOut("slow");
            },
            error:function (xhr, ajaxOptions, thrownError){
         
                alert(thrownError);
            }
        });
    });

</script>



</form>	

		<div class="listing-carousel">
<?					
								
$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");
while ($row=mysqli_fetch_array($resul)){
$images=$row['name_image'];
?>

	<div><img  class="img" id="asyncImage" data-src="uploads/<? echo $images; ?>"  src="uploads/<? echo $images; ?>" alt="<? echo "квартира на сутки $name_city"; ?>">
	</div>
<?
}
?>
							
							</div>

						</a>
						
						<div class="listing-content">

							<div class="listing-title" style="padding-bottom: 4px;">
								<h4><a href="detail.php?id=<? echo $id_room ?>"><? echo $adres ?></a></h4>
								<a href="detail.php?id=<? echo $id_room ?>#location"listing-address popup">
									<i class="fa fa-map-marker"></i>
									<? echo $adres ?>
								</a>
							</div>
							
<? if($rating==0) { ?>

<div class="rating" >
    <div class="rating_body">
    <div class="rating_active"></div>
        <div class="rating_items"></div>
    </div>  
    <div class="rating_value" >Нет отзывов</div>  
</div>


<?} else {?>

<div class="rating" >
    <div class="rating_body">
    <div class="rating_active"></div>
        <div class="rating_items"></div>
    </div>  
    <div class="rating_value" ><?=$rating?></div>  
</div>
<?}?>
							

							<ul class="listing-features">
								<li>Площадь <span><? echo $ploshad ?> М²</span></li>
								<li>Спальных мест <span><? echo $people ?></span></li>
								<li>Комнат <span><? echo $rooms ?></span></li>
							</ul>

							<div class="listing-footer">
								<a href="agent.php?id=<?=$id_user?>"><i class="fa fa-user"></i> <? echo $user_name ?></a>
					
							</div>

						</div>

					</div>
				</div>

<?  } ?>

			

</div>

<script type="text/javascript">
const ratings = document.querySelectorAll('.rating');

ratings.forEach( rating =>{
  const ratingActive = rating.querySelectorAll('.rating_active')[0];
  const ratingValue = rating.querySelectorAll('.rating_value')[0];
  const ratingActiveWidth = ratingValue.innerHTML/0.05;
  ratingActive.setAttribute('style', `width:${ratingActiveWidth}%`);
});
</script>
</div>	</div>	</div>

<div class="margin-top-55"></div>


<div id="footer">

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6" style="max-height: 33px;">
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
			
					E-Mail:<span> <a href="#">support@tophata.ru</a> </span><br>
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

<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

</div>

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

</body>
</html>
