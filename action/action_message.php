<?
session_start();
require_once('connect.php');
    $q=mysqli_query($con,"SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r=mysqli_fetch_array($q);



     if ($_SESSION['id']==''){
                          echo "<div class='notification error'>Авторизуйтесь для отправки</div>";
                       exit();
                   }


if(isset($_POST)){
    if(empty($_POST['mess'])){
        echo "Введите";
    }else{
        $author=$_POST['author'];
          $poluchatel=$_POST['poluchatel'];
            $mess=$_POST['mess'];
            $data=date("d-m-y В H:i");
            $ready=0;
            $author=mysqli_real_escape_string($con,$author);
             $poluchatel=mysqli_real_escape_string($con,$poluchatel);
                  $mess=mysqli_real_escape_string($con,$mess);
                   $mess=htmlspecialchars($mess);
              
             
                     $query_2="INSERT INTO dialog(author, poluchatel, mess, data)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
                     echo "<div class='notification success'>Сообщение отправлено</div>";
                   $result_2=mysqli_query($con,$query_2) or die (mysqli_error($con));
                    $q_2=mysqli_query($con,"SELECT * FROM messages WHERE author='{$_SESSION['id']}' AND poluchatel='$poluchatel'");
    $r_2=mysqli_fetch_array($q_2);
    if($r_2['id']==''){
                   $query="INSERT INTO messages(author, poluchatel, mess, data)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
                   $result=mysqli_query($con,$query) or die (mysqli_error($con));
    }else{
        mysqli_query($con,"UPDATE messages SET mess='$mess', data='$data' WHERE poluchatel='$poluchatel' and author='{$_SESSION['id']}' ");
    }
    
    }
    
}

?>
