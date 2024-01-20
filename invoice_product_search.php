<?php
include'function.php';
$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stmt =$conn->prepare("SELECT price FROM medicines WHERE medicine_name LIKE '$search'");
    $stmt->execute();
    $result=$stmt->get_result();
if($result->num_rows>0){
     while($row=$result->fetch_assoc()){
        $output.=$row['price'];
                 
     }
     echo $output;
}
else{
  echo "";
}
}

   
?>
