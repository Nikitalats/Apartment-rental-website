<?
session_start();
include("connect.php");
$author=$_POST['author'];
$poluchatel=$_POST['poluchatel'];

if(!$_SESSION['id']){
    
}else{
    $q=mysqli_query($con,"SELECT * FROM users WHERE id='{$_SESSION['id']}'") or die (mysqli_error($con));  
    $r=mysqli_fetch_array($q);
    $name=$r['name'];
}
if(isset($_POST)){
    if(empty($_POST['textarea'])){

    }else{
        $author=$_POST['author'];
          $poluchatel=$_POST['poluchatel'];
     
          $textarea=$_POST['textarea'];
          date_default_timezone_set("UTC"); 
          $time = time(); 
          $offset = 5; 
          $time += 5 * 3600;
          $data=date("d.m.y В H:i",$time);
          $author=mysqli_real_escape_string($con,$author);
          $poluchatel=mysqli_real_escape_string($con,$poluchatel);
          $mess=$_POST['textarea'];
          
                    $t=mysqli_query($con,"SELECT * FROM messages WHERE author='{$_SESSION['id']}' and poluchatel='$poluchatel'");
                    $comm="SELECT * FROM dialog WHERE author='{$_SESSION['id']}' and poluchatel='$poluchatel' and data='$data'";
                    $w=mysqli_fetch_array($t);
                    if($w['id']==""){
                      $query_3="INSERT INTO messages(author, poluchatel, mess, data)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
                   $result_3=mysqli_query($con,$query_3) or die (mysqli_error($con));    
                    }
                    else{
                    mysqli_query($con,"UPDATE messages SET mess='$mess', data='$data' WHERE author='{$_SESSION['id']}'");
                    }
                     $query_2="INSERT INTO dialog(author, poluchatel, mess, data)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
                   $result_2=mysqli_query($con,$query_2) or die (mysqli_error($con)); 
                             
                    
    }
   
}




?>
<? if ($textarea!='') {?>
     <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                             
                                     <li class="chat-left">
                                    <div class="chat-avatar">
                                        <img src="images/avatar.jpg" alt="Retail Admin">
                                        <div class="chat-name" style="font-size:12px;"><? echo "$name";  ?></div>
                                    </div>
                                        <div class="received_msg">
                <div class="received_withd_msg">
                  <p  style="font-size:16px;">    <?=$mess?></p>
                  <span class="time_date">   <?=$data?></span></div>
              </div>
                                
                                </li> 

                            
                                </ul>
                        
                            </div>
<?}?>

 
