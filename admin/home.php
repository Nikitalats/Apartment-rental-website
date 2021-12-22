<?php

session_start();
require_once('..//connect.php');

if (!$_SESSION['role']=='admin') {

}
?>

</!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Админ</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />



<link rel="stylesheet" href="..//css/style.css">
<link rel="stylesheet" href="..//css/color.css">

</head>

<header id="header-container">


	<div id="header">
		<div class="container" >
			

			<div class="left-side" style="width: 75%; height:0px;" >
				
	
				<div id="logo" >
					<a href="https://tophata.ru/"><img src="..//images/logoo.png" alt=""></a>
				</div>

				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<nav id="navigation" class="style-1" >
					<ul id="responsive">


<li><a href="report.php">Жалобы</a>
<li><a href="users.php">Пользователи</a>
<li><a href="home.php">Подтверждение собственности</a>
<li><a href="dogovor.php">Договоры</a>
			
						</li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				
			</div>

			<div class="right-side">
	
				<div class="header-widget">

	
		
				</div>

			</div>


		</div>
	</div>


</header>


<div class="container" style="margin-top: 20px;">
	<div class="row">

		<div class="col-md-8">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-6">
		                    <h4>Подтверждение собственности</h4>
		                </div>
		             

		            </div>
		            <hr>

<div class="col-md-12">
       
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>id</th>
                            <th>Имя</th>
                            <th>Адрес</th>                  
                            <th>Смотреть</th>
                            <th>Подтвердить</th>
                            <th>Удалить</th>
                            </thead>
                            <tbody>
                     
                           <?
$q=mysqli_query($con,"select * from room 
inner join users on users.id=room.id_user
	where status='unapprove' ");
while ($row=mysqli_fetch_array($q)){
	$status=$row['status'];
	$ar=$row['id_room'];
	$id_room=$row['id_room'];
	$id_user=$row['id_user'];
    $document=$row['document'];
    ?>

                                
<tr id="tr<?=$id_room ?>" >
     <td data-inp="tema" class="edit"><?=$id_room?></td>
    <td data-inp="first-name" class="edit"><? echo $row['name']; ?></td>

        <td data-inp="address" class="edit"><? echo $row['adres'];  ?></td>
                                    

          <td><p data-placement="top" data-toggle="tooltip" title="Edit">
              <a href="//view.officeapps.live.com/op/view.aspx?src=https://tophata.ru/uploads/<?=$document?> "  target=blank class="btn btn-primary btn-xs" data-title="Edit" data-id="4" data-toggle="modal" data-target="#edit-modal" >
                  <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
                  </a></p></td>
              <?
              	if ($status=='unapprove') {
			echo " <td><p data-placement=top data-toggle=tooltip title=Edit data-id='$id_room' id='dob$id_room' value='$id_room'><a href='#' >Подтвердить</a></td>"; 
	}
              
              ?>
     <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button  type="submit"  class="btn btn-danger btn-xs" data-target="#delete" id="delete<?=$id_room?>" value="<?=$id_room ?>" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
                                                    
                   
<script type="text/javascript">
     $("#dob<?=$id_room?>").click(function(event){
       event.preventDefault();
 
     var id_room = $(this).data('id');
       $.ajax({
          type:"post",
          url:"../ajax/dob_doc.php",
          data:{
                    
               id_room: id_room
           
          },
          success:function(data){
              $("#tr<?=$id_room ?>").css("display", "none");
            
             $("#inform2").html(data); 
          }
       });
   });
</script> 


                    <?}?>                 
  
                            </tbody>
 
                        </table>
                    </div>
		        </div>
		    </div>
		</div>
	</div>
</div>

	
</div>
</div>

</body>
</html>