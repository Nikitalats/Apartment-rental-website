<?
 
session_start();
require_once('..//connect.php');
$id=$_SESSION['id'];
$id_user=$_POST['id_user'];
$dogovor = $_POST['dogovor'];

if ($_FILES['dogovor']['size'] > 0){
    
$dir5 ="..//users/user".$id_user."/"; 

$dir1  = $dir5 . basename($_FILES['dogovor']['name']); 

$bd5 ="users/user".$id_user."/"; 

$dir3  = $bd5 . basename($_FILES['dogovor']['name']); 

$za=$dir1;

$doc_tmp = $_FILES['dogovor']['tmp_name'];

    move_uploaded_file($doc_tmp, $za);
    $insert = "UPDATE users SET dogovor='$dir3' WHERE id='$id_user'";
    $run = mysqli_query($con, $insert);
}
 


