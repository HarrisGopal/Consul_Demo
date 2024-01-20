<?php
include'function.php';
$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
     $stmt =$conn->prepare("SELECT * FROM medicines WHERE medicine_name LIKE '%$search%'");
     
}
else{
    $stmt =$conn->prepare("SELECT * FROM medicines");
}
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0){
    $output=" <thead class='table-dark'>
    <tr>
        <th> ID </th>
        <th> Medicine Name </th>
        <th>Packing </th>
        <th>Generic Name</th>
        <th>Supplier</th>
        <th>Price</th>
        <th>EDIT</th>
        <th>DELETE</th>
     </tr>
     </thead>
     <tbody>";
     while($row=$result->fetch_assoc()){
        $output.="<tr>
        <td>". $row['id']."</td>
        <td>". $row['medicine_name']."</td>
        <td>". $row['packing']."</td>
        <td>".$row['generic_name']."</td>
        <td>".$row['supplier_name']."</td>
        <td>".$row['price']."</td>
        <td>
            <form action='updatemedicine.php' method='post'>
                <input type='hidden' name='edit_id' value='<".$row['id']."'>
                <button type='submit' name='edit_btn' class='btn btn-success'> Edit</button>
            </form>
        </td>
        <td>
            <form action='medicinefunction.php' method='post'>
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