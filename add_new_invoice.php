
<?php require "config.php"; ?>
<html>
  <head>
    <title>New Invoice</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css'>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>
    
  </head>
  <body style="background-color:pink;">
    <div class='container pt-5'>
      
      <h1 class='text-center text-primary'>New Invoice</h1><hr>
       <?php
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
        
      ?>
      <form method='post' action='add_new_invoice.php' autocomplete='off'>
        <div class='row'>
          <div class='col-md-4'>
            <h5 class='text-success'>Invoice Details</h5>
            <!-- <div class='form-group'>
              <label>Invoice No</label>
              <input type='text' name='invoice_no' required class='form-control'>
            </div> -->
            <div class='form-group'>
              <label>Invoice Date</label>
              <input type='text' name='invoice_date' id='date' required class='form-control'>
            </div>
          </div>
          <div class='col-md-8'>
            <h5 class='text-success'>Customer Details</h5>
            
            <div class='form-group'>
              <label>Contact</label>
              <input type='text' name='contact' id="search_text" required class='form-control'>
            </div>
           
            <div id="dataTable">
            <div class='form-group'>
              <label>Name</label>
              <input type='text' name='cname'  required class='form-control'>
            </div>
            <div class='form-group'>
              <label>Address</label>
              <input type='text' name='caddress' required class='form-control'>
            </div>
           
          </div>
          </div>
        </div>
        <h5 class='text-success'>Product Details</h5>
          <table class='table table-bordered'>
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
            <section id="product_tbody">
            <div class='row'style='margin-left:4rem;'  >
            <div class='col-md-3 form-group' >
              <input type='text' required name='pname[]' onkeyup="searchMed()" id="medicine" class='form-control'>
            </div>
            <div class='col-md-2 form-group'>
              <input type='text' required id="priceid" name='price[]' class='form-control price' disabled>
            </div>
            <div class='col-md-2 form-group'>
              <input type='text' required id="qty" name='qty[]' class='form-control qty'>
            </div>
            <div class='col-md-2 form-group'>
              <input type='text' required id="total" name='total[]' class='form-control total' disabled>
            </div>
            <!-- <div class='col-md-1 form-group'>
              <input type='button' value='Remove' class='btn btn-danger btn-sm btn-row-remove'>
            </div> -->
        </div>
      </section>
            <input type='button' onclick="addRow()" value='Add Row' class='btn btn-primary btn-sm' id='btn-add-row'>
            <div class="col-md-2 form-group" style="margin-left:42.6rem;">
             Actual Total:<input type='text' name='grand_total' id='grand_total' class='form-control' required disabled>
           </div>
            <!-- <div class="col-md-2 form-group" style="margin-left:42.6rem;">
            Discount:<input type='text' name='discount' id='discount' class='form-control' required>
           </div> -->
           
           <!-- <div class="col-md-2 form-group" style="margin-left:42.6rem;">
             Net Total:<input type='text' name='actual_total' id='net' class='form-control' required disabled>
           </div> -->
            <input type='submit'  name='submit' value='Save Invoice' class='btn btn-success float-right'>
        
      </form>
    </div>
     
    <script>

      const addRow = () => {

        var medicine = $("#medicine").val();
        $("#medicine").val('');
        var price = $("#priceid").val()
        $("#priceid").val('')
        // var avlqty = $("#qty1").val()
        // $("#qty1").val('')
        var qty = $("#qty").val();
        $("#qty").val('');
        var total = $("#total").val();
        $("#total").val('');
        

        var row=`<div class='row'style='margin-left:4rem;' id='row1' ><div class='col-md-3 form-group'><input type='text' required name='pname[]'  value="${medicine}" class='form-control'></div><div class='col-md-2 form-group' id='pri'><input type='text' required value="${price}" name='price[]' class='form-control price'> </div><div class='col-md-2 form-group'><input type='text' required name='qty[]' value="${qty}" class='form-control qty'></div><div class='col-md-2 form-group'><input type='text' value="${total}" required name='total[]' class='form-control total'></div><div class='col-md-1 form-group'><input type='button' value='Remove' class='btn btn-danger btn-sm btn-row-remove'></div></div>`;
        $("#product_tbody").append(row);
      }
      
      $(document).ready(function(){
        $("#date").datepicker({
          dateFormat:"dd-mm-yy"
        });
        

        // $("body").on("click","#btn-add-row",function(){
        //   var row="<div class='row'style='margin-left:4rem;' id='row1' ><div class='col-md-3 form-group' id='search_medicine'><input type='text' required name='pname[]' class='form-control'></div><div class='col-md-2 form-group' id='pri'><input type='text' required name='price[]' class='form-control price'> </div><div class='col-md-2 form-group'><input type='text' required name='qty[]' class='form-control qty'></div><div class='col-md-2 form-group'><input type='text' required name='total[]' class='form-control total'></div><div class='col-md-1 form-group'><input type='button' value='Remove' class='btn btn-danger btn-sm btn-row-remove'></div></div>";
        //   $("#product_tbody").append(row);
        // });
        
        $("body").on("click",".btn-row-remove",function(){
            $("#row1").remove();
            grand_total();
        });

        $("body").on("keyup",".price",function(){
          var price=Number($(this).val());
          var qty=Number($(this).closest(".row").find(".qty").val());
          $(this).closest(".row").find(".total").val(price*qty);
          grand_total();
        });
        
        $("body").on("keyup",".qty",function(){
          var qty=Number($(this).val());
          var price=Number($(this).closest(".row").find(".price").val());
          $(this).closest(".row").find(".total").val(price*qty);
          grand_total();
        });       
        
        function grand_total(){
          var tot=0;
          $(".total").each(function(){
            tot+=Number($(this).val());
          });
          $("#grand_total").val(tot);
        
        }
      });
    </script>

<script type="text/javascript">


    const searchMed = () => {
      var search = $("#medicine").val();
        $.ajax({
            url:'invoice_product_search.php',
            method:'post',
            data:{query:search},
            success:function(response){
                $("#priceid").val(response);
            }
        });
    }
    $(document).ready(function(){  
        $("#search_text").keyup(function(){
            var search = $(this).val();
            $.ajax({
                url:'invoice_customer_search.php',
                method:'post',
                data:{query:search},
                success:function(response){
                    $("#dataTable").html(response);
                }
            });
        });

    });
    $(document).ready(function(){  
        $('#search_medicine').keyup(function(){
            var search = $(this).val();
            $.ajax({
                url:'invoice_product_search.php',
                method:'post',
                data:{query:search},
                success:function(response){
                    $("#pri").html(response);
                }
            });
        });

    });
    
  </script> 
  </body>
</html>