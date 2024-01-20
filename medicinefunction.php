<?php
include('config.php');

if(isset($_POST['registerbtn']))
{
    $medicine_name = $_POST['medicinename'];
    $packing = $_POST['packing'];
    $generic_name = $_POST['generic'];
    $supplier_name = $_POST['supplier'];
    $price=$_POST['price'];
    $register_date  = date("Y/m/d");
    $expire_date   = date($_POST['expiredate']);
    

            $query = "INSERT INTO medicines (medicine_name,packing,generic_name,supplier_name,price) VALUES ('$medicine_name','$packing',' $generic_name',' $supplier_name','$price')";
            $query_run = mysqli_query($con, $query);

            //manage medicine expire
            $query = "INSERT INTO expire (medicine_name,packing,generic_name,supplier_name,register_date,expire_date) VALUES ('$medicine_name','$packing',' $generic_name',' $supplier_name',' $register_date',' $expire_date')";
            $query_run = mysqli_query($con, $query);
        
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "medcine Added";
                $_SESSION['status_code'] = "success";
                header('Location: dashboard.php');
            }
            else 
            {
                $_SESSION['status'] = "medicine Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: dashboard.php');  
            }
}
else if(isset($_POST['updatebtn']))
{   
    $id=$_POST['edit_id'];
    $medicine_name = $_POST['edit_name'];
    $packing = $_POST['edit_packing'];
    $generic_name = $_POST['edit_generic'];
    $supplier_name = $_POST['edit_supplier'];
    $price=$_POST['edit_price'];

    $query = "UPDATE medicines SET medicine_name='$medicine_name', packing='$packing', generic_name='$generic_name',supplier_name='$supplier_name',price='$price'  WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: dashboard.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: dashboard.php'); 
    }
}
else if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE medicines,expire FROM medicines INNER JOIN expire WHERE medicines.id = expire.id and medicines.id='$id'";
    $query_run = mysqli_query($con, $query);
  

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: dashboard.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: dashboard.php'); 
    }    
}



?>