<?php
require_once '..//vendor/autoload.php';
require_once '..//connect.php';
require_once '..//sms.ru.php';
$number  =$_POST['id_reserve'];
$id_user = $_POST['id_user'];
$user_email=mysqli_query($con,"Select * from users where id='$id_user'");
while ($row=mysqli_fetch_array($user_email)){
    $to=$row['email'];
    $dogovor=$row['dogovor'];
}
$format='.docx';
$document = new \PhpOffice\PhpWord\TemplateProcessor('..//users/user'.$id_user.'/editdogovor1'.$number.$format);
		
$number  =$_POST['id_reserve'];
$uploadDir =  __DIR__;
$outputFile1 = 'dogovor';
$format='.docx';
$home = $_SERVER['DOCUMENT_ROOT']."/";
$outputFile.= $outputFile1 . $number . $format;
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
$document->saveAs('..//users/user'.$id_user.'/'.$outputFile);
$downloadFile = $outputFile;
header("Location: https://tophata.ru/booking.php");
