<?php
session_start();
$name=$_SESSION['name'];
$id=$_SESSION['id'];
$city=$_SESSION['city'];
$people=$_SESSION['people'];
$datearrive=$_SESSION['date'];
$dateleave=$_SESSION['date1'];
$price1=$_SESSION['price1'];
$price2=$_SESSION['price2'];
$rooms=$_SESSION['rooms'];
$wifi=$_SESSION['wifi'];
$condi=$_SESSION['condi'];
$micro=$_SESSION['micro'];
$wash=$_SESSION['wash'];
$sort=$_SESSION['sort'];
require_once('connect.php');
?>

<!DOCTYPE html>
<head>

<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="cache-control" content="no-cache">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
<link rel="stylesheet" href="css/rating.css">
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>


<?php
  echo '<link rel="stylesheet" type="text/css" href="select2/dist/css/select2.css?ver=' . filemtime('select2/dist/css/select2.css') . '" />';
?>

<script type="text/javascript" src="select2/dist/js/select2.js"></script>
<script type="text/javascript" src="select2/dist/js/i18n/ru.js"></script>
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">
<script src="https://api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&amp;scrollZoom=false" type="text/javascript" ></script>

</head>

<body>


<div id="wrapper">

<div class="compare-slide-menu">

	<div class="csm-trigger"></div>

	<div class="csm-content">
		<h4>Сравнение <div class="csm-mobile-trigger"></div></h4>

		<div class="csm-properties">
			


<?
$run=mysqli_query($con,"Select * from compare where id_user='$id'") ;
while ($row=mysqli_fetch_array($run))
{
	$id_room=$row['id_room'];
	$resul=mysqli_query($con,"SELECT name_image,MIN(id_image),id_room from images where id_room='$id_room' ");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];

}

?>

<?
$run1=mysqli_query($con,"Select * from room where id_room='$id_room'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$prices=$row['price'];
}
?>


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
    
    echo "<a href='login-register.php' class='sign-in'><i class='fa fa-user'></i>Войти/Регистрация</a>";
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

<div id="map" style="max-width:1920px; height:450px; margin: 0 auto; padding-bottom: 40px;"></div>

<?
$dbh = new PDO('mysql:dbname=strawman_tophata;host=localhost', 'strawman_tophata', 'Y31619');
$sth = $dbh->prepare("SELECT room.id_room,room.adres,id_city,room.price,point,images.id_room,images.name_image FROM room 
	inner join images on room.id_room=images.id_room
              WHERE  id_city='$city'  AND price BETWEEN '$price1' AND '$price2' AND  (condi='$condi')    AND (rooms='$rooms' OR 'null'='$rooms') ");

$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<script type="text/javascript">
ymaps.ready(init);
function init() {
	var myMap = new ymaps.Map("map", {
		center: [<?php echo $list[0]['point']; ?>],

		zoom: 16,
		 behaviors: ["drag", "dblClickZoom", "rightMouseButtonMagnifier", "multiTouch"]        
	}, 
	{
		searchControlProvider: 'yandex#search'

	});
 

myMap.behaviors.get('drag').disable();

	var myCollection = new ymaps.GeoObjectCollection(); 
 
	<?php foreach ($list as $row): ?>
	var myPlacemark = new ymaps.Placemark([
		<?php echo $row['point']; ?>
	], {
		   balloonContentHeader: '<?php echo $row['adres']; ?>',
		
		balloonContentBody: '<div><img src="uploads/<? echo $row['name_image'];  ?>" alt=""  style="width:130px;height:60px;"></div> <br/> ' +'<a href="detail.php?id=<? echo $row['id_room']; ?>">Подробнее</a><br/>' 
     
	}, {

		preset: 'islands#glyphIcon', 
		iconColor: '#274abb'
	});

	myCollection.add(myPlacemark);
	<?php endforeach; ?>
 
	myMap.geoObjects.add(myCollection);
	

	myMap.setBounds(myCollection.getBounds(),{checkZoomRange:true, zoomMargin:9});

}
</script>
<?

$run_city=mysqli_query($con,"SELECT * from geo_city where id='$city'");

while ($row=mysqli_fetch_array($run_city)){

$id_region=$row['region_id'];
$name_city=$row['name'];


}
$run_reg=mysqli_query($con,"SELECT * from geo_regions where id='$id_region'");

while ($row=mysqli_fetch_array($run_reg)){

$region_name=$row['name'];


}

?>

<div class="container">
	<div class="row sticky-wrapper">

		<div class="col-md-8">


			<div class="row margin-bottom-15">

					<div class="col-md-6">
				
					<div class="sort-by">
						<label>Сортировать по:</label>
<form action="testform.php" method="post">
						<div class="sort-by-select">
							<select data-placeholder="умолчанию" class="chosen-select-no-single"   name="sort" id="sort">

				<? echo "	<option value='$sort'>$sort</option>	";?>
						<?	if ($sort=='умолчанию'){ } else { echo 	"   <option value='умолчанию'>умолчанию</option>	"; } ?>
								
							<?	if ($sort=='возрастанию цены'){} else {  echo 	"<option value='возрастанию цены'>возрастанию цены</option>"; } ?>
							
							<?	if ($sort=='убыванию цены'){} else {  echo 	"<option value='убыванию цены'>убыванию цены</option>"; } ?>
							
						    <?	if ($sort=='рейтингу'){} else {  echo 	"<option value='рейтингу'>рейтингу</option>"; } ?>
				
				<input type="hidden" name="people" value="<?=$people?>" >
					<input type="hidden" name="city" value="<?=$city?>" >
						<input type="hidden" name="rooms" value="<?=$rooms?>" >
							</select>
							
					
						
						</div>
					</div>
				</div>

			
		
</form>
 <script type="text/javascript">

  jQuery(function() {
    jQuery('#sort').change(function() {
        this.form.submit();
    });
});
</script>

</div>

<div class="listings-container list-layout ">
		

<?php
if(isset($_POST['submit'])) {
    $name=$_POST['name'];  
    $city=$_SESSION['city'];
    $people=$_POST['people'];
    $cena=$_POST['price'];
    $price1=$_POST['price1'];
	$price2=$_POST['price2'];
	$people=$_POST['people'];


}

?>
  
<?php

$room_on_page="4";

$count= mysqli_query($con,"Select COUNT(*) FROM room 
              WHERE  id_city='$city' AND id_city!='0'   AND  price BETWEEN '$price1' AND '$price2' AND people>='$people'  AND (rooms='$rooms' OR 'null'='$rooms')    AND
              (condi='$condi')    AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  
              reserve.id_city=room.id_city AND reserve.id_city=room.id_city 
              AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive') ");

$row = mysqli_fetch_row($count);
$totall = $row[0];
$total = ceil($totall / $room_on_page);

if(empty($_GET["page"])){$_GET["page"]="1";}
$p=$_GET["page"];

$p=mysqli_real_escape_string($con,$p);
if(!ctype_digit($p) or $p>$total):
	$p="1";
endif;

$first=$p*$room_on_page-$room_on_page;

if ($sort==''){

$result=mysqli_query($con,"SELECT room.id_room,room.adres,id_city,room.price,room.price_m,id_user,ploshad,rooms,people,rating FROM room 
              WHERE  id_city='$city' AND id_city!='0'   AND  price BETWEEN '$price1' AND '$price2' AND people>='$people'  AND (rooms='$rooms' OR 'null'='$rooms')    AND
              (condi='$condi')    AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  
              reserve.id_city=room.id_city AND reserve.id_city=room.id_city 
              AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive')  LIMIT $first, $room_on_page"); 
}


if ($sort=='умолчанию'){


$result=mysqli_query($con,"SELECT room.id_room,room.adres,id_city,room.price,room.price_m,id_user,ploshad,rooms,people,rating FROM room 
              WHERE  id_city='$city' AND id_city!='0'   AND  price BETWEEN '$price1' AND '$price2' AND people>='$people'  AND (rooms='$rooms' OR 'null'='$rooms')    AND
              (condi='$condi')    AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  
              reserve.id_city=room.id_city AND reserve.id_city=room.id_city 
              AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive')  LIMIT $first, $room_on_page"); 
}


if ($sort=='возрастанию цены'){

$result=mysqli_query($con,"SELECT room.id_room,room.adres,id_city,room.price,room.price_m,id_user,ploshad,rooms,people,rating FROM room 
              WHERE  id_city='$city' AND id_city!='0'   AND  price BETWEEN '$price1' AND '$price2' AND people>='$people'  AND (rooms='$rooms' OR 'null'='$rooms')    AND
              (condi='$condi')    AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  
              reserve.id_city=room.id_city AND reserve.id_city=room.id_city 
              AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive')  ORDER BY room.price_m ASC  LIMIT $first, $room_on_page"); 
}

if ($sort=='рейтингу'){

$result=mysqli_query($con,"SELECT room.id_room,room.adres,id_city,room.price,room.price_m,id_user,ploshad,rooms,people,rating FROM room 
              WHERE  id_city='$city' AND id_city!='0'   AND  price BETWEEN '$price1' AND '$price2' AND people>='$people'  AND (rooms='$rooms' OR 'null'='$rooms')    AND
              (condi='$condi')    AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  
              reserve.id_city=room.id_city AND reserve.id_city=room.id_city 
              AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive')  ORDER BY rating DESC  LIMIT $first, $room_on_page"); 
}


if ($sort=='убыванию цены'){


$result=mysqli_query($con,"SELECT room.id_room,room.adres,id_city,room.price,room.price_m,id_user,ploshad,rooms,people,rating FROM room 
              WHERE  id_city='$city' AND id_city!='0'   AND  price BETWEEN '$price1' AND '$price2' AND people>='$people'  AND (rooms='$rooms' OR 'null'='$rooms')    AND
              (condi='$condi')    AND
              NOT EXISTS (SELECT 1 FROM reserve WHERE  
              reserve.id_city=room.id_city AND reserve.id_city=room.id_city 
              AND reserve.id_room=room.id_room AND reserve.datearrive <= '$dateleave' AND reserve.dateleave >= '$datearrive')  ORDER BY room.price_m DESC  LIMIT $first, $room_on_page");
}



 if (mysqli_num_rows($result)==0){
	?>
<section id="properties-not-found" class="margin-bottom-50" >
	<h2>Ничего не найдено</h2>
	<p>Попробуйте изменить настройки поиска</p>
</section>	

<? }

     while ($row=mysqli_fetch_array($result)){
          $id_room=$row['id_room'];
          $adres=$row['adres'];
          $description=$row['descrition'];
          $id_user=$row['id_user'];
          $image=$row['name_image'];
          $cena=$row['price'];
          $cena_m=$row['price_m'];
          $floor=$row['floor'];
          $ploshad=$row['ploshad'];
          $rooms=$row['rooms'];
          $people=$row['people'];
          $rating=$row['rating'];
?>

<? 
$users="select * from users where id='$id_user'";
$run=mysqli_query($con,$users);
while ($row=mysqli_fetch_array($run)) 
{
    $user_name=$row['name'];
   
 
}

?>


<div class="listing-item">

	<a href="detail.php?id=<? echo $id_room; ?>" class="listing-img-container">

		<div class="listing-img-content">
			<span class="listing-price"> ₽<? echo "$cena_m"; ?>/месяц <i class="price_per_scale"> ₽<? echo "$cena"; ?> / сутки </i></span>		
							
	<span data-id="<?=$id_room?>" 	data-tip-content="Добавить в избранное"  type="submit" class="like-icon with-tip 		
<? 
					$comm="SELECT * FROM bookmarks WHERE id_user='$id'  AND id_room='$id_room' ";
                   $comments=mysqli_query($con,$comm);
                  $w=mysqli_fetch_array($comments);
                   if($w['id_room']==$id_room ){ 
                        $like='liked';
                        echo "$like";
                   
}  ?>"   id="id_room1<?=$id_room?>" value="<?=$id_room ?>"  >
</span>
	
	
<form>
		<button  type="submit"  class="compare-button with-tip "  	data-tip-content="Добавить к сравнению"   id="id_room<?=$id_room?>" value="<?=$id_room ?>" >
		</button>						
</div>
	
<script type="text/javascript" language="javascript">
     $("#id_room1<?=$id_room?>").click(function(event){


var val = $(this).data('id');

$.post('ajax_boolmarks.php', {id_room: val}, function(data)
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
			<div><img class="img" src="uploads/<? echo $images; ?>"  style="height:200px;" alt=""></div>

			<?

}

			?>
	
		</div>
	</a>
	
	<div class="listing-content">

		<div class="listing-title" style="padding-bottom: 0px;">
			<h4><a href="detail.php?id=<? echo $id_room; ?>"><? echo "$adres"; ?></a></h4>
			<a class="listing-address" href="detail.php?id=<? echo $id_room; ?>#location"><i class="fa fa-map-marker"></i><? echo "$name_city"; ?>, <? echo "$region_name"; ?></a>			
			<a href="detail.php?id=<? echo $id_room; ?>" class="details button border">Подробнее</a>
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

		<ul class="listing-details">
		<li class="main-detail-_area"><span><?=$ploshad ?></span> М² </li><li class="main-detail-_rooms">Комнат <span><?=$rooms ?></span></li><li class="main-detail-_bedrooms"><span>Спальных мест</span> <? echo "$people"; ?></ul>		
		<div class="listing-footer">
	       <a class="author-link" href="agent.php?id=<?=$id_user?>"><i class="fa fa-user"></i> <? echo "$user_name"; ?></a>
</div>
		
	</div>


</div>
				
<?
}


?>	

<script type="text/javascript">
const ratings = document.querySelectorAll('.rating');

ratings.forEach( rating =>{
  const ratingActive = rating.querySelectorAll('.rating_active')[0];
  const ratingValue = rating.querySelectorAll('.rating_value')[0];
  const ratingActiveWidth = ratingValue.innerHTML/0.05;
  ratingActive.setAttribute('style', `width:${ratingActiveWidth}%`);
});
</script>

</div>


<?
if($total>1):
	print "<div class='pagination-container margin-top-20'>
				<nav class='pagination'>		
					<ul>						
";
			
	if(($p-1)>0):
	  $poneleft="<li><a class='' href='listings.php?page=".($p-1)."'>".($p-1)."</a> </li> ";
	  $ptemp=($p-1);
	else:
	  $poneleft=null;
	  $ptemp=null;
	endif;
		
		if($p==0):
		$inviz1=1;	 
	    $inviz=="<li><a class='' href='listings.php?page=".($p+1)."'>".($p+1)."</a> </li> ";
	else:
		$inviz1=1;
	endif;	

	if(($p+1)<=$total):
	  $poneright=" <li> <a class='' href='listings.php?page=".($p+1)."'>".($p+1)."</a></li>";
	  $ptemp2=($p+1);
	else:
	  $poneright=null;
	  $ptemp2=null;
	endif;		
			
	if($p!=1 && $ptemp!=1 && $ptemp!=2):
	  $prevp="<li><a href='listings.php?page='title='В начало'><<</a> </li>";
	else:
	  $prevp=null;
	endif;   

	if($p!=$total && $ptemp2!=($total-1) && $ptemp2!=$total):
	  $nextp=" ...  <li><a href='listings.php?page=".$total."'".$total."' class='first_page_link'>$total</a></li>";
	else:
	  $nextp=null;
	endif;

	print "<li>".$prevp.' '.$ptwoleft.' '.$poneleft.'<span>'.$p.'</span></li>'.$poneright.' '.$ptworight.' '.$nextp.''.$inviz; 
	print "		</ul>
				</nav>
				<nav class='pagination-next-prev'>
					<ul>
						<li><a  href='listings.php?page=".($p-1)."' class='prev'>  Назад</a> </li>
						<li><a  href='listings.php?page=".($p+1)."' class='next'>Вперед</a> </li>
					</ul>
				</nav>
				</div>";

endif;
echo "$inviz";
?>

			</div>

 <form method='post' action="testform.php">	



<div class="col-md-4" style=" margin-right: 0px;">
			<div class="sidebar sticky right">

		
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-35">Поиск квартиры</h3>

					
					<div class="row with-forms">
				
						<div class="col-md-12"  style="margin-bottom:20px;">
													<select class="select2" name="city" >
 <?  
			echo "	<option value='$city'>$name_city</option> ";
							$result=mysqli_query($con,"SELECT* from geo_city");


							while ($row=mysqli_fetch_array($result)){
								$name=$row['name'];
								$id=$row['id'];
								echo "<option value='$id'>$name</option> ";
							} 
							
							?>
</select>
						</div>
					</div>

<script>


$ ( ".select2" ). select2 ({ 
    
    	language: "ru"
     });
</script>		
					<div class="row with-forms">



							<div class="col-md-12">
							    	<label>Количество комнат</label>
							  
<?
	$rooms=$_SESSION['rooms'];
if ($rooms=='null'){
	echo "				<select data-placeholder='Количество комнат' class='chosen-select-no-single' name='rooms'>
								<option value='null'>любое</option>	
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>";
}	

else{
    ?>
		<select data-placeholder='Количество комнат' class='chosen-select-no-single' name='rooms'>
		    			                   
							<? echo "	<option value='$rooms'>$rooms</option>	";?>								
							<?	if ($rooms==1){} else {  echo 	"<option>1</option>"; } ?>
							<?	if ($rooms==2){} else {  echo 	"<option>2</option>"; } ?>
							<?	if ($rooms==3){} else {  echo 	"<option>3</option>"; } ?>
					<?	if ($rooms==4){} else {  echo 	"<option>4</option>"; } ?>
						<?	if ($rooms==5){} else {  echo 	"<option>5</option>"; } ?>
							<?	if ($rooms!='null'){ echo 	"   <option value='null'>любое</option>	"; } else { } ?>
							</select>
							<?
							
}
	?>						
							
						</div>

			<div class="col-md-12">			
	<label>Количество человек</label>
			<?
				$people=$_SESSION['people'];
if ($people=='null'){
	echo "				<select class='chosen-select-no-single' name='people'>
								<option value='null'>любое</option>	
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
					
						</select>";
}	

else
{ 
?>
			<select data-placeholder='Количество человек' class='chosen-select-no-single' name='people'>
							<? echo "	<option value='$people'>$people</option>	";?>								
							<?	if ($people==1){} else {  echo 	"<option>1</option>"; } ?>							
							<?	if ($people==2){} else {  echo 	"<option>2</option>"; } ?>
							<?	if ($people==3){} else {  echo 	"<option>3</option>"; } ?>
					<?	if ($people==4){} else {  echo 	"<option>4</option>"; } ?>
						<?	if ($people==5){} else {  echo 	"<option>5</option>"; } ?>
							<?	if ($people!='null'){ echo 	"   <option value='null'>любое</option>	"; } else { } ?>
							</select>
							
							<?
}
	?>						
							
						</div>
					</div>
<label >Цена за сутки</label>	
	<div class="range-slider">
	<div class="row with-forms">		
 	<input  type="hidden" name="name" value="<? echo $name ?>">
 	<input  type="hidden" name="sort" value="<? echo $sort ?>">

 <div class="col-md-6">
 <label for='price'>
 <input type="text" name="price1" id="price1"  placeholder="от" >
 </label>
</div>

<div class="col-md-6">
 <label for='price2'>

 <input type="text" name="price2" id="price2"  placeholder="до" >
 </label>
</div>

</div>
 <div id="slider_price"></div>
	<div class="clearfix"></div>
</div>

					<br>
					
		
					<a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30" data-open-title="Удобства" data-close-title="Удобства"></a>

					<div class="more-search-options relative">

			
						<div class="checkboxes one-in-row margin-bottom-10">
					
							<input id="check-2" type="checkbox" name="condi">
							<label for="check-2">Кондиционер</label>

							<input id="check-3" type="checkbox" name="wifi">
							<label for="check-3">Wi-fi</label>

							<input id="check-4" type="checkbox" name="micro" >
							<label for="check-4">Микроволнока</label>

							<input id="check-5" type="checkbox" name="wash">
							<label for="check-5">Стиральная машина</label>	
					
						</div>
		

					</div>
	
					<button type="submit" name="submit" class="button fullwidth margin-top-30">Поиск</button>

 </form>
				</div>
	

			</div>

		</div>

	</div>


<script>
 $(function() {
  $( "#slider_price" ).slider({
 range: true,
 min: <?=$price1?>,
 max: <?=$price2?>,
 values: [0, 5000 ],
 slide: function( event, ui ) {

 $( "#price1" ).val(ui.values[ 0 ]);

 $("#price2").val(ui.values[1]);
   $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] ); }
  });

  $( "#price1" ).val($( "#slider_price" ).slider( "values", 0 ));
  $("#price2").val($("#slider_price").slider( "values", 1 ));
    $( "#amount" ).val( "$" + $( "#slider_price" ).slider( "values", 0 ) +
      " - $" + $( "#slider_price" ).slider( "values", 1 ) );
 });
</script> 

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
					<li><a href="login-register.php">Войти/регистрация</a></li>
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
<? if($wifi!=""){
	echo "<script>
            $('#check-3').attr('checked',true)
                       
</script>
";
}
?>
<? if($condi!=""){
	echo "<script>
            $('#check-2').attr('checked',true)
                       
</script>
";
}
?>
<? if($wash!=""){
	echo "<script>
            $('#check-4').attr('checked',true)
                       
</script>
";
}
?>
<? if($micro!=""){
	echo "<script>
            $('#check-5').attr('checked',true)
                       
</script>
";
}
?>

<div id="backtotop"><a href="#"></a></div>

<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

</div>

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
</body>
</html>