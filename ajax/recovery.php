<?php
session_start();
require_once('..//connect.php');

	$email=$_POST['email'];
		$code1=$_POST['code'];
	    if(!mysqli_num_rows(mysqli_query($con,"Select * from users where email='$email'"))){
	        

	        
	        
?>
<div class="notification error">
				<p>Аккаунт не найден</p>
			</div>  
<?
	    }
	    else {
?>
		<p class="form-row form-row-wide">
						<label for="password">Код:
							<i class="im im-icon-Lock-2"></i>
							<input class="input-text" type="text" name="code" id="code"/>
						</label>
					</p>
<?

			
$code="Y31619";
$_SESSION['confirm']=array(
    'type'=>'recovery',
    'email'=>$email,
    'code'=>$code,
    );

    $email1="support@tophata.ru";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: ".$email1."\r\n";
        $message .= "Сообщение: ".$text_comment."\n";



        $send = mail($email,'Восстановление пароля',"Код подтверждения: $code", $headers);
			
			
	    }


if ($_SESSION['confirm']['type']=='recovery' and $code1!=''){
    $newpass='12345';
    if ($_SESSION['confirm']['code']!=$code1  ){
    ?>
       <div class="notification error">
				<p>Неверно</p>
			</div> 
    <?
    }
    else {
    
   mysqli_query($con,'Update `users` set `pass`="'.md5($newpass).'" where `email`="'.$_SESSION['confirm']['email'].'"');
   unset($_SESSION['confirm']);
   ?>
   <div class="notification success">
				<p>Новый пароль: <?=$newpass ?></p>
			</div>  
   <?
}
}

?>


