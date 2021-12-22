<?
session_start();
require_once('connect.php');
$id=$_POST['id_user'];	
$uploadDir = "uploads/"; 
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
$ploshad=$_POST['ploshad'];
$rooms=$_POST['rooms'];
$floor=$_POST['floor'];
$point=$_POST['point'];
$fileName = basename($_FILES['file']['name']); 
$uploadFilePath = $uploadDir.$fileName; 
$dogovor='uploads/Договор.docx';
$conn = new mysqli('localhost', 'strawman_tophata', 'Y31619', 'strawman_tophata');

if ($adres!=''){
$sql = "INSERT INTO room (id_city,id_user,adres,ploshad,rooms,text,floor,price,price_m,people,dogovor,wifi,point,condi,wash,micro,shows) 
values ('$city','$id','$adres','$ploshad','$rooms','$text','$floor','$price','$price_m','$people','$dogovor','$wifi','$point','$condi','$wash','$micro','1')";
}
	$run=mysqli_query($con, $sql);
	$s = "SELECT id_room FROM room ORDER BY id_room DESC LIMIT 1";
	$s = mysqli_query($con,$s);
  	while ($row = mysqli_fetch_array($s)) {
       
	  $id_room=$row['id_room'];
	  }	
	   
	    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 

	        $sql2 = "INSERT INTO images (id_room, name_image) VALUES ('$id_room', '$fileName')"; 
	        $insert = $con->query($sql2);
		    var_dump($fileName);
			var_dump($_FILES);
			echo "img: " . $insert . "<br>" . mysqli_error($con);
	}

$target_dir = "uploads/"; 

$request = 1;
if(isset($_POST['request'])){ 
  $request = $_POST['request'];
}

if($request == 1){ 
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $msg = ""; 
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $msg = ""; 
  }else{    
    $msg = ""; 
  } 
  echo $msg;
  exit;
}

if($request == 2){ 
  $filename = $target_dir.$_POST['name'];  
  unlink($filename); 
     $sql3 = "Delete from  images where  id_room='$id_room'"; 
	        $delete = $con->query($sql3);
  exit;
}
?>
