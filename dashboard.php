<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard - Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="CSS/sidenav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      <?php include("CSS/dash.css");?>
    </style>
  </head>
  <body style="overflow:hidden">

    <?php include("sidenav.html");?>

     <a role="button" class="btn btn-primary" id="dashbt1" href="manage_medicine.php">
      <?php
                
                $query = "SELECT id FROM medicines ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1> '.$row.'</h1>';
            ?>
           <span>Total Medicine</span></a>
          
           <a role="button" class="btn btn-primary" id="dashbt4" href="manage_customer.php">
      <?php
                
                $query = "SELECT id FROM customers ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1> '.$row.'</h1>';
            ?>
           <span>Total Customers</span></a>
           <a role="button" class="btn btn-primary" id="dashbt2" href="manage_supplier.php">
      <?php
                
                $query = "SELECT id FROM suppliers ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1> '.$row.'</h1>';
            ?>
           <span>Total Suppliers</span></a>
           <a role="button" class="btn btn-primary" id="dashbt7" href="manageinvoice.php">
      <?php
                
                $query = "SELECT INVOICE_NO FROM invoice_customer ORDER BY INVOICE_NO";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1> '.$row.'</h1>';
            ?>
           <span>Total invoice</span></a>
           
           <a role="button" class="btn btn-primary" id="dashbt9" href="Salesreport.php">
      <?php
                
                $query = "SELECT SUM(TOTAL) AS Total
                FROM invoice_products";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($query_run);
                echo '<h1> '.$row['Total'].'</h1>';
            ?>
           <span>Sales Amount</span></a>
           <a role="button" class="btn btn-primary" id="dashbt3" href="manage_stock.php">
      <?php
                $query = "SELECT id FROM expire WHERE expire_date <= curdate() ";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1> '.$row.'</h1>';
            ?>
           <span> Medicine expired</span></a>

           <a role="button" class="btn " id="dash1" href="add_medicine.php">
           <img id="img1" src="svg/medicne.svg" alt="" width="50px"><br>
             <span>Add Medicine</span></a> 

             <a role="button" class="btn " id="dash1" href="add_supplier.php">
           <img id="img1" src="svg/medicne.svg" alt="" width="50px"><br>
             <span>Add Supplier</span></a> 

             <a role="button" class="btn " id="dash1" href="add_customer.php">
           <img id="img1" src="svg/medicne.svg" alt="" width="50px"><br>
             <span>Add Customer</span></a> 

             <a role="button" class="btn " id="dash1" href="add_new_invoice.php">
           <img id="img1" src="svg/medicne.svg" alt="" width="50px"><br>
             <span>Add Invoice</span></a> 
      
  </body>
</html>


