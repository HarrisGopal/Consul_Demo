<?php
include('config.php');
include('medicinefunction.php');
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
    <script src="js/validateform.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
  <?php include ("CSS/add.css"); ?>
    </style>
</head>
<body>
   <?php include("sidenav.html"); ?>
  <h2>Add medicine</h2>
  <center><div id="tt1" style="color:red";></div></center>
      <form action="medicinefunction.php" method="POST" >
            <div class="form-group">
                <label> Medicine name </label>
                <input type="text" name="medicinename" class="form-control" placeholder="Enter medicine name" oninvalid="Invalidname(this);" 
                   oninput="Invalidname(this);" required="required">
            </div>
            <div class="form-group">
                <label>Packing no</label>
                <input type="number" name="packing" class="form-control checking_email" placeholder="Enter packing" oninvalid="Invalidpack(this);" 
                   oninput="Invalidpack(this);" required="required">
            </div>
            <div class="form-group">
                <label>Generic name</label>
                <input type="text" name="generic" class="form-control" placeholder="Enter generic name"oninvalid="Invalidname(this);" 
                   oninput="Invalidname(this);" required="required">
            </div>
            <div class="form-group">
                <label>Supplier name</label>
                <input type="text" name="supplier" class="form-control" placeholder="enter supplier name"oninvalid="Invalidname1(this);" 
                   oninput="Invalidname1(this);" required="required">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="enter supplier"oninvalid="Invalidpack(this);" 
                   oninput="Invalidpack(this);" required="required">
            </div>
            <div class="form-group">
                <label>expire date</label>
                <input type="date" name="expiredate" class="form-control" id="expiredate"  required>
            </div>
        <div class="form-group">
            <button type="submit" name="registerbtn" class="btn btn-primary" id="save">Save</button>
        </div>
      </form>

     
</body>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate()+1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#expiredate').attr('min', maxDate);
});
</script>
</html>
