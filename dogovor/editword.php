<?php

require_once '..//vendor/autoload.php';
require_once '..//connect.php';

$number  =$_POST['id_reserve'];
$id_user = $_POST['id_user'];


$user_email=mysqli_query($con,"Select * from users where id='$id_user'");

while ($row=mysqli_fetch_array($user_email)){
    $to=$row['email'];
    $dogovor=$row['dogovor'];
}

$format='.docx';

$document = new \PhpOffice\PhpWord\TemplateProcessor('..//users/user'.$id_user.'/editdogovor'.$number.$format);

$number  =$_POST['id_reserve'];
$uploadDir =  __DIR__;
$outputFile1 = 'dogovor';

$format='.docx';

$home = $_SERVER['DOCUMENT_ROOT']."/";


$outputFile.= $outputFile1 . $number . $format;


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
$document->saveAs('..//users/user'.$id_user.'/'.$outputFile);
$downloadFile = $outputFile;
header("Accept-Ranges: bytes");
header("Content-Disposition: attachment; filename=".'users/user'.$id_user.'/'.$downloadFile);  
header("Location: https://tophata.ru/booking.php");
