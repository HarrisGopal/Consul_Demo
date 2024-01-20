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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Document</title>
    <style>
  <?php include ("CSS/manage.css"); ?>
    </style>
</head>
<body>

<h6 >All Medicine</h6>
<div style="position:relative; top:-11rem; margin-left:-7rem">
   <?php include("sidenav.html");?>
</div>
        <div class="table-responsive">
        <?php
            $query = "SELECT * FROM expire";
            $query_run = mysqli_query($con, $query);
        ?>
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th> ID </th>
                        <th> Medicine Name </th>
                        <th>Packing </th>
                        <th>Generic Name</th>
                        <th>Supplier</th>
                        <th>Register Date</th>
                        <th>Expire Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($query_run) > 0)        
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                        <tr>
                            <td><?php  echo $row['id']; ?></td>
                            <td><?php  echo $row['medicine_name']; ?></td>
                            <td><?php  echo $row['packing']; ?></td>
                            <td><?php  echo $row['generic_name']; ?></td>
                            <td><?php  echo $row['supplier_name']; ?></td>
                            <td><?php  echo $row['register_date']; ?></td>
                            <td><?php echo $date2 =$row['expire_date'];?></td>
		                    <td><?php if(strtotime(date("Y/m/d")) < strtotime($date2)) echo " <div style='color:green; font-weight:bold;'>Active</div>"; 
                            else { echo "<div style='color:red; font-weight:bold;'>Expired</div>";} ?></td>
                            <!-- <td>
                                <form action="updatemedicine.php" method="post">
                                    <input type="hidden" name="edit_id" value="">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="medicinefunction.php" method="post">
                                    <input type="hidden" name="delete_id" value="">
                                    <button type="submit" name="delete_btn" class="btn btn-danger"> Delete</button>
                                </form>
                            </td> -->
                        </tr>
                    <?php
                        } 
                    }
                    else {
                        echo "No Record Found";
                    }
                    ?>
                </tbody>
            </table>

        </div>

</body>
</html>