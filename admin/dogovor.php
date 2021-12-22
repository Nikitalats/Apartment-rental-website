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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

<link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />

<link rel="stylesheet" href="..//css/style.css">
<link rel="stylesheet" href="..//css/color.css">


    </head>
    <body>
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

<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/ru.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>

<script data-require="bootstrap@3.3.7" data-semver="3.3.7" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<div class="container" style="margin: 0 auto;">
	<div class="row">

		<div class="col-md-8" style="margin-top: 20px;">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-3 ">
		                    <h4>Договоры</h4>
		                </div>
		             

		            </div>
		            <hr>
		            
		  <div class="container" >

</div>

            <div class="row">
                <div class="col-md-12">
      
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>id</th>
                            <th>Имя</th>

             
                       
                            <th>Смотреть</th>
                            <th>Загрузить</th>
                   
                            </thead>
                            <tbody>
                     
                           <?
                           $q=mysqli_query($con,"select * from users where dogovor!='users/doc.docx' and dogovor!=''  and id!='68'");
     $q1=mysqli_query($con,"select * from report 
                           inner join users on users.id=report.id_user");
                           
                           
while ($row=mysqli_fetch_array($q1)){
	$id_user=$row['id_user'];
	$name_user=$row['name'];

	$tema=$row['tema'];
    $email1=$row['email'];
}


while ($row=mysqli_fetch_array($q)){
$id_report=$row['id_report'];
	$id_user=$row['id'];
	$id_arendatel=$row['id'];
	$mess=mb_substr( $row ['mess'],0,20,'utf-8').'...';
	$mess1=$row ['mess'];
	$tema=$row['tema'];
    $email=$row['email'];
    $data=$row['data'];
        $dogovor=$row['dogovor'];
        
          $name=$row['name'];      
?>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>


                                
                                <tr id="tr<?=$id_user ?>" >
                                    <td data-inp="id_user" class="edit"><?=$id_user?></td>
                                    <td data-inp="first-name" class="edit"><?=$name?></td>

                         
                
                                    
                                      <td style="display:none;" data-inp="messs" type="hidden" class="edit" > <?=$mess1?></td>
                            
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit">
              <a href="http://docs.google.com/viewer?url=https://tophata.ru/<?=$dogovor?> "  target="blank" class="btn btn-primary btn-xs" data-title="Edit" data-id="4"  >
                  <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
                  </a></p></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-id="4" data-toggle="modal" data-target="#edit-modal" ><i class="glyphicon glyphicon-download" aria-hidden="true"></i></button></p></td>
      
                                </tr>
               
                      
                      
                      
            <script>
     $("#delete<?=$id_report?>").click(function(event){
          if(confirm('Удалить жалобу?')){
       event.preventDefault();

 
          var id_report=$("#delete<?=$id_report?>").val();
       
       $.ajax({
          type:"post",
          url:"../ajax/del_report.php",
          data:{
             
          
               id_report: id_report
           
          },
          success:function(data){
              $("#tr<?=$id_report ?>").css("display", "none");
            
             $("#inform1").html(data); 
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

        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="Post" id="form_edit"   enctype="multipart/form-data">
                        <div class="modal-header">
               
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                               
                  
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                      <input class="form-control " name="id_user" type="hidden"  id="id_user">
                            </div>
                    
                               <div class="form-group">
                                <input id="sortpicture" name="dogovor" type="file" > 
                            </div>
                        </div>
                        <div class="modal-footer ">
                                  <button type="submit" class="button" style="width: 100%;" data-dismiss="modal" aria-hidden="true" id="upload">Сохранить</button>
                            <button id="edit" type="button" class="button" style="width: 100%;" data-dismiss="modal" aria-hidden="true">Закрыть</button>
                            </form>
                        </div>
              
                </div>

            </div>
        </div>
     
       <script type="text/javascript" language="javascript">
 $(document).ready(function() {
  $('#upload').on('click', function() {
    $(".load_form").css('display', 'none');
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('dogovor', file_data);
    form_data.append('id_user', $("#id_user").val());
    alert(form_data);
    $.ajax({
      url: '..//ajax/update_doc.php',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(php_script_response) {
        alert(php_script_response);
      }
    });
  });
});
             </script>


		        </div>
		    </div>
		</div>
	</div>


	
</div>

         <script type="text/javascript">
            $(function () {
  
                $('#edit-modal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var id = $(button).data('id');
                    $('form#form_edit input[name=id]').val(id);
                    var tr = $(button).parent().parent().parent().children('.edit');
 
                    $(tr).each(function (i, e) {
                        var name = $(e).data('inp');
                        var value = $(e).text();
                        var inp = $('form#form_edit input[name=' + name + ']').length == 0 ? $('form#form_edit textarea[name=' + name + ']') : $('form#form_edit input[name=' + name + ']');
                        inp.val(value);
                    })
                });
       
            })
        </script>
        
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>


</div>
</body>
</html>