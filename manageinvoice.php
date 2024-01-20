
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/sidenav.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Document</title>
    <style>
  <?php include ("CSS/manage.css"); ?>
  
    </style>
</head>
<body> 
<div style="position:relative; top:-6rem; margin-left:-7rem">
         <?php include("sidenav.html");?>
</div>
         
<h6 >All Invoice</h6>

<div class="form-inline" id="search1">
<label for="search" class="lab">
Search Record :</label>&nbsp; &nbsp; &nbsp; &nbsp;
<input type="text" name="search" id="search_text" class="
serbox" placeholder="  Search medcinie">
</div>
 <?php
     include 'function.php';
     $stmt=$conn->prepare("SELECT * FROM invoice_customer");
     $stmt->execute();
     $result=$stmt->get_result();
     ?>
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>Invoice No </th>
                        <th> Invoice Date </th>
                        <th>Customer Name </th>
                        <th>Customer Address</th>
                        <th>Contact</th>
                        <th>Total</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td><?=  $row['INVOICE_NO']; ?></td>
                            <td><?= $row['INVOICE_DATE']; ?></td>
                            <td><?= $row['CNAME']; ?></td>
                            <td><?= $row['CADDRESS']; ?></td>
                            <td><?= $row['CONTACT']; ?></td>
                            <td><?= $row['GRAND_TOTAL']; ?></td>
                           
                        </tr>
                    <?php
                        } ?>
                </tbody>
            </table>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){  
        $("#search_text").keyup(function(){
            var search = $(this).val();
            $.ajax({
                url:'invoicesearch.php',
                method:'post',
                data:{query:search},
                success:function(response){
                    $("#dataTable").html(response);
                }
            });
        });

    });
  </script> 

</body>
</html>
