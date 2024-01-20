<?php
include'function.php';
$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
     $stmt =$conn->prepare("SELECT * FROM customers WHERE customer_name LIKE '%$search%'");
     
}
else{
    $stmt =$conn->prepare("SELECT * FROM customers");
}
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0){
    $output=" <thead class='table-dark'>
    <tr>
    <th> ID </th>
    <th> Customer Name </th>
    <th>Contact No</th>
    <th>Address</th>
    <th>EDIT</th>
    <th>DELETE</th>
     </tr>
     </thead>
     <tbody>";
     while($row=$result->fetch_assoc()){
        $output.="<tr>
        <td>". $row['id']."</td>
        <td>". $row['customer_name']."</td>
        <td>". $row['contact']."</td>
        <td>".$row['address']."</td>
        <td>
            <form action='updatecustomer.php' method='post'>
                <input type='hidden' name='edit_id' value='<".$row['id']."'>
                <button type='submit' name='edit_btn' class='btn btn-success'> Edit</button>
            </form>
        </td>
        <td>
            <form action='customerfunction.php' method='post'>
                <input type='hidden' name='delete_id' value='". $row['id']."'>
                <button type='submit' name='delete_btn' class='btn btn-danger'> Delete</button>
            </form>
        </td>
    </tr>";
     }
     $output.="</tbody>";
     echo $output;
}
else{
    echo "<h3> no record</h3>";
}
   
?>