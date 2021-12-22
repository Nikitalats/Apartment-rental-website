<?
 
session_start();
require_once('connect.php');
$id=$_SESSION['id'];
$id_user=$_POST['id_user'];
  if  ($id_user==$id){

        $name= $_POST['name'];
        $tele = $_POST['tele'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $vk = $_POST['vk'];
        $instagram = $_POST['instagram'];
        $uploadDir = "images/"; 
        $dogovor = $_POST['dogovor'];
}

if ($dogovor!='null' and $_FILES['dogovor']['size'] > 0){
    
    
    
    $home = $_SERVER['DOCUMENT_ROOT']."/";


$dir = $home . "/users/user".$id_user; 


mkdir($dir, 0777);

$dir5 ="users/user".$id_user."/"; 

$dir1  = $dir5 . basename($_FILES['dogovor']['name']); 
$za=$dir1;
echo $za;

    $doc_tmp = $_FILES['dogovor']['tmp_name'];

    move_uploaded_file($doc_tmp, $za);

}

if ($_FILES['image']['size'] > 0) {
$image  = $uploadDir . basename($_FILES['image']['name']); 
$uploadFilePath = $image; 


    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, $uploadFilePath);
        $insert = "UPDATE `users`
                   SET `name`='" . $name . "',
                   `telephone`='" . $tele . "'
                     , `email`='" . $email . "'
                 
                     , `images`='" . $image. "'
                   WHERE `id`=" . $id_user;
    $run = mysqli_query($con, $insert);
 
}
    $insert = "UPDATE `users`
                   SET `name`='" . $name . "',
                   `telephone`='" . $tele . "'
                     , `email`='" . $email . "'
                  , `vk`='" . $vk . "'
                            , `facebook`='" . $facebook . "'
                                    , `instagram`='" . $instagram . "'
                                  , `dogovor`='" . $dir1  . "'
                   WHERE `id`=" . $id_user;
    $run = mysqli_query($con, $insert);

echo "<script>window.open('https://tophata.ru/my-profile.php?id=$id','_self');</script>";

?>
