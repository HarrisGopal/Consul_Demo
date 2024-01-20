<?php
include'function.php';
$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stmt =$conn->prepare("SELECT customer_name,address FROM customers WHERE contact LIKE '$search'");
    $stmt->execute();
    $result=$stmt->get_result();
if($result->num_rows>0){
     while($row=$result->fetch_assoc()){
        $output.=" <div class='form-group'>
        <label>Name</label>
        <input type='text' name='cname'  required class='form-control'value='".$row['customer_name']."'>
      </div>
      <div class='form-group'>
        <label>Address</label>
        <input type='text' name='caddress' required class='form-control'value='".$row['address']."'>
      </div> ";
     }
     echo $output;
}
else{
  echo " <div class='form-group'>
  <label>Name</label>
  <input type='text' name='cname'  required class='form-control'>
</div>
<div class='form-group'>
  <label>Address</label>
  <input type='text' name='caddress' required class='form-control'>
</div>";
}
}

   
?>
