<?php

require_once 'vendor/autoload.php';
require_once  'dompdf/autoload.inc.php' ;
require_once 'connect.php';

$number  =$_POST['id_reserve'];
$id_user = $_POST['id_user'];
$dogovor_user='approve';


$user_email=mysqli_query($con,"Select * from users where id='$id_user'");

while ($row=mysqli_fetch_array($user_email)){
    $to=$row['email'];
    $dogovor=$row['dogovor'];
}

$document = new \PhpOffice\PhpWord\TemplateProcessor($dogovor);
$document1 = new \PhpOffice\PhpWord\TemplateProcessor($dogovor);

$insert="Update reserve  set dogovor_user='1' where id_reserve='$number' ";

$run=mysqli_query($con, $insert);  
		
$number  =$_POST['id_reserve'];
$uploadDir =  __DIR__;
$outputFile1 = 'dogovor';
$outputFile2 = 'editdogovor1';
$format='.docx';

$home = $_SERVER['DOCUMENT_ROOT']."/";


$dir = $home . "/users/user".$id_user; 


mkdir($dir, 0777);



$outputFile.= $outputFile1 . $number . $format;

$outputFile3.= $outputFile2 . $number . $format;

$tel = $_POST['telephone'];
$day = $_POST['d'];
$month = $_POST['m'];
$datearrive= $_POST['datearrive'];
$dateleave= $_POST['dateleave'];
$rooms= $_POST['rooms'];
$city= $_POST['id_city'];
$birth = $_POST['birth'];
$name = $_POST['fio'];
$adres = $_POST['adres'];
$seria = $_POST['seria'];
$nomer= $_POST['nomer'];
$vidan = $_POST['vidan'];

setcookie("telephone", $tel, time() + 3600);  
setcookie("birth", $birth, time() + 3600);  
setcookie("fio", $name, time() + 3600);  
setcookie("adres", $adres, time() + 3600); 
setcookie("seria", $seria, time() + 3600);  
setcookie("nomer", $nomer, time() + 3600); 
setcookie("vidan", $vidan, time() + 3600);  

    $email1="support@tophata.ru";
    
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: ".$email1."\r\n";
        $message .= "Сообщение: ".$text_comment."\n";
        $email='nicklats@mail.ru';
        $send = mail($email,'Договор аренды',"Арендатор заполнил <a href='https://tophata.ru/booking.php'>договор</a>", $headers);

$document->setValue('city', $city);
$document->setValue('fio', $name);
$document->setValue('birth', $birth);
$document->setValue('adres', $adres);
$document->setValue('seria', $seria);
$document->setValue('nomer', $nomer);
$document->setValue('vidan', $vidan);
$document->setValue('rooms', $rooms);
$document->setValue('date', $datearrive);
$document->setValue('date1', $dateleave);
$document->setValue('d', $day);
$document->setValue('m', $month);
$document->setValue('tele', $tel);

$document1->setValue('city', $city);
$document1->setValue('fio', $name);
$document1->setValue('birth', $birth);
$document1->setValue('adres', $adres);
$document1->setValue('seria', $seria);
$document1->setValue('nomer', $nomer);
$document1->setValue('vidan', $vidan);
$document1->setValue('rooms', $rooms);
$document1->setValue('date', $datearrive);
$document1->setValue('date1', $dateleave);
$document1->setValue('d', $day);
$document1->setValue('m', $month);
$document1->setValue('tele', $tel);

$document->saveAs('users/user'.$id_user.'/'.$outputFile);

$document1->saveAs('users/user'.$id_user.'/'.$outputFile3);

$downloadFile = $outputFile;

header("Accept-Ranges: bytes");

header("Content-Disposition: attachment; filename=".'users/user'.$id_user.'/'.$downloadFile);  
header("Location: booking.php");

