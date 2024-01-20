<?php
     include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/validateform.js" type="text/javascript"></script>
    <title>Document</title>
    <style>
  <?php include ("CSS/update.css"); ?>
    </style>
</head>
<body>
<div class="container-fluid">

<!-- DataTales Example -->

        <h6> Update medicine </h6>
    <?php

        if(isset($_POST['edit_btn']))
        {
            $id = $_POST['edit_id'];
            
            $query = "SELECT * FROM medicines WHERE id='$id' ";
            $query_run = mysqli_query($con, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="medicinefunction.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label> Medicine name </label>
                            <input type="text" name="edit_name" value="<?php echo $row['medicine_name'] ?>" class="form-control"
                                placeholder="Enter Username"oninvalid="Invalidname(this);" oninput="Invalidname(this);" required="required" >
                        </div>
                        <div class="form-group">
                            <label>Packing no</label>
                            <input type="text" name="edit_packing" value="<?php echo $row['packing'] ?>" class="form-control"
                                placeholder="Enter pack" oninvalid="Invalidpack(this);" 
                   oninput="Invalidpack(this);" required="required" >
                        </div>
                        <div class="form-group">
                            <label>Generic name</label>
                            <input type="text" name="edit_generic" value="<?php echo $row['generic_name'] ?>"
                                class="form-control" placeholder="generic name"oninvalid="Invalidname(this);" 
                   oninput="Invalidname(this);" required="required">
                        </div>
                        <div class="form-group">
                            <label>Supplier name</label>
                            <input type="text" name="edit_supplier" value="<?php echo $row['supplier_name'] ?>"
                                class="form-control" placeholder="Enter supplier name" oninvalid="Invalidname1(this);" 
                   oninput="Invalidname1(this);" required="required" >
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="edit_price" value="<?php echo $row['price'] ?>" class="form-control"
                                placeholder="Enter price" oninvalid="Invalidpack(this);" 
                   oninput="Invalidpack(this);" required="required" >
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
