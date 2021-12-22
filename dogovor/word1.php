<?php
require_once 'vendor/autoload.php';
require_once 'connect.php';
require_once 'sms.ru.php';
$number  =$_POST['id_reserve'];
$id_user  =$_POST['id_user'];
$dogovor_arendatel='approve';
$user_email=mysqli_query($con,"Select * from users where id='$id_user'");
while ($row=mysqli_fetch_array($user_email)){
    $to=$row['email'];
    $dogovor=$row['dogovor'];
}
$insert="Update reserve  set dogovor_arendatel='1' where id_reserve='$number' ";
$run=mysqli_query($con, $insert);  
$outputFile1 = 'dogovor';
$format='.docx';
$File.= 'users/user'.$id_user.'/'.$outputFile1 . $number . $format;

$document = new \PhpOffice\PhpWord\TemplateProcessor($File);
$document1 = new \PhpOffice\PhpWord\TemplateProcessor($dogovor);
$uploadDir =  __DIR__;
$outputFile2 = 'editdogovor';
$format='.docx';
$outputFile.= $outputFile1 . $number . $format;
$outputFile3.= $outputFile2 . $number . $format;
$birth1 = $_POST['birth1'];
$name1 = $_POST['fio1'];
$adres1 = $_POST['adres1'];
$seria1 = $_POST['seria1'];
$nomer1= $_POST['nomer1'];
$vidan1 = $_POST['vidan1'];
$ylica = $_POST['ylica'];
$dom = $_POST['dom'];
$kvartira = $_POST['kvartira'];
$telephone = $_POST['telephone'];
$summa = $_POST['summa'];
$day = $_POST['d'];
$month = $_POST['m'];
$datearrive= $_POST['datearrive'];
$dateleave= $_POST['dateleave'];
$rooms= $_POST['rooms'];
$city= $_POST['id_city'];
$adres = $_POST['adres'];



$smsru = new SMSRU('68505468-4323-C86B-17A5-5D7045B3B797'); 

$data = new stdClass();
$data->to = '79125898343';
$data->text = 'Договор заполнен'; 

setcookie("adres1", $adres1, time() + 3600);  
setcookie("name1", $name1, time() + 3600);  
setcookie("birth1", $birth1, time() + 3600); 
setcookie("seria1", $seria1, time() + 3600);  
setcookie("nomer1", $nomer1, time() + 3600);  
setcookie("vidan1", $vidan1, time() + 3600);  
setcookie("ylica", $ylica, time() + 3600); 
setcookie("dom", $dom, time() + 3600); 
setcookie("summa", $summa, time() + 3600);  
setcookie("kvartira", $kvartira, time() + 3600); 
setcookie("telephone", $telephone, time() + 3600);  
$document->setValue('fio1', $name1);
$document->setValue('birth1', $birth1);
$document->setValue('adres1', $adres1);
$document->setValue('seria1', $seria1);
$document->setValue('nomer1', $nomer1);
$document->setValue('vidan1', $vidan1);
$document->setValue('ylica', $ylica);
$document->setValue('dom', $dom);
$document->setValue('kvartira', $kvartira);
$document->setValue('summa', $summa);
$document->setValue('tele1', $telephone);
$document1->setValue('city', $city);
$document1->setValue('rooms', $rooms);
$document1->setValue('date', $datearrive);
$document1->setValue('date1', $dateleave);
$document1->setValue('d', $day);
$document1->setValue('m', $month);
$document1->setValue('tele', $tel);
$document1->setValue('fio1', $name1);
$document1->setValue('birth1', $birth1);
$document1->setValue('adres1', $adres1);
$document1->setValue('seria1', $seria1);
$document1->setValue('nomer1', $nomer1);
$document1->setValue('vidan1', $vidan1);
$document1->setValue('ylica', $ylica);
$document1->setValue('dom', $dom);
$document1->setValue('kvartira', $kvartira);
$document1->setValue('summa', $summa);
$document1->setValue('tele1', $telephone);
$document->saveAs('users/user'.$id_user.'/'.$outputFile);
$document1->saveAs('users/user'.$id_user.'/'.$outputFile3);
$downloadFile = $outputFile;
header("Content-Type: application/octet-stream");
header("Accept-Ranges: bytes");
header("Content-Length: ".filesize($downloadFile));
header("Content-Disposition: attachment; filename=".$outputFile);  
readfile('users/user'.$id_user.'/'.$downloadFile);
header("Location: booking.php");



