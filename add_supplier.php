<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="CSS/sidenav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/validateform.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="js/validate.js"></script> -->
    <title>Document</title>
    <style>
  <?php include ("CSS/add.css"); ?>
    </style>
</head>
<body>
   <?php include("sidenav.html"); ?>
  <h2>Add supplier</h2>
      <form action="supplierfunction.php" method="POST" id="myForm" >
            <div class="form-group">
                <label> Supplier name :</label>
                <input type="text" name="suppliername" class="form-control" placeholder="Enter supplier name" id="supplier_name"oninvalid="Invalidname1(this);" 
                   oninput="Invalidname1(this);"required="required">
            </div>
            <div class="form-group">
                <label>Supplier Email :</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter email" id="emailadd"  oninvalid="Invalidemail(this);" 
                   oninput="Invalidemail(this);" required="required">

            </div>
            <div class="form-group">
                <label>Supplier Contact Number :</label>
                <input type="text" name="contact" class="form-control" placeholder="Enter contact no" id="contactno"
                oninvalid="Invalidcontact(this);" 
                   oninput="Invalidcontact(this);" required="required">
               
            </div>
            <div class="form-group">
                <label>Supplier Address :</label>
                <input type="text" name="address" class="form-control" placeholder="address" id="Address"oninvalid="Invalidname(this);" 
                   oninput="Invalidname(this);"required="required">
            </div>
            <div class="form-group">
            <button type="submit" name="registerbtn" class="btn btn-primary" id="save">Save</button>
        </div>
        <!-- <div class="form-group">
            <button type="submit" name="registerbtn" class="btn btn-primary" class="allowed-submit" id="save" disabled="disabled">Save</button>
        </div> -->
      </form>
</body>
</html>
