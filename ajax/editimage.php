<?
session_start();
require_once('..//connect.php');
$id_user=$_SESSION['id'];	
$uploadDir = "..//uploads/"; 
$adres=$_POST['adres'];
$text=$_POST['text'];
$price=$_POST['price'];
$city=$_POST['city'];				
$wifi=$_POST['wifi'];
$condi=$_POST['condi'];	
$micro=$_POST['micro'];
$wash=$_POST['wash'];
$people=$_POST['people'];	
$price_m=$_POST['price_m'];
$id_room=$_POST['id_room']; 
$fileName = basename($_FILES['file']['name']); 
$uploadFilePath = $uploadDir.$fileName; 
$filename1 =$_POST['name']; 
$target_dir = "..//uploads/"; 
  
$request = 1;
if(isset($_POST['request'])){ 
  $request = $_POST['request'];
  $fileName = basename($_FILES['file']['name']); 
}

if($request == 1){ 
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileName = basename($_FILES['file']['name']); 
  $msg = ""; 
      if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 

          $sql2 = "INSERT INTO images (id_room, name_image) VALUES ('".$id_room."', '".$fileName."')"; 
          $insert = $con->query($sql2);
      
echo "img: " . $insert . "<br>" . mysqli_error($con);
  }
else{    
    $msg = ""; 
  } 
  echo $msg;
  exit;
}
$filename = $target_dir.$_POST['name'];  
$fileName1 = basename($_FILES['file']['name']); 
unlink($filename); 
$sql3 = "Delete from  images where  id_image='$id_room'"; 
$insert3 = $con->query($sql3);
$filename = $_POST['name'];
echo " $filename ";
$sql4 =mysqli_query($con, "SELECT * from images Where name_image='$filename'");  
while ($row=mysqli_fetch_array($sql4)){
$id_img=$row['id_image'];
}
$sql5=mysqli_query($con, "Delete from  images where  id_image='$id_img'"); 
echo "img: " . $sql4 . "<br>" . mysqli_error($con);
exit;
?>