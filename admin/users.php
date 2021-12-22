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
	<title>Админ панель</title>
		<link href="../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


<link rel="stylesheet" href="..//css/style.css">
<link rel="stylesheet" href="..//css/color.css">
<link rel="stylesheet" href="..//css/users.css">
<style>

</style>
</head>

<header id="header-container">


	<div id="header">
		<div class="container">
			

			<div class="left-side" style="width: 75%; height:0px;">
				
	
				<div id="logo">
					<a href="https://tophata.ru/"><img src="..//images/logoo.png" alt=""></a>
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


<div class="container" style="margin-top:20px;">
			<div class="col-md-8">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-3 ">
		                    <h4>Пользователи</h4>
		                </div>
		             

		            </div>
		            <hr>
		  <div class="container">
</div>
                <div class="col-md-12" style="margin:0 auto;" >
                  
                           <div class='col-sm-6' style="float:left">
                               <div class="search_box">
                               <form>
       <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Введите id" />
                    <span class="input-group-addon">
                        <span type="submit" class="glyphicon glyphicon-search"></span>
                    </span>
                </div>
            </div>
            </form>
            <div id="search_box-result"></div>
            </div>
            </div>
    <script>
     $(document).ready(function() {	
	var $result = $('#search_box-result');
	
	$('#search').on('keyup', function(){
		var search = $(this).val();
		if ((search != '') && (search.length > 1)){
			$.ajax({
				type: "POST",
				url: "ajax_search.php",
				data: {'search': search},
				success: function(msg){
					$result.html(msg);
					if(msg != ''){	
						$result.fadeIn();
					} else {
						$result.fadeOut(100);
					}
				}
			});
		 } else {
			$result.html('');
			$result.fadeOut(100);
		 }
	});
 
	$(document).on('click', function(e){
		if (!$(e.target).closest('.search_box').length){
			$result.html('');
			$result.fadeOut(100);
		}
	});

});

 $("body").on("click", "#search_box-result .search_result-btn", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-"); 
        var DbNumberID = clickedID[1]; 
        var myData = 'recordToDelete='+ DbNumberID; 

        jQuery.ajax({
            type: "POST", 
            url: "../ajax/del_user.php", 

            data:myData, 
            success:function(response){
       
               $('#tr'+DbNumberID).fadeOut("slow");
            $('#item_'+DbNumberID).fadeOut("slow");
            },
            error:function (xhr, ajaxOptions, thrownError){

                alert(thrownError);
            }
        });
    });

 </script>              
                                        
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>id</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Удалить</th>
                            </thead>
                            <tbody>
                                
                           <?
                           $q=mysqli_query($con,"select * from users ");
                           
                           
while ($row=mysqli_fetch_array($q)){
	$id_user=$row['id'];
	$name_user=$row['name'];

	$tema=$row['tema'];
    $email1=$row['email'];

?>                          
                                <tr id="tr<?=$id_user?>" class="user" >
                                    <td data-inp="tema" class="edit"><?=$id_user?></td>
                                    <td data-inp="first-name" class="edit"><?=$name_user?></td>

                                
                                    <td  data-inp="mail" class="edit"><?=$email1?></td>
                      
                                
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" id="delete<?=$id_user ?>"  value="<?=$id_user ?>" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>
                               
            <script>
     $("#delete<?=$id_user?>").click(function(event){
         if(confirm('Удалить пользователя?')){
       event.preventDefault();
 
          var recordToDelete=$("#delete<?=$id_user?>").val();
       
       $.ajax({
          type:"post",
          url:"../ajax/del_user.php",
          data:{
             
          
               recordToDelete: recordToDelete
           
          },
          success:function(data){
              $("#tr<?=$id_user ?>").css("display", "none");
            
           
          }
       });
          }
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