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


<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/color.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/dropzone.js"></script> 
</head>

<body>

<div id="wrapper">

<?
if(isset($_GET['room']))
{
	  $id_room=$_GET['room'];
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
              $ploshad=$row['ploshad'];

}

?>



<?php

if (isset($_POST['submit']) ) {

 	$rooms = mysqli_real_escape_string($con, $_POST['rooms']);
 	$text = mysqli_real_escape_string($con, $_POST['text']);
 	$price = mysqli_real_escape_string($con, $_POST['price']);
 	$price_m = mysqli_real_escape_string($con, $_POST['price_m']);
 	$people = mysqli_real_escape_string($con, $_POST['people']);
 	$ploshad = mysqli_real_escape_string($con, $_POST['ploshad']);
   
    $insert = "UPDATE room
                   SET ploshad='$ploshad', text='$text',price='$price',price_m='$price_m' WHERE id_room='$id_room'";
    $run = mysqli_query($con, $insert);
 
}
  
?>

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
   
	
					<a href="submit-property.php" class="button border">Добавить объявление</a>
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

				<h2>Редактирование</h2>

				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li>Редактирование</li>
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
			<table class="manage-table bookmarks-table responsive-table">

				<tr>
					<th><i class="fa fa-edit"></i> Редактирование</th>
					<th></th>
				</tr>
				
			</table>
			
			
			
			<div class="col-md-12">

<h3>Галерея</h3>
<div class="col-md-12">
<div class="content">
 <div class="col-lg-12">
<div class="panel">
    <div class="image_upload_div">
           <form  method="POST" id="formx" action="ajax/editimage.php" class="dropzone"  >
                    <div class="dz-message">
                     <br>
                    </div>
                <input type="hidden" name="id_room" value="<?=$id_room?>" >
                </form>
              
            </div>
    </div></div></div>
</div>


<script type="text/javascript">
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
  headers: {
    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
  },
  acceptedFiles: ".jpeg,.jpg,.png,.gif",
  maxFiles: 15,
  maxFilesize: 8, 
  addRemoveLinks: true,

   init: function() {
    myDropzone = this;

this.on("sending", function(file, xhr, formData){
formData.append("id_room", '<?=$id_room?>')
	});		
		    var images = [ 
<?
$resul=mysqli_query($con,"SELECT * from images where id_room='$id_room'");

while ($row=mysqli_fetch_array($resul)){

$images=$row['name_image'];
$id_image=$row['id_image'];

?>{
      id: '<?=$id_image?>',
      img_alt: "svsss4",
      name: "<?=$images?>"
    },			<?

}

			?>
]

   $.each(images, function(index, value) {
      var mockFile = {
        name: value.name,
        size: value.size,
        id: value.id
      };
 
      myDropzone.options.addedfile.call(myDropzone, mockFile);
      myDropzone.options.thumbnail.call(myDropzone, mockFile, "uploads/" + value.name);
      myDropzone.options.complete.call(myDropzone, mockFile);
      myDropzone.options.success.call(myDropzone, mockFile);
      $(mockFile.previewElement).attr('data-id', value.id);
      $(mockFile.previewTemplate).find('.dz-remove').attr('data-dz-remove', value.id);    
      $('#botofform').append('<input type="text" class="cimages" name="file[]" data-id = "' + value.id + '" value="' + value.name + '" sort="' + value.sort + '">'); 

     $('.dz-remove').click(function(file) {

            var name = file.name; 
var val = $(this).data('dz-remove');
           $.ajax({
             type: 'POST',
             url: 'ajax/editimage.php',
             
             data: {name: name,id_room:val,request: 2},
             sucess: function(data){
                console.log('success: ' + data);
             }
           });
           var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      });

    });
  },

         removedfile: function(file) {
           var name = file.name; 
        var id= $(this).data('id');

<?
			$resul=mysqli_query($con,"SELECT id_image FROM images ORDER BY id_room DESC LIMIT 1");

while ($row=mysqli_fetch_array($resul)){

$id_image1=$row['id_image'];
}
?>		

           $.ajax({
             type: 'POST',
             url: 'ajax/editimage.php',
             data: {name: name,request: 2,id:'<?=$id_image1?>'},
             sucess: function(data){
                console.log('success: ' + data);
             }
           });
           var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
         },

});


</script>			
			

<form method="Post">				
			<div class="col-md-12">
				<h5 >Адрес</h5>
	<input type="" name="" value="<? echo htmlspecialchars ($adres) ?>" style="margin-top: 10px" >	
</div>
		<div class="col-md-3">
					<h5>Площадь</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="" name="ploshad" value="<? echo htmlspecialchars ($ploshad) ?>">
					</div>
				</div>

				<div class="col-md-3">
					<h5>Цена за сутки</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="" name="price" value="<?  echo htmlspecialchars ($cena) ?>">
					</div>
				</div>
				

				<div class="col-md-3">
					<h5>Цена за месяц</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="" name="price_m" value="<?  echo htmlspecialchars ($price_m) ?>">
					</div>
				</div>

		
				<div class="col-md-3">
					<h5>Cпальных мест</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="" name="people" value="<?  echo htmlspecialchars ($people) ?>">
					</div>
				</div>

	<div class="col-md-12">
				<h5 >Описание</h5>
				<textarea class="WYSIWYG" name="text" cols="" rows="3" id="summary" spellcheck="true"  ><?php echo htmlspecialchars ($text) ?></textarea>

<button class="button preview margin-top-5" name="submit" style="margin-bottom: 20px">Изменить</button>
			</div>

		</div>


</form>
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
	
		    E-Mail:<span> <a href="#">tophata@mail.ru</a> </span><br>
		</div> 

			<ul class="social-icons margin-top-20" style="margin-left: 12px;">

					<li><a class="fa fa-instagram" href="#"></a></li>
				    <li><a target="blank" class="fa fa-facebook" href="https://www.facebook.com/groups/3745188922183769"></a></li>
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