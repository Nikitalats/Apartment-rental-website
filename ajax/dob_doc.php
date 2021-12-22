<?php
require_once('../connect.php');
$id_room = mysqli_real_escape_string($con, $_POST['id_room']);
$status = 'approve'; 
$insert = "UPDATE room
                   SET status='$status' WHERE id_room='$id_room'";
$run = mysqli_query($con, $insert);
echo "Error: " . $id_room . "<br>" . mysqli_error($con);
?>
         