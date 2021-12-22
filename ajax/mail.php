<?php

    $name = $_POST["namee"];
    $email = $_POST["email"];
    $phone = $_POST["tema"];
    $text_comment = $_POST["messagess"];
    $email1="support@tophata.ru";

    if($name=="" or $email=="" or $phone=="" or $text_comment==""){ 
      echo "<div class='notification error large margin-bottom-35'  style='margin-top:10px;'>
	    <p>Заполните все поля</p>
	</div>";
 }

    else{

        $to = "n.latsviev@yandex.ru"; 
        $subject = "Письмо с обратной связи"; 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: ".$email1."\r\n";


        $message .= "Имя пользователя: ".$name."\n";
        $message .= "Почта: ".$email."\n";
        $message .= "Тема: ".$phone."\n";
        $message .= "Сообщение: ".$text_comment."\n";



        $send = mail($to, $subject, $message, $headers);


        if ($send == "true")
        {
            echo "<div class='notification success large margin-bottom-35' style='margin-top:10px;'>
  
	    <p>Письмо отправлено</p>
	</div>";
        }
        else
        {
            echo "Не удалось отправить, попробуйте снова!";
        }
    }

?>