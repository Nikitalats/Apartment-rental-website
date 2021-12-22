<?
session_start();
require_once('connect.php');
$id=$_SESSION['id'];
if ($_SESSION['id']=='') {
header ('location: https://tophata.ru/login-register.php');
}
?>

<?
$sql=("SELECT* from users WHERE id='{$_GET['id']}'");
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)){
	$name=$row['name'];
	$email=$row['email'];
	$image=$row['images'];
	$telephone=$row['telephone'];
	$vk=$row['vk'];
	$facebook=$row['facebook'];
	$instagram=$row['instagram'];

}

?>

<!DOCTYPE html>
<head>


<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.maskedinput.js"></script>

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



?>

<?
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



<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Мой профиль</h2>

				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li>Мой профиль</li>
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
			<div class="row">

<form  method="post" action="update_user.php" enctype="multipart/form-data">
				<div class="col-md-8 my-profile">
					<h4 class="margin-top-0 margin-bottom-30">Мой профиль</h4>

					<label>Имя</label>
					<input  name="name"  value="<? echo $name; ?>" type="text">		
<? $id_user=$_GET['id']; ?>					
<input  name="id_user"  value="<? echo $id_user; ?>" type="hidden">		
					<label>Телефон</label>
					<input id="phone" name="tele" value="<? echo $telephone; ?>" type="text">

					<label>Email</label>
					<input name="email" value="<? echo $email; ?>" type="text">

	<label>Договор аренды</label>
			    <input type="file" class="upload" name="dogovor"/>

					<h4 class="margin-top-50 margin-bottom-0">Социальные сети</h4>

				

					<label><i class="fa fa-facebook-square"></i> Facebook</label>
					<input name="facebook" value="<?=$facebook?>" type="text">

					<label><i class="fa fa-vk"></i> Вконтакте</label>
					<input name="vk" value="<?=$vk?>" type="text">

					<label><i class="fa fa-instagram"></i> Instagram</label>
					<input name="instagram" value="<?=$instagram?>" type="text">


					<button type="submit" name="submit" class="button margin-top-20 margin-bottom-20">Сохранить изменения</button>
				</div>

				<div class="col-md-4">
			
					<div class="edit-profile-photo">
					<img src="<? echo $image; ?>" alt="">
					<input type="file" name="image" value="<?=$image?>" class="upload" />			
					</div>

				</div>


			</div>
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

					<li><a class="fa fa-instagram" href="https://www.instagram.com" target="_blank"></a></li>
					<li><a target="blank" class="fa fa-facebook" href="https://www.facebook.com/groups/3745188922183769"></a></li>
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

<script>

$(document).ready(function(){ 

  $("#phone").mask("89999999999");
});
</script>


<div id="backtotop"><a href="#"></a></div>



<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

</div>



</body>
</html>