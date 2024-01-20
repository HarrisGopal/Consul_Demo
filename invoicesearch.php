<?php
include'function.php';
$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
     $stmt =$conn->prepare("SELECT * FROM invoice_customer WHERE CONTACT LIKE '%$search%'");
     
}
else{
    $stmt =$conn->prepare("SELECT * FROM invoice_customer");
}
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0){
    $output=" <thead class='table-dark'>
    <tr>
    <th>Invoice No </th>
    <th> Invoice Date </th>
    <th>Customer Name </th>
    <th>Customer Address</th>
    <th>Contact</th>
    <th>Total</th>
    <th>DELETE</th>
     </tr>
     </thead>
     <tbody>";
     while($row=$result->fetch_assoc()){
        $output.="<tr>
        <td>".$row['INVOICE_NO']."</td>
        <td>".$row['INVOICE_DATE']."</td>
        <td>".$row['CNAME']."</td>
        <td>".$row['CADDRESS']."</td>
        <td>".$row['CONTACT']."</td>
        <td>".$row['GRAND_TOTAL']."</td>
        <td>
            <form action='invoicefunction.php' method='post'>
                <input type='hidden' name='delete_id' value='".$row['INVOICE_NO']."'>
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