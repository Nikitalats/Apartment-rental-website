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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
  
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">
<style type="text/css">
	body {font-family: Arial, Helvetica, sans-serif;}

</style>


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


				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="index.php">Главная</a>
							<li><a href="contact.php">Контакты</a></li>
				
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

				<h2>Мои квартиры</h2>

		
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li>Мои кватиры</li>
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





		<div class="col-md-8">
			<table class="manage-table responsive-table">

		

	  		<?php
			  $id=$_SESSION['id'];
              $result=mysqli_query($con,"SELECT * FROM room 
              WHERE  id_user='$id' ");
              while ($row=mysqli_fetch_array($result)){
              $id_room=$row['id_room'];
              $adres=$row['adres'];
              $description=$row['descrition'];
              $price=$row['price'];
              $price_m=$row['price_m'];
              $show=$row['shows'];
            ?>



	
				<tr id="tr<?=$id_room ?>" style="<?  if($show==0) echo"opacity:0.4"; ?>">
					<td class="title-container">
<?
$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room' ORDER BY id_room DESC LIMIT 1 ");
while ($row=mysqli_fetch_array($resul)){
$images=$row['name_image'];
?>

						<img src="uploads/<? echo $images; ?>" alt="">
					<? } ?>
						<div class="title">







<form method="POST" enctype="multipart/form-data">
							<h4><a href="detail.php?id=<?=$id_room?>"><? echo "$adres"; ?></h4>
						  <input type="hidden" class="id_room" name="id_room" value="<?=$id_room?>" />
							<span class="table-property-price">₽<?=$price_m?> / месяц</span>
							<span class="table-property-price">₽<?=$price?>/ день</span>
							<div class="photoUpload" style=" margin-top: 9px; padding: 2px 10px;">
						<a href="doc_room.php?id=<?=$id_room ?>" > 	    <span><i class="fa fa-upload" ></i> Документ о праве собственности</span></a>
							  
				
						</div>
						</div>
						
					</td>
		        <td class="expire-date"></td> 
					
					<td class="action">
						<a href="editroom.php?room=<? echo $id_room ?>"><i class="fa fa-pencil"></i>Изменить</a>
			<?  if ($show==1){   ?>
						<a href='#' data-id="<?=$id_room?>" class="<?  if($show==0) echo"active"; ?>"  type="submit"  id="id_room1<?=$id_room?>" value="<?=$id_room ?>" ><i class="fa  fa-eye-slash"  ></i>Скрыть</a>
					<? }?>
		
						<?  if ($show==0){   ?>
						<a href='#' data-id="<?=$id_room?>" class="<?  if($show==0) echo"active"; ?>"  type="submit"  id="id_room1<?=$id_room?>" value="<?=$id_room ?>" ><i class="fa  fa-eye-slash"  ></i>Открыть</a>
					<? }?>
						<form id="myform"  method="POST" >
						        <input type="hidden" name="room" value="<?=$id_room?>">
						        
						<a href="" type="submit" class="delete"  data-id="<?=$id_room?>" name="delete" id="delete<?=$id_room?>" value="<?=$id_room ?>" ><i class="fa fa-remove"></i>Удалить</a>
			        
	            
						</form>					
					
					</td>

				</tr>
		            <script>
     $("#delete<?=$id_room?>").click(function(event){
          if(confirm('Удалить квартиру?')){
       event.preventDefault();
  
 var id_room = $(this).data('id');
       
       
       $.ajax({
          type:"post",
          url:"ajax/del_room.php",
          data:{
             
          
               id_room: id_room
           
          },
          success:function(data){
              $("#tr<?=$id_room ?>").css("display", "none");
            
           
          }
       });
          }
   });
</script> 		
				
				
	
<script type="text/javascript" language="javascript">
   $("#id_room1<?=$id_room?>").click(function(event){
    event.preventDefault();


var val = $(this).data('id');
 
 $(this).toggleClass("active");

        $("#tr<?=$id_room ?>").css("opacity"," 0.9");
    if($(this).hasClass("active"))
    {
        $(this).html('<i class="fa  fa-eye-slash"  ></i> Открыть');
  
       $.post('ajax/hide.php', {id_room: val}, function(data)

{

   $("#tr<?=$id_room ?>").css("opacity"," 0.4");

}

);
    }
    else{
        $(this).html('<i class="fa  fa-eye-slash"  ></i> Скрыть');

     $.post('ajax/hide.php', {id_room: val}, function(data)
{

   $("#tr<?=$id_room ?>").css("opacity"," 0.9");

}

);
    }   

   });
</script> 				
										
			<?
		}
		?>		
			</table>
			<a href="submit-property.php" class="margin-top-40 button" style="margin-bottom:55px">Добавить</a>
		</div>

	</form>

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

					<li><a class="fa fa-instagram" href="#"></a></li>
					<li><a class="fa fa-facebook" href="#"></a></li>
					<li><a class="fa fa-vk" href="#"></a></li>

				</ul>

			</div>

			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Tophata.</div>
			</div>
		</div>

	</div>


<div id="backtotop"><a href="#"></a></div>

<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>

<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</div>



</body>
</html>