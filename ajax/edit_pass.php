<?
session_start();
  require_once('../connect.php');

    $id=$_SESSION['id'];
    $login=$_POST['name'];
    $pass=$_POST['pass'];
    $role=$_POST['role'];
    $role='user';
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];

 if ( $pass1 ==$pass2) {

    $insert=mysqli_query($con,"UPDATE users set    pass=md5('$pass1'), role='$role' where  id='$id' ");

       echo "<div class='notification success large margin-bottom-35' style='margin-top:10px;'>
	    <p>Пароль изменен</p>
	</div>";

  }else {
      echo "<div class='notification error large margin-bottom-35' style='margin-top:10px;'>
  
	    <p>Пароли не совпадают</p>
	</div>";

 }mysqli_close($con);

?>