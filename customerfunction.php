<?php
include('config.php');

if(isset($_POST['registerbtn']))
{
    $customer_name = $_POST['customername'];
    $contact = $_POST['contact'];
    $address  = $_POST['address'];
    

            $query = "INSERT INTO customers (customer_name,contact,address) VALUES ('$customer_name','$contact','$address')";
            $query_run = mysqli_query($con, $query);
                    
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "customer Added";
                $_SESSION['status_code'] = "success";
                header('Location: dashboard.php');
            }
            else 
            {
                $_SESSION['status'] = "customer Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: dashboard.php');  
            }
}
else if(isset($_POST['updatebtn']))
{   
    $id=$_POST['edit_id'];
    $customer_name = $_POST['edit_name'];
    $contact = $_POST['edit_contact'];
    $address = $_POST['edit_address'];

    $query = "UPDATE customers SET customer_name='$customer_name', contact='$contact', address='$address' WHERE id='$id' ";
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

    $query = "DELETE FROM customers WHERE id='$id'";
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