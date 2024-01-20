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
    <script src="js/validateform.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
  <?php include ("CSS/update.css"); ?>
    </style>
</head>
<body>
<div class="container-fluid">

<!-- DataTales Example -->

        <h6> Update customer </h6>
    <?php

        if(isset($_POST['edit_btn']))
        {
            $id = $_POST['edit_id'];
            
            $query = "SELECT * FROM customers WHERE id='$id' ";
            $query_run = mysqli_query($con, $query);

            foreach($query_run as $row)
            {
                ?>
                <form action="customerfunction.php" method="POST">

                      <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                   <div class="form-group">
                      <label> Customer Name </label>
                      <input type="text" name="edit_name" value="<?php echo $row['customer_name'] ?>" class="form-control" oninvalid="Invalidname1(this);" 
                   oninput="Invalidname1(this);" required="required">
                    </div>
                 
                 <div class="form-group">
                   <label>Contact No</label>
                   <input type="text" name="edit_contact" value="<?php echo $row['contact'] ?>"class="form-control"   oninvalid="Invalidcontact(this);" 
                   oninput="Invalidcontact(this);" required="required"  >
                </div>
               <div class="form-group">
                  <label>Address</label>
                   <input type="text" name="edit_address" value="<?php echo $row['address'] ?>"class="form-control"oninvalid="Invalidname(this);" 
                   oninput="Invalidname(this);"required="required">
                </div>
               <a href="dashboard.php" class="btn btn-danger" > CANCEL </a>
                 <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
        </form>
      
      <?php
            }
        }
    ?>
    </div>
</body>
</html>
