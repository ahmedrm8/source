<?php 

extract($_POST);

include "../admin/functions/connect.php";

$insert = "INSERT INTO messages (name , phone , email , message ) VALUES ('$name' , '$phone' , '$email' , '$message')";

if ($conn->query($insert)){
    echo "<div class='alert alert-success'>message sent successfully</div>";
}else {
    echo $conn -> error ;
}

