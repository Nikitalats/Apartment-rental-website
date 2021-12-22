<?php
session_start();
require_once('connect.php');
?>
<head>
<title>Топхата</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Снять квартиру на сутки, месяц в центре города со всем необходимым для проживания"/>
<link rel="icon" href="https://tophata.ru/favicon.ico" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">
<link rel="stylesheet" href="css/msg.css">
<script src="js/messages.js"></script>

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

<body>



<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Сообщения</h2>

				<nav id="breadcrumbs">
					<ul>
						<li><a href="messenger.php">Главная</a></li>
						<li>Сообщения</li>
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
						
						<li><a href="my-profile.php?id=<?=$id?>" ><i class="sl sl-icon-user"></i> Мой профиль</a></li>

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

 <div class="inbox_chat">
             <?  

$act=$_GET['act'];
   switch($act){
       default:

        $q_2=mysqli_query($con,"SELECT * FROM messages WHERE poluchatel='{$_SESSION['id']}' ORDER BY id DESC");
        $row_cnt = mysqli_num_rows($q_2);

               while($r_2=mysqli_fetch_array($q_2)){
                    $id=$r_2['id'];
                    $author=$r_2['author'];
                    $poluchatel=$r_2['poluchatel'];
                    $mess=$r_2['mess'];
                    $data=$r_2['data'];
                               
        $q_3=mysqli_query($con,"SELECT * FROM users WHERE id='$author'");
               while($r_3=mysqli_fetch_array($q_3)){
                  $id=$r_3['id'];
                  $name=$r_3['name'];
                            
         
      if($row_cnt!=0) {
       $q_2=mysqli_query($con,"SELECT id, author, poluchatel, mess, data FROM messages WHERE poluchatel='{$r['id']}' ORDER BY id DESC");
               while($r_2=mysqli_fetch_array($q_2)){
                    $id=$r_2['id'];
                    $author=$r_2['author'];
                    $poluchatel=$r_2['poluchatel'];
                    $mess=$r_2['mess'];
                    $data=$r_2['data'];
                   
      $q_3=mysqli_query($con,"SELECT * FROM users WHERE id='$author'");
               while($r_3=mysqli_fetch_array($q_3)){
                   $id=$r_3['id'];
                   $name=$r_3['name'];                        
?>
            <div class="chat_list">
              <div class="chat_people">
                <div  class="chat_img"> <img src="<? echo $r_3['images']; ?>"> </div>
                <div class="chat_ib">
                  <h5 ><?=$r_3['name']?><span class="chat_date"><?=$r_2['data']?></span></h5>
                  <p> <? echo  "   <a  href=messenger.php?act=inbox&id=".$r_3['id'].">".mb_substr($r_2['mess'], 0,55,'utf-8').'...'." </a>"; ?> </p>
                </div>
              </div>
            </div>
<?  
             
        }                      
      } 
   }
}
  if($row_cnt==0) {    
           ?>
          <div class="chat_list">
              <div class="chat_people">
                <div  class="chat_img"> <img  src="<? echo $r_3['images']; ?>" > </div>
                <div class="chat_ib">
                  <h5 ><?=$r_3['name']?><span class="chat_date"><?=$r_2['data']?></span></h5>
                  <p> <? echo  " row=0  <a  href=mail.php?act=inbox&id=".$r_3['id'].">".mb_substr($r_2['mess'], 0,55,'utf-8').'...'." </a>"; ?> </p>
                </div>
              </div>
            </div>
           <?
          }
         } 
              
              $q_4=mysqli_query($con,"SELECT * FROM messages WHERE author='{$r['id']}' ORDER BY id DESC");
               while($r_4=mysqli_fetch_array($q_4)){
                    $id=$r_4['id'];
                    $author=$r_4['author'];
                    $poluchatel=$r_4['poluchatel'];
                    $mess=$r_4['mess'];
                    $data=$r_4['data'];
                                         
             $q_5=mysqli_query($con,"SELECT * FROM users WHERE id='$author'");
               while($r_5=mysqli_fetch_array($q_5)){
                    $name=$r_5['name'];
                    if($row_cnt==0) {                      
?>

            <div class="chat_list">
              <div class="chat_people">
                <div  class="chat_img"> <img  src="<? echo $r_5['images']; ?>" > </div>
                <div class="chat_ib">
                  <h5 ><?=$r_5['name']?><span class="chat_date"><?=$r_5['data']?></span></h5>
                  <p> <? echo  "   <a  href=messenger.php?act=inbox&id=".$r_4['poluchatel'].">".mb_substr($r_4['mess'], 0,55,'utf-8').'...'." </a>"; ?> </p>
                </div>
              </div>
            </div>

<?
          }  }}   

           break;
                                   
      case"inbox":
                   $inbox=$_GET['inbox'];
                   if(isset($_GET['id'])){
                     $id=$_GET['id'];
                     $s=mysqli_query($con,"SELECT * FROM messages WHERE poluchatel='{$_SESSION['id']}'") or mysqli_error($con);
                     $su=mysqli_fetch_array($s);
                     $query_2=mysqli_query($con,"SELECT * FROM users WHERE id='{$_GET['id']}'") or mysqli_error($con);
                     $result_2=mysqli_fetch_array($query_2);
                }

            echo"<div class=position-relative>
            <div class=chat-messages p-4 id='chat'>";
              if(isset($_GET['id'])){
                   $id=$_GET['id'];
                $qur=mysqli_query($con,"SELECT * FROM dialog WHERE poluchatel='{$_SESSION['id']}' AND author='{$_GET['id']}' OR poluchatel='{$_GET['id']}' AND author='{$_SESSION['id']}' order by id Asc ");
               while($ru=mysqli_fetch_array($qur)){
                    $author=$ru['author'];
                    $poluchatel=$ru['poluchatel'];
                    $mess=$ru['mess'];
                    $data=$ru['data'];
                $qu_2=mysqli_query($con,"SELECT * FROM users WHERE id='$author'");
                while($res_2=mysqli_fetch_array($qu_2)){
                    $image=$res_2['images'];
                    $name=$res_2['name'];      
}
?>
    <div class="chat-container">
          <ul class="chat-box chatContainerScroll">
              <li class="chat-left">
               <div class="chat-avatar">
                 <img src="<?=$image?>">
                <div class="chat-name" style="font-size:12px;"><? echo "$name";  ?></div>
              </div>
          <div class="received_msg">
              <div class="received_withd_msg">
               <p  style="font-size:16px;">    <?=$mess?></p>
              <span class="time_date">  <?=$data?></span></div>
          </div>                          
            </li> 
        </ul>                
    </div>
<?
             }
          }

           echo" <div id=inform_3></div></div></div>";
                                
               echo"<br><div class='col-md-12' id='text_mess' >
               <form action='https://tophata.ru/action/action_messages_2.php' method='post'>          
               <input type='hidden' id='poluchatel' name='poluchatel' value=".$id.">  
               <textarea  style='margin-bot:5px;min-height: 70px;height: 0; padding:0;'  id='textarea' cols=40 rows=3 name=textarea placeholder='' required></textarea>
                <button style='margin-bottom:20px; width: 40%; ;' type='submit' id='submit_5' class='button fullwidth margin-top-5'>Отправить</button>
               </form>
               </div>
               </div>
               ";
               break;
   }

          echo"</div>
          </div>";   
}
?>

<script type="text/javascript">
$(document).ready(function mess(){
    var div = document.getElementById('chat'); 
    $('#chat').scrollTop(div.scrollHeight-div.offsetHeight);       
});
</script>
</div>
</div>

<div class="col-md-12" style="font-size: 14px;">
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

          <li><a href="contacts.php">Контакты</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>    

      <div class="col-md-3  col-sm-12">
        <h4>Контакты</h4>
        <div class="text-widget">
    
          E-Mail:<span> <a href="#">support@mailtophata.ru</a> </span><br>
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

</div>

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
</body>
