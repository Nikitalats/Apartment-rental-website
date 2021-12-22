<?php
session_start();
require_once('connect.php');
$id=$_SESSION['id'];
?>
<?php
if(isset($_GET['id']))
{
$id_arendatel=$_GET['id'];
$query="SELECT * from users where id='$id_arendatel'";
$run= mysqli_query($con,$query);
while ( $row1=mysqli_fetch_array($run)){
	$name=$row1['name'];
    $telephone=$row1['telephone'];
    $email=$row1['email'];
}
?>

<!DOCTYPE html>
<head>

<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<div class="compare-slide-menu">

	<div class="csm-trigger"></div>

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
$run1=mysqli_query($con,"Select * from room where id_room='$id_room1'") ;
while ($row=mysqli_fetch_array($run1))
{
	$adres=$row['adres'];
	$prices=$row['price'];
}
?>

<div id="list<?=$id_room1?>" class="listing-item compact">
				<a href="detail.php?id=<?=$id_room1?>" class="listing-img-container">
					<div class="remove-from-compare" id="del-<?=$id_room1; ?>"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title"><?=$adres?><i><?=$prices?> ₽</i></span>
					</div>
					<img class="img1" src="uploads/<?=$images?>" alt="">
				</a>
			</div>
			<script type="text/javascript">
	     $("#id_room<?=$id_room1?>").click(function(event){
       event.preventDefault();
       var id_room=$("#id_room<?=$id_room1?>").val();
       
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
    
    echo "<a href='login-register.php' class='sign-in'><i class='fa fa-user'></i>Войти/Регистрация</a>";
   }
 else { 
   ?>
 
  
      		<div class="user-menu">
						<div class="user-name"><span><img src="images/avatar.jpg" alt=""></span><?echo "$name_user"; ?></div>
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

				<h2><? echo "$name";  ?></h2>
				
			
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Главная</a></li>
					
						<li><? echo "$name";  ?></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div  class="agent agent-page agency">

				<div  class='img'  class="agent-avatar">
					<img  class='img' src="images/avatar.jpg" alt="">
				</div>

				<div class="agent-content">
					<div class="agent-name">
						<h4><? echo "$name";  ?></h4>	
					</div>

					<ul class="agent-contact-details">
						<li><i class="sl sl-icon-call-in"></i><?=$telephone ?></li>
						<li><i class="fa fa-envelope-o "></i><a href="#"><?=$email ?></a></li>
					</ul>


					<div class="clearfix"></div>
				</div>

			</div>

		</div>
	</div>
</div>


<div class="container">

	<div class="row sticky-wrapper">

		<div class="col-lg-8 col-md-8">

			<div class="style-1 agency-tabs">


<div class="listings-container list-layout">

				
<?
$result=mysqli_query($con,"SELECT * FROM room 
              WHERE  id_user='$id_arendatel' ");

 while ($row=mysqli_fetch_array($result)){
          $id_room=$row['id_room'];
          $adres=$row['adres'];
          $description=$row['descrition'];
          $price=$row['price'];
          $image=$row['name_image'];
          $cena=$row['price'];
          $city=$row['id_city'];
 		  $price_m=$row['price_m'];
          $floor=$row['floor'];
          $ploshad=$row['ploshad'];
          $rooms=$row['rooms'];
          $people=$row['people'];

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

							<div class="listing-item">

								<a href="detail.php?id=<?=$id_room?>" class="listing-img-container">

								
									<div class="listing-img-content">
								
										<span class="listing-price"><?=$price_m?> <i>Месяц</i></span>
										
									</div>
<?
			$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];
}

?>

									<img src="uploads/<?php echo $images ?>" alt="">

								</a>
								
								<div class="listing-content">

									<div class="listing-title">
										<h4><a href="detail.php?id=<?=$id_room?>"><? echo($adres) ?></a></h4>
										<a href="" class="listing-address popup-gmaps">
											<i class="fa fa-map-marker"></i>
											<? echo "$name_city"; ?>, <? echo "$region_name"; ?>
										</a>

										<a href="detail.php?id=<?=$id_room?>" class="details button border">Подробнее</a>
									</div>

									<ul class="listing-details">
										<li><? echo $ploshad;  ?> м²</li>
										<li>Спальных мест <? echo $people;  ?> </li>
										<li>Комнат <? echo $rooms;  ?> </li>
									</ul>			
								</div>
							</div>
	<? } 
	?>
		
						</div>


				



<?  
if ($id==''){?>
<div class="notification notice large margin-bottom-35">
  

	    <p><a href='login-register.php' style='font-weight:bold'>Зарегистрируйтесь чтобы добавлять отзывы</a> </p>
	</div>
    <?}?>


<section class="comments">
			<h4 style="padding-top: 10px;" class="headline margin-bottom-35">Отзывы</h4>

				<ul>
					  <?php 

                    $zq="SELECT * from user_review  where id_arendatel='$id_arendatel'  order by 1 ASC";
                    $q=mysqli_query($con,$zq);

                    while ($row=mysqli_fetch_array($q)) {
                      $id=$row['review_id'];
                      $name=$row['name'];
                      $date=$row['dates'];
                      $images1=$row['images'];
                      $text=$row['review_text'];	
  					  $rating=$row['rating'];

?>



				<li>
					<div class="rating-result">
						<? for ($i=0; $i<$rating; $i++) { 
							
					?>
					<span class="active"></span>	
					<?}?>
				
					</div>
						<div class="avatar"><img src="images/avatar.jpg" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by"><?  echo "$name"; ?><span class="date"></span>
								
							</div>
							<p><? echo "$text"; ?></p>
						</div>

						
					</li>
			
					<?
				}
				?>

						<div id="inform"></div>	
				 </ul>

			</section>

<div class="clearfix"></div>
			<div class="margin-top-55"></div>

			<h4 class="headline">Добавить отзыв</h4>
			<div class="margin-top-15"></div>

			<form method="Post" action="agent_msg.php" id="add-comment" class="add-comment">
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
						<input type="text" id="name" name="name" value=""/>
					</div>


					<div>
						<label>Отзыв: <span>*</span></label>
						<textarea cols="40" id="text" rows="3" name="review_text"></textarea>
						<input type="hidden" id="arendatel" name="arendatel" value="<?=$id_arendatel?>">
					</div>

				</fieldset>

				<input type="Submit" id="send" name="send"   value="Добавить отзыв" />
				<div class="clearfix"></div>
				<div class="margin-bottom-20"></div>

			</form>
           
<script>
    $("#add-comment").on("submit", function(){
       event.preventDefault();
       var arendatel=$("#arendatel").val();
      var name=$("#text").val();
	$.ajax({
		url: 'agent_msg.php',
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
			$('#inform').html(data);			
		}
	});
});
</script>
</script>						
						</div>
					</div>


		<div class="col-lg-4 col-md-4">
			<div class="sidebar sticky right">

				<div class="widget">
				<h3 class="margin-bottom-30 margin-top-30">Связаться</h3>
		<div class="form">
					<div class="agefnt-widget">
					    	<input type="text" id="namee"  placeholder="Имя">
						<input type="text" id="email"  placeholder="Email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
						<input type="text" id="tele"  placeholder="Телефон">
						<textarea id="messagess"  name="messagess" placeholder="Сообщение"></textarea>
						<button  id="btn_submit"    type="submit"  class="button fullwidth margin-top-5" >Отправить</button>
					</div>
					<div id="erconts"></div>
		</form>

				</div>
		


</div></div>
	
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

<script type="text/javascript" language="javascript">
$(document).ready(function(){ 
            $('#btn_submit').click(function(){
                var user_name    = $('#namee').val();
                var user_email   = $('#email').val();
                var user_phone = $('#tele').val();
                var text_comment = $('#messagess').val();
   
                $.ajax({
                    url: "ajax/agentmess.php", 
                    type: "post", 
                    data: { 
                        "namee":    user_name,
                        "email":   user_email,
                        "tele":   user_phone,
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


<script type="text/javascript" src="scripts/markerclusterer.js"></script>

</div>



</body>
</html>