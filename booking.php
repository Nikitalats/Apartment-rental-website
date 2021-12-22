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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
  
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">

<style type="text/css">
	body {font-family: Arial, Helvetica, sans-serif;}

.myBtn {
  background-color: #9C27B0;
  color: white;
  padding: 12px 16px;
  font-size: 18px;
  font-weight: bold;
  border: none;
  cursor: pointer;
  width: 180px;
}

.fa  {
	font-size:18px;
color:black;
}
.fa:hover{
	color:#274abb;
}
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4); 
}


.modal-content {
    position: relative;
    background-color: #E1BEE7;
    margin: auto;
    padding: 0;
    border: 5px solid #7B1FA2;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}


.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #9C27B0;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #9C27B0;
    color: white;
}
</style>

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

				<h2>Бронирование</h2>

	
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Главная</a></li>
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
						<li><a href="#"><i class="sl sl-icon-power"></i> Выйти</a></li>
					</ul>

				</div>

			</div>
		</div>

		<div class="col-md-8" style="font-family: Arial, Helvetica, sans-serif;">

		<div class="table-responsive" style="">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th >Адрес</th>
                            <th>Имя</th>

                            <th>С</th>
                    
                            <th>По</th>
                            <th>Стоимость</th>
                            <th>Договор</th>
					
							<th>Удалить</th>
                            </thead>
                            <tbody>
                     
<?         
$result=mysqli_query($con,"SELECT reserve.id_user,room.id_room,room.adres,room.id_city,reserve.datearrive,reserve.dateleave,users.name,
room.price,
users.id,id_arendatel,id_reserve,dogovor_user,dogovor_arendatel FROM reserve 
	inner join room on room.id_room=reserve.id_room
	inner join users on users.id=reserve.id_user
		   
WHERE id_arendatel='$id'  or reserve.id_user='$id'") or die (mysqli_error($con));		

while ($row=mysqli_fetch_array($result)){

$id_reserve=$row['id_reserve'];
$id_room=$row['id_room'];
$user_name=$row['name'];
$user_id=$row['id'];
$id_user=$row['id_user'];
$adres=$row['adres'];
$description=$row['descrition'];
$price=$row['price'];
$date=$row['datearrive'];	
$date1=$row['dateleave'];
$id_arendatel=$row['id_arendatel'];
$status=$row['dogovor_user'];
$status1=$row['dogovor_arendatel'];
$fio=$row['fio'];
$d1_ts = strtotime($date);
$d2_ts = strtotime($date1);
$time = abs($d1_ts - $d2_ts);
$days=(($time) / 86400);
?>

                               
<tr id="tr<?=$id_room ?>" >
<td data-inp="address" class="edit"><a href="https://tophata.ru/detail.php?id=<?=$id_room?>"><? echo $row['adres'];  ?></a></td>
    <td data-inp="first-name" class="edit"><? echo $row['name']; ?></td>

     
		<td data-inp="address" class="edit"><? echo $row['datearrive'];  ?></td>                     
		<td data-inp="address" class="edit"><? echo $row['dateleave'];  ?></td>  
		<td data-inp="address" class="edit"><?echo $days * $price.' '.'₽'; ?></td>  
          <td>    <? if (($id_arendatel==$id) and ($status!='1') and ($status1!='1')   ){
			
						      echo	"<div>Ожидание заполнения арендатором</div>"; 
						}						
							   
					     if (($id_arendatel==$id) and ($status=='1') and ($status1!='1')){
		
						      echo	"<div><a href='dogovor1.php?id=$id_reserve'>Заполнить </a></div>"; 
						}
						
						   if (($id_arendatel==$id) and ($status=='1') and ($status1=='1')){
		
						?>
					<a target='blank' href='http://docs.google.com/viewer?url=https://tophata.ru/users/user<?=$id_arendatel?>/dogovor<?=$id_reserve?>.docx'  >
						<i  class='fa fa-eye'></i>
						</a>
						<?
						
						echo "<a href='dogovor/editdogovor1.php?id=$id_reserve'  >
						<i class='fa fa-edit'></i>
						</a>";
						}
						
						if (($id_user==$id) and ($status!='1')){
				
						       echo	"<div><a href='dogovor.php?id=$id_reserve'>Заполнить</a></div>"; 
						    
						}
						
							if (($id_user==$id) and ($status=='1') and ($status1!='1')  ){

						       echo	"<div>Ожидание заполнения арендодателем</div>"; 
							 
						}
					
					
						   if (($id_user==$id) and ($status=='1') and ($status1=='1')){
								?>
					<a target='blank' href='http://docs.google.com/viewer?url=https://tophata.ru/users/user<?=$id_arendatel?>/dogovor<?=$id_reserve?>.docx'  >
						<i  class='fa fa-eye'></i>
						</a>
						<?
						echo "<a href='dogovor/editdogovor.php?id=$id_reserve'  >
						<i class='fa fa-edit'></i>
						</a>";

						}
	
				
						?></td>
              <?
			  	echo"<td><a href='delbook.php?id=$id_reserve' class='delete' style='margin-top:15px;' >
				  <i class='fa fa-trash'></i>
				  </a></td>";       
              ?>
      
    
</tr>
                    <?}?>                 
  
                            </tbody>
 
                        </table>
						</div>
		</div>






</div>
</div>
 <div class="container">
            <div class="row">
               
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
				<div class="copyrights">© 2021 Tophata</div>
			</div>
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