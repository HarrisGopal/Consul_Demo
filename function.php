<?php
$conn=new mysqli("localhost","root","","medicaldata");
if($conn->connect_error){
    die("connect Failed".$conn->connect_error);
}
?>
