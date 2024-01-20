<?php
include('config.php');

if(isset($_POST['registerbtn']))
{
    $supplier_name = $_POST['suppliername'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact'];
    $address = $_POST['address'];

            $query = "INSERT INTO suppliers (supplier_name,email,contact_no,address) VALUES ('$supplier_name','$email',' $contact_no',' $address')";
            $query_run = mysqli_query($con, $query);
        
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "supplier Added";
                $_SESSION['status_code'] = "success";
                header('Location: dashboard.php');
            }
            else 
            {
                $_SESSION['status'] = "supplier Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: dashboard.php');  
            }
}
else if(isset($_POST['updatebtn']))
{   
    $id=$_POST['edit_id'];
    $supplier_name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $contact_no = $_POST['edit_contact'];
    $address = $_POST['edit_address'];

    $query = "UPDATE suppliers SET supplier_name='$supplier_name', email='$email', contact_no='$contact_no',address='$address' WHERE id='$id' ";
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

    $query = "DELETE FROM suppliers WHERE id='$id'";
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