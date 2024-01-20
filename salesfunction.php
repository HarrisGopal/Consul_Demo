<?php
include('config.php');
        if(isset($_POST["submit"])){
          // $invoice_no=$_POST["invoice_no"];
          $invoice_date=date("Y-m-d",strtotime($_POST["invoice_date"]));
          $cname=mysqli_real_escape_string($con,$_POST["cname"]);
          $caddress=mysqli_real_escape_string($con,$_POST["caddress"]);
          $contact=$_POST["contact"];
          $grand_total=mysqli_real_escape_string($con,$_POST["grand_total"]);
          
          $sql="insert into invoice_customer (INVOICE_DATE,CNAME,CADDRESS,CONTACT,GRAND_TOTAL) values ('{$invoice_date}','{$cname}','{$caddress}','{$contact}','{$grand_total}') ";
          if($con->query($sql)){
            $sid=$con->insert_id;
            
            $sql2="insert into invoice_products (SID,PNAME,PRICE,QTY,TOTAL) values ";
            $rows=[];
            for($i=0;$i<count($_POST["pname"]);$i++)
            {
              $pname=mysqli_real_escape_string($con,$_POST["pname"][$i]);
              $price=mysqli_real_escape_string($con,$_POST["price"][$i]);
              $qty=mysqli_real_escape_string($con,$_POST["qty"][$i]);
              $total=mysqli_real_escape_string($con,$_POST["total"][$i]);
              $rows[]="('{$sid}','{$pname}','{$price}','{$qty}','{$total}')";
            }
            $sql2.=implode(",",$rows);
            if($con->query($sql2)){
              echo "<div class='alert alert-success'>Invoice Added Successfully. <a href='print.php?id={$sid}' target='_BLANK'>Click </a> here to Print Invoice </div> ";
            }else{
              echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
            }
          }else{
            echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
          }
        }
else if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM invoice_products WHERE ID = '$id'";
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