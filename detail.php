<?php
session_start();
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$test_city=$_SESSION['city'];
$datearrive=$_SESSION['date'];
$dateleave=$_SESSION['date1'];


?>

<?php
if(isset($_GET['id']))
{
  $id_room=$_GET['id'];
}

$users="select * from users where id='$id_user'";
$run=mysqli_query($con,$users);
while ($row=mysqli_fetch_array($run)) 
{
    $user_name=$row['name'];
    $tele=$row['telephone'];
}
?>

<? 
  $result=mysqli_query($con,"SELECT * FROM room 
              WHERE  id_room='$id_room'");

              while ($row=mysqli_fetch_array($result)){
              $id_room=$row['id_room'];
              $adres=$row['adres'];
              $description=$row['descrition'];
              $price=$row['price'];
              $price_m=$row['price_m'];
              $image=$row['name_image'];
              $cena=$row['price'];
              $people=$row['people'];
              $wifi=$row['wifi'];
              $condi=$row['condi'];
              $micro=$row['micro'];
              $wash=$row['wash'];
              $text=$row['text'];
              $floor=$row['floor'];
              $rooms=$row['rooms'];
              $ploschad=$row['ploshad'];
              $id_city=$row['id_city'];
              $dogovor=$row['dogovor'];

}

$book=mysqli_query($con,"SELECT * from reserve where id_room='$id_room'");
$book_count=mysqli_num_rows($book);
$run_city=mysqli_query($con,"SELECT * from geo_city where id='$id_city'");
while ($row=mysqli_fetch_array($run_city)){
$name_city=$row['name'];
}
?>

<!DOCTYPE html>
<head>
<title>Снять квартиру <?=$name_city ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
<script src="scripts/messages.js"></script>

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

<body onload="raschitat1();">

<div id="wrapper">


<div class="compare-slide-menu">

<? 
	$zapros="select * from compare where id_user='$id' ";
	$q=mysqli_query($con,$zapros);
	$count=mysqli_num_rows($q);
if ($count==0){
    
}
else {?>



	<?}?>
	<div id="csm1"  class="csm-trigger"></div>
	<div class="csm-content">
		<h4>Сравнение <div class="csm-mobile-trigger"></div></h4>

		<div class="csm-properties">
			

<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room1=$row['id_room'];
	$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room1'");

while ($row=mysqli_fetch_array($resul)){
	$images=$row['name_image'];
}
?>


<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room1'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres1=$row['adres'];
	$prices=$row['price'];
}
?>

<div id="list<?=$id_room1?>" class="listing-item compact">
				<a href="detail.php?id=<?=$id_room1?>" class="listing-img-container">
					<div class="remove-from-compare" id="del-<?=$id_room1; ?>"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
		
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title"><?=$adres1?><i><?=$prices?> ₽</i></span>

					</div>
					<img class="img1" src="uploads/<?=$images?>" alt="">
				</a>
			</div>

<script type="text/javascript">

	    $("body").on("click", "#list<?=$id_room1?> .remove-from-compare", function(e) {
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
<div class="clearfix"></div>

<div id="titlebar" class="property-titlebar margin-bottom-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<a href="listings.php" class="back-to-listings"></a>
				<div class="property-title">
					<h1><? echo "$name_city, $adres"; ?></h1>
					<span>
						<a href="#location" class="listing-address" style="margin-bottom: 0px;">
							<i class="fa fa-map-marker"></i>
							<? echo "$adres"; ?>
						</a>
					</span>
								
<div class="rating-counter"><a href="#">(сдавалась <? if($book_count==0){echo '0 раз';} else { echo num_word($book_count, array('раз', 'раза'));}?>)</a> 
</div>

				<div class="property-pricing">
					<div class="property-price">₽<?php echo $price_m; ?> месяц</div>
					<div class="sub-price">₽<?php echo $cena; ?> день</div>
				</div>


			</div>
		</div>
	</div>
</div>
</div>


<div class="container">
	<div class="row margin-bottom-50">
		<div class="col-md-12">
			<div class="property-slider default">
<?php



$resul=mysqli_query($con,"SELECT *from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];


?>
				<a href="uploads/<? echo "$images"; ?>" data-background-image="uploads/<? echo "$images"; ?>" class="item mfp-gallery"></a>
				<?}?>
			</div>

	
			<div class="property-slider-nav">
<?
$resul=mysqli_query($con,"SELECT *from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];
?>
		<div><img src="uploads/<? echo $images; ?>" alt="<? echo "квартира на сутки $name_city"; ?>"></div>
				
				
<?
		
}
				?>
			</div>	
		</div>
	</div>
</div>



<div class="container">
	<div class="row">

	
		<div class="col-lg-8 col-md-7 sp-content">
			<div class="property-description">

		
				<ul class="property-main-features ">
					<li>Площадь <span><? echo "$ploschad"; ?> М²</span></li>
					<li>Комнат <span><? echo $rooms; ?></span></li>
					<li>Спальных мест <span><?  echo "$people"; ?></span></li>
	
				</ul>

				<h3 class="desc-headline">Описание</h3>

					<p>
					<? echo "$text"; ?>
					</p>
					

<div class="btn-group">
<a  target="blank" type="button" class="button" target=blank href=//view.officeapps.live.com/op/view.aspx?src=https://tophata.ru/<?=$dogovor?> style=font-family:Helvetica;font-size:14px>Смотреть договор</a>
<a href="#" class="button" type="button" aria-disabled="true"  data-toggle="modal" data-target="#Modal" style="font-family: Helvetica; font-size: 14px;">Пожаловаться</a>
</div>


<form action="detail.php?id=<?=$id_room?>" method="Post" >
<div class="bd-example">

 <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
           <span aria-hidden="true">&times;</span>
         </button>
       <h4 class="modal-title custom_align" id="Heading">Пожаловаться на объявление</h4>
       </div>
       <div class="modal-body">
         <form>
           <div class="form-group">
             <label for="recipient-name" class="form-control-label">Причина</label>
             <input type="hidden" name=id_room_r value='<?=$id_room  ?>'> 
              <input type="hidden" name=id_user value='<?=$id  ?>'>  
            <input type="hidden" name=id_arendatel value='<?=$id_user  ?>'>  
             <input type="text" name="tema">
           </div>
           <div class="form-group">
             <label for="message-text" class="form-control-label" >Подробнее:</label>
             <textarea name="mess"></textarea>
           </div>
         </form>
       </div>
   
       <div class="modal-footer">
  
         <button type="submit" class="button" name="post" >Отправить</button>
       </div>

     </div>
   </div>
 </div>
</div>

  
</form>
      
<?
if(isset($_POST['post']))
{
	$tema= $_POST['tema']; 
    $mess= $_POST['mess']; 
    $id_room_r= $_POST['id_room_r']; 
    $id_user= $_POST['id_user']; 
    $id_arendatel= $_POST['id_arendatel']; 
    $currentDate = date("d-m-Y");  
	$sql = "SELECT * from room where id_room='$id_room'";         
$insert="INSERT INTO report (id_room,id_arendatel,id_user,tema,mess,data) values ('$id_room','$id_arendatel','$id_user','$tema','$mess','$currentDate')";

$result = mysqli_query($con,$insert);

}

?>

				<h3 class="desc-headline">Особенности</h3>
				<ul class="property-features checkboxes margin-top-0">
							<?

			if ($wifi!='')
			{
					echo "<li>Wi-Fi</li>";
		
			}  
			if ($condi!='')
			{
					echo "<li>Кондиционер</li>";
			}
			if ($micro!='')
			{
					echo "<li>Микроволновка</li>";
			}
			if ($wash!='')
			{
					echo "<li>Стиральная машина</li>";
			}
			?>

				</ul>

<?

$dbh = new PDO('mysql:dbname=strawman_tophata;host=localhost', 'strawman_tophata', 'Nikita007');


$sth = $dbh->prepare("SELECT * FROM room WHERE id_room = '$id_room'");
$sth->execute();
$object = $sth->fetch(PDO::FETCH_ASSOC);

?>

 <script type="text/javascript">
 ymaps.ready(init);
 function init() {
   var myMap = new ymaps.Map("map", {
     center: [<?php echo $object['point']; ?>],
     zoom: 16,
     	 behaviors: ["drag", "dblClickZoom", "rightMouseButtonMagnifier", "multiTouch"],
     	      controls: ['routeButtonControl','zoomControl']
   }, {
   
   });
myMap.behaviors.get('drag').disable();
      var control = myMap.controls.get('routeButtonControl');


    control.routePanel.geolocate('from');
    control.routePanel.state.set('to','<?php echo $name_city,', ', $object['adres']; ?>')

  
  
   var myCollection = new ymaps.GeoObjectCollection(); 
  

   var myPlacemark = new ymaps.Placemark([
     <?php echo $object['point']; ?>
   ], {
     balloonContent: '<?php echo $name_city,', ', $object['adres']; ?>'
   }, {
     preset: 'islands#icon',
     iconColor: '#274abb'
   });
   myCollection.add(myPlacemark);
  
   myMap.geoObjects.add(myCollection);
 }
 </script>



			<div class="style-1 " id="location" style="margin-top:20px;">

				<ul class="tabs-nav">
					<li class="active"><a href="#tab1">Карта</a></li>
					<li><a href="#tab2">Панорама</a></li>
		
				</ul>

		
				<div class="tabs-container">
					<div class="tab-content" id="tab1">
						<div id="map" style="max-width:770px; height:500px; margin: 0 auto; padding-bottom: 40px;"></div>
					</div>

					<div class="tab-content" id="tab2">
						<div id="map1" style="max-width:770px; height:500px; margin: 0 auto; padding-bottom: 40px;"></div></div>


			</div>

		</div>


   <script>
 ymaps.ready(function () {

 var myMap = new ymaps.Map('map1', {
      center: [<?php echo $object['point']; ?>],
      zoom: 18,
      type: 'yandex#map',
      controls: ['typeSelector']
  }),

  collection = new ymaps.GeoObjectCollection();

 myMap.geoObjects.add(collection);


 myMap.getPanoramaManager().then(function (manager) {

  manager.enableLookup();

  manager.openPlayer(myMap.getCenter());

  manager.events.add('openplayer', function () {

      var player = manager.getPlayer();
  
      player.events.add(['panoramachange', 'destroy'], function () {
          collection.removeAll();
      });

      player.events.add('markerexpand', function (e) {
  
          var position = e.get('marker').getPosition(),
              coords = position.slice(0, 2);

  
          collection.add(new ymaps.Placemark(coords, {}, {
              openBalloonOnClick: false,
              iconLayout: 'default#image',
              iconImageHref: 'circle.png',
              iconImageSize: [10, 10],
              iconImageOffset: [-5, -5]
          }));
      });

      player.events.add('markercollapse', function (e) {

          var position = e.get('marker').getPosition(),
              coords = position.slice(0, 2);

          collection.each(function (obj) {
              if (ymaps.util.math.areEqual(obj.geometry.getCoordinates(), coords)) {
                  collection.remove(obj);
              }
          });
      });
  });
 });
});

</script>  



<?  
if ($id==''){?>
<div class="notification notice large margin-bottom-35">
	<p><a href='login-register.php' style='font-weight:bold'><u>Авторизуйтесь</u> чтобы добавить отзыв</a> </p>
</div>
    <?}?>

					<h4 class="headline">Добавить отзыв</h4>
			<div class="margin-top-15"></div>

			<form method="Post" action="ajax/room_review.php" id="add-comment" class="add-comment">
				<fieldset>
	<div class="rating-area">
		<input type="radio" id="star-5" name="rating" value="5">
		<label for="star-5" title="Оценка «5»"></label>	
		<input type="radio" id="star-4" name="rating" value="4">
		<label for="star-4" title="Оценка «4»"></label>    
		<input type="radio" id="star-3" name="rating" value="3">
		<label for="star-3" title="Оценка «3»"></label>  
		<input type="radio" id="star-2" name="rating" value="2">
		<label for="star-2" title="Оценка «2»"></label>    
		<input type="radio" id="star-1" name="rating" value="1">
		<label for="star-1" title="Оценка «1»"></label>
	</div>
					<div>
						<label>Имя:</label>
						<input type="text" id="name" name="name" value="<?=$name?>"/>
					</div>


					<div>
						<label>Отзыв: <span>*</span></label>
						<textarea cols="40" id="text" rows="3" name="review_text"></textarea>
						<input type="hidden" id="id_user" name="id_user" value="<?=$id?>">
						<input type="hidden" id="id_room" name="id_room" value="<?=$id_room?>">
					</div>

				</fieldset>

				<button class="button"  type="submit"  name="send"  >Добавить отзыв</button>
				<div class="clearfix"></div>
				<div class="margin-bottom-20"></div>

			</form>

<script>
    $("#add-comment").on("submit", function(){
        event.preventDefault();
        var arendatel=$("#id_user").val();
        var name=$("#name").val();
        var name=$("#text").val();
        var id_room=$("#id_room").val();
	$.ajax({
		url: 'ajax/room_review.php',
		method: 'post',
		dataType: 'html',
		data: $(this).serialize(),
		success: function(data){
		    $('#name').val('');		          
            $('#text').val('');
            $('#star-5').prop('checked', false);
            $('#star-4').prop('checked', false);
            $('#star-3').prop('checked', false);
            $('#star-2').prop('checked', false);
            $('#star-1').prop('checked', false);
			$('#inform').append(data);
			
		}
	});
});
</script>
</script>	



<section id="comments" class="comments">
<? 
$zapros="select * from room_review where id_room='$id_room' ";
$q=mysqli_query($con,$zapros);
$count=mysqli_num_rows($q);
if ($count!=0){
        
echo "<h4 style='padding-top: 20px;' class='headline margin-bottom-35'>Отзывы: <span class='comments-amount'></span></h4>
		 <div id='msg'></div>
"; }?>
			<div id="inform"></div>	
<?php 

$zq="SELECT * from room_review 

INNER JOIN users on room_review.id_user=users.id where id_room='$id_room' 
                    order by 1 ASC";
$q=mysqli_query($con,$zq);
$count=mysqli_num_rows($q);
while ($row=mysqli_fetch_array($q)) {
     $id=$row['id_review'];
     $name=$row['name'];
     $date=$row['dates'];
     $images=$row['images'];
     $text=$row['text_review'];	
     $date=$row['data_review'];	 
	 $rating=$row['rating'];
?>
					<div class="rating-result">
						<? for ($i=0; $i<$rating; $i++) { 
							
					?>
					<span class="active"></span>	
					<?}?>
				
					</div>
						<div class="avatar"><img src="<?=$images?>" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by"><?  echo "$name"; ?><span class="date"><?=$date?></span>
								
							</div>
							<p><? echo "$text"; ?></p>
						</div>

						
					</li>
					<?

				}
				?>
				</ul>

			</section>


<div class="clearfix"></div>
			<div class="margin-top-55"></div>

				<div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
				<div class="listings-container list-layout">

				</div>
			</div>
		</div>

<div class="col-lg-4 col-md-5 sp-sidebar">
<div class="sidebar sticky right">

<div class="widget margin-bottom-30">
			
						<form id="form1" method="Post" action="ajax_boolmarks.php" >
						<input type="hidden" name="id_user" value="<? echo $id; ?>">
						<input type="hidden" name="id_room" value="<? echo $id_room; ?>">
				
<? 
				$sql"SELECT * FROM bookmarks WHERE id_user='$id'  AND id_room='$id_room' ";
                $run=mysqli_query($con,$sql);
                $r=mysqli_fetch_array($run);
                   if($r['id']!=""  ){ 
                        $like='liked';
}  ?>

					<button  class="widget-button with-tip <?=$like?>"  onClick="call()" type="submit"  data-tip-content="Добавить в избранное"><i class="fa fa-star-o"></i></button> 

					<button  type="submit"  id="id_room<?=$id_room?>" value="<?=$id_room ?>" class="widget-button with-tip compare-widget-button" data-tip-content="Добавить в сравнение"><i class="icon-compare"></i></button>
				</form>

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





<script type="text/javascript" language="javascript">
                function call() {
                  var msg   = $('#form1').serialize();
                     $.ajax({
                       type: 'POST',
                       url: 'ajax_bookmarks.php',
                       data: msg,
                       success: function(data) {
                         $('#results').html(data);
                       },
                       error:  function(xhr, str){
                   alert('Возникла ошибка: ' + xhr.responseCode);
                       }
                     });
              
                 }
             </script> 
       
				<div class="clearfix"></div>
				</div>

 
<?php

$dates=mysqli_query($con,"SELECT * from reserve 
where id_room='$id_room'");
$array = array();
while ($row=mysqli_fetch_array($dates)) 
{
	$date_start= $row['datearrive'];
	$date_end= $row['dateleave'];	
    $start = strtotime($date_start);
	$finish = strtotime($date_end);
	for($i = $start; $i <= $finish; $i += 86400) {
		$list = explode('.', date('d.m.Y', $i));
		$array[] = implode('.', $list);
	} 	
}
?>

				<div class="widget">
					<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
						<h3><i class="fa fa-calendar-check-o"></i> Забронировать</h3>
						<div class="row with-forms  margin-top-0">

			
						<form action="https://tophata.ru/book.php" method="post">
							<div class="col-lg-12">
								<input id="datepicker"   name="date" placeholder="Дата заезда" readonly="readonly"   value="">
							</div>
							<div class="col-lg-12">
								<input id="datepicker1"   name="date1" placeholder="Дата выезда" readonly="readonly"  value="" >
                                <input id="id_room1" type="hidden" name="id_room" value="<?=$id_room?>" >
                                <input id="id_arendatel" type="hidden" name="id_arendatel" value="<?=$id_user?>" >
                                <input id="id_city" type="hidden" name="id_city" value="<?=$id_city?>" >
                                  <input class="input1"  type="hidden" name="price1"  >
							</div>						
			
							<button id="book" type=submit class="button book-now fullwidth margin-top-5">Забронировать</button>
			
				    	</div>
                       </form>

						</div>
		
		<div id="inform2"></div>

		
		
<script>
     $("#book").click(function(event){
       event.preventDefault();
          var arendatel=$("#id_arendatel").val();
          var city=$("#id_city").val();
          var room=$("#id_room1").val();
          var date=$("#datepicker").val();
          var date1=$("#datepicker1").val();
       
       $.ajax({
          type:"post",
          url:"book.php",
          data:{
             
              arendatel:arendatel,
              city:city,
              room:room,
              date:date,
              date1:date1
           
          },
          success:function(data){
              
             $("#inform2").html(data); 
    
          }
       });
   });
</script>    
             								
					</div>

				<div class="widget" style="margin-top: 10px;">
				    
				<form action="javascript:void(0);" >
				    <h3 class="margin-bottom-20 margin-top-10" >Расчет стоимости</h3>          
					<input id="cena1" type="hidden" name="" value="<? echo $cena; ?>">
					<input id="cena_m" type="hidden" name="" value="<? echo $price_m; ?>">

	

						<div>
						 <input class="input-range" type="text" id="dni"  data-min="1" data-max="30" value="<? if ($days!=''){ echo $days;}?>" placeholder="Количество дней" >
					
						</div>
									
					<button class="button" name="cena" onclick="raschitat();"  style="margin-bottom: 10px;">Рассчитать стоимость</button>
			
					</form>
			
<div  style="display: none;" id="calc-output-container" class="calc-output-container"><div class="notification success">Стоимость равна: <strong id="calc" class="calc-output"> </strong></div></div>
				</div>

				<div class="widget">

	
					<div class="agent-widget">
						<div class="agent-title">
							<div class="agent-photo"><img src="images/avatar.jpg" alt="" /></div>
							<div class="agent-details">
						
								<h4><a href="agent.php?id=<? echo $id_user;  ?>"><?  echo "$user_name"; ?></a></h4>

<span><i class="sl sl-icon-call-in"></i></span><span id="num_hide"><?=$tele?></span> <span  id="sh_nmr"> Показать телефон</span>


				
							</div>
							<div class="clearfix"></div>
						</div>


     <form action=https://tophata.ru/setting/action_message.php method=post>
		
						<textarea  id=messs name=mess></textarea>
						
						<ul class="social-icons margin-top-10">
			
				</ul>
		
				   <input type=hidden name=poluchatel id=poluchatel value="<?=$id_user ?>">
						<button type="submit" id="submit_messs" class="button fullwidth margin-top-5">Отправить сообщение</button>
						</form>
					</div>
					 <div class="inform_mess"></div>
				

				</div>


			<div class="widget">
					<h3 class="margin-bottom-20">Похожие объявления</h3>

					<div class="listing-carousel outer">
		

<?
$result=mysqli_query($con,"SELECT * FROM room 
              WHERE  id_city='  $id_city' AND people>='$test_people'  AND  id_city!='' AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  reserve.id_city=room.id_city AND reserve.id_city=room.id_city AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive') ");

 while ($row=mysqli_fetch_array($result)){
     $id_room=$row['id_room'];
     $adres=$row['adres'];
     $description=$row['descrition'];
     $price=$row['price'];
     $image=$row['name_image'];
     $cena=$row['price'];
     $cena_m=$row['price_m'];
     $floor=$row['floor'];
     $ploshad=$row['ploshad'];
     $rooms=$row['rooms'];
     $people=$row['people'];
?>

						<div class="item">
							<div class="listing-item compact">

								<a href="detail.php?id=<? echo $id_room; ?>" class="listing-img-container">

									

									<div class="listing-img-content">
										<span class="listing-compact-title"><? echo "$adres";  ?> <i>₽ <?=$cena_m ?></i></span>

										<ul class="listing-hidden-content">
											<li>Площадь <span><?=$ploshad ?>М²</span></li>
											<li>Комнат <span><?=$rooms ?></span></li>
											<li>Спальных мест<span><?=$people ?></span></li>
										
										</ul>
									</div>
<?
$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];
}

?>

								<img class="img" src="uploads/<? echo $images; ?>" alt=""  >
								</a>

							</div>
						</div>

		
	<? } 
?>
					
			
					</div>

				</div>

</div>

<script>
			
function raschitat() {
dni  = document.getElementById('dni').value;

if ( dni==30 ){
         
cena_m  = document.getElementById('cena_m').value;
stoimost = Number(cena_m)+" р.";
dni  = document.getElementById('dni').value;
document.getElementById('calc').innerHTML=stoimost;
document.getElementById("calc-output-container").style.display = "block";
      
  }
      
else

{dni  = document.getElementById('dni').value;
cena1  = document.getElementById('cena1').value;
stoimost = Number(cena1)*dni+" р.";
document.getElementById('calc').innerHTML=stoimost;
document.getElementById("calc-output-container").style.display = "block";
}
}

function raschitat1() {

{dni  = document.getElementById('dni').value;
cena1  = document.getElementById('cena1').value;
stoimost = Number(cena1+(cena1*0.1)*<?=$peoples?>)*dni+" р.";
dni  = document.getElementById('dni').value;
document.getElementById('calc').innerHTML=stoimost;


document.getElementById("calc-output-container").style.display = "block";
}
}
</script>

<script>
jQuery(document).ready(function($){
$.fn.textToggle = function(cls, str) {
return this.each(function(i) {
$(this).click(function() {
var c = 0, el = $(cls).eq(i), arr = [str,el.text()];
return function() {
el.text(arr[c++ % arr.length]);
}}());
})};
$(function(){
$('#sh_nmr').textToggle("#sh_nmr","").click();
$('#sh_nmr').textToggle("#num_hide","").click();
});
});
</script>


			</div>
		</div>


</div>
</div>
</div>





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
				
					E-Mail:<span> <a href="#">support@tophata.ru</a> </span><br>
				</div>

			<ul class="social-icons margin-top-20" style="margin-left: 12px;">

				    <li><a target="blank"  class="fa fa-vk" href="https://vk.com/public205211481"> </a></li>
                	<li><a target="blank" class="fa fa-facebook" href="https://www.facebook.com/groups/3745188922183769"></a></li>
					<li><a class="fa fa-instagram" href="https://www.instagram.com" target="_blank"></a></li>
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



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>

 <script type="text/javascript" src="scripts/chosen.min.js"></script> 
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>

<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/markerclusterer.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script src="scripts/moment.min.js"></script>
<script src="scripts/daterangepicker.js"></script> 

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
$(function(){

	$("#datepicker").datepicker({

		minDate: 0

	});

});
</script>



 
<script>
$(function(){
	$("#datepicker1").datepicker();

});
</script>



<script>
var array ='<?=json_encode($array) ?>';


function showDays() {
  var start = $('#datepicker').datepicker('getDate');
  var end = $('#datepicker1').datepicker('getDate');
  if (!start || !end) return;
  var days = (end - start) / 1000 / 60 / 60 / 24;
if ( $('#dni').val(days)==0){
$('#dni').val(1);
dni  = document.getElementById('dni').value;
cena1  = document.getElementById('cena1').value;
stoimost = Number(cena1)*dni+" р.";
dni  = document.getElementById('dni').value;
document.getElementById('calc').innerHTML=stoimost;


document.getElementById("calc-output-container").style.display = "block";
      
  }
if ( dni==30){
         
dni  = document.getElementById('dni').value;
cena_m  = document.getElementById('cena1').value;
stoimost = Number(cena_m)+" р.";
dni  = document.getElementById('dni').value;
document.getElementById('calc').innerHTML=stoimost;


document.getElementById("calc-output-container").style.display = "block";
      
  }
          
else{

stoimost = Number(cena_m)+" р.";
document.getElementById('calc').innerHTML=stoimost;

$(".input1").val(stoimost);
document.getElementById("calc-output-container").style.display = "block";
}

  
}

$("#datepicker").datepicker({
  dateFormat: 'dd.mm.yy',
  onSelect: showDays,
       minDate: new Date(),
  onClose: function(selectedDate) {
    var dParts = selectedDate.split('.');
    var in30Days = new Date(dParts[2] + '/' +
      dParts[1] + '/' +
      (+dParts[0] + 30)
    );

    $("#datepicker").datepicker("option", "minDate", in30Days);
  },
     beforeShowDay: function(date){
        
        var string = jQuery.datepicker.formatDate('dd.mm.yy', date);
    
        return [ array.indexOf(string) == -1 ]
    },
    
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
const $pickEnd =$("#datepicker1").datepicker({
  dateFormat: 'dd.mm.yy',
  onSelect: showDays,
       minDate: 0,
     beforeShowDay: function(date){
        
        var string = jQuery.datepicker.formatDate('dd.mm.yy', date);
    
        return [ array.indexOf(string) == -1 ]
    }
});


</script>	

</div>

</body>
</html>