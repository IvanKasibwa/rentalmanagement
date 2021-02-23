<?php

error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent Management System - Houses</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
 <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  
  <?php
include 'top_nav.php';

include 'left_nav.php';

  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tenant Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Tenants</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


<?php
if(isset($_POST['submit_invoice']))
  {
include_once 'dbconfig.php';
$Invoice_Amount = mysqli_real_escape_string($con, $_POST['Invoice_Amount']);
$Description = mysqli_real_escape_string($con, $_POST['Description']);
$Date_Invoiced = mysqli_real_escape_string($con, $_POST['Date_Invoiced']);
$house = mysqli_real_escape_string($con, $_POST['house']);
$tenant = mysqli_real_escape_string($con, $_POST['tenant']);

// attempt insert query execution
  $sql = "INSERT INTO  invoices 
(
Invoice_Amount,
Description,
Date_Invoiced,
house,
tenant
)
VALUES (
'$Invoice_Amount',
'$Description',
'$Date_Invoiced',
'$house',
'$tenant'
)

";
if(mysqli_query($con, $sql)){
echo "<script type=\"text/javascript\">toastr.success('Invoice Added Successfully')</script>";
}

  }


?>




<?php
if(isset($_POST['submit_payment']))
  {
include_once 'dbconfig.php';
$Payment_Amount = mysqli_real_escape_string($con, $_POST['Payment_Amount']);
$Description = mysqli_real_escape_string($con, $_POST['Description']);
$Date_Paid = mysqli_real_escape_string($con, $_POST['Date_Paid']);
$house = mysqli_real_escape_string($con, $_POST['house']);
$tenant = mysqli_real_escape_string($con, $_POST['tenant']);

// attempt insert query execution
  $sql = "INSERT INTO  payment 
(
Payment_Amount,
Description,
Date_Paid,
house,
tenant
)
VALUES (
'$Payment_Amount',
'$Description',
'$Date_Paid',
'$house',
'$tenant'
)

";
if(mysqli_query($con, $sql)){
echo "<script type=\"text/javascript\">toastr.success('Payment Added Successfully')</script>";
}

  }


?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
         

            <div class="card">
<div class="card-body">



<?php

include 'dbconfig.php';
$tenantid=$_GET['id'];
 $query = "select * from  tenants where id ='$tenantid'";
$result = mysqli_query($con,$query);


                 while($row=mysqli_fetch_array($result))
                          {
                            
                            $id =$row['id'];
                         
                            $fullname=$row['fullname'];
                            $gender=$row['gender'];
                            $national_id=$row['national_id'];
                            $phone_number=$row['phone_number'];
                            $email=$row['email'];
                            $registration_date=$row['registration_date'];
                            $house=$row['house'];


                             $query = "select * from  houses where id='$house'";
                            $result = mysqli_query($con,$query);
                           while($row=mysqli_fetch_array($result))
                                        {
                                           $id =$row['id'];
                                           $house_number =$row['house_number'];
                                           $features =$row['features'];
                                           $rent =$row['rent'];
                                            $status =$row['status'];
                                        }




                          }
  ?>




<i class="fa fa-user fa-6x" aria-hidden="true"></i> <br>
<h3>Name: <?php echo "$fullname"; ?></h3>
<h3>Current House: <?php echo "$house - $house_number | $features (Ksh $rent) - $status "; ?></h3>
</div>

<div class="card-header" align="left">
  <div class="btn btn-success btn-lg btn-flat">
  <i class="fas fa-credit-card fa-lg mr-2">
                   
                <?php 

$tenantid=$_GET['id'];

  $query = "select * from  master_balance where tenant='$tenantid'";
                            $result = mysqli_query($con,$query);
                           while($row=mysqli_fetch_array($result))
                                        {
                                           $tenant =$row['tenant'];
                                            $Balance =$row['Balance'];
                                           
                                           $Balance=number_format($Balance);
                                     }





                echo "<h2>Rent Balance: Ksh $Balance</h2>" ?></i>
  </div>
</div>


              <div class="card-header" align="right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Add_Invoice">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add Invoice
                </button>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Add_Payment">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add Payment
                </button>
              </div>

              
              <!-- /.card-header -->
              <div class="card-body">


 <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Tenant History</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Invoices</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Payments</a>
              </div>
            </nav>


  <div class="tab-content p-3" id="nav-tabContent">
 <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 


<?php

include 'dbconfig.php';
$tenant_id=$_GET['id'];
 $query = "select * from  tenants where id='$tenant_id'";
$result = mysqli_query($con,$query);


          
                 echo "
                  <table id=\"example1\" class=\"table table-bordered table-striped\">
                  <thead>
                  <tr>
                    <th>Reg_ID</th>
                  <th>fullname</th>
                    <th>gender</th>
                    <th>national_id</th>
                    <th>phone_number</th>
                    <th>email</th>
                    <th>registration_date</th>
                   <th> house </th>
                  </tr>
                  </thead>
                  <tbody>
                 ";


                 while($row=mysqli_fetch_array($result))
                          {
                            
                            $id =$row['id'];
                         
                            $fullname=$row['fullname'];
                            $gender=$row['gender'];
                            $national_id=$row['national_id'];
                            $phone_number=$row['phone_number'];
                            $email=$row['email'];
                            $registration_date=$row['registration_date'];
                            $house=$row['house'];

                            echo "
                             <tr>
                           
                              <td><a href=\"tenant_details.php?id=$id\">$id <i class=\"fa fa-user\" aria-hidden=\"true\"></i></a></td>
                            <td>$fullname</td>
                            <td>$gender</td>
                            <td>$national_id</td>
                            <td>$phone_number</td>
                            <td>$email</td>
                            <td>$registration_date</td>
                            <td>$house</td>
                            </tr>

                            ";
                          }

 echo "
                  
                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Reg_ID</th>
                  <th>fullname</th>
                    <th>gender</th>
                    <th>national_id</th>
                    <th>phone_number</th>
                    <th>email</th>
                    <th>registration_date</th>
                   <th> house </th>
                  </tr>
                  </tfoot>
                </table>
             
              ";




 ?>


</div>

   <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">


<?php

include 'dbconfig.php';
$tenant_id=$_GET['id'];
 $query = "select * from  invoices where tenant='$tenant_id'";
$result = mysqli_query($con,$query);


          
                 echo "
                  <table id=\"example2\" class=\"table table-bordered table-striped\">
                  <thead>
                  <tr>
                    <th>Invoice ID</th>
                  <th>Invoice_Amount</th>
                    <th>Description</th>
                    <th>Date_Invoiced</th>
                    <th>house</th>
                    <th>tenant</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                 ";


                 while($row=mysqli_fetch_array($result))
                          {
                            
                            $id =$row['id'];
                         
                            $Invoice_Amount=$row['Invoice_Amount'];
                            $Description=$row['Description'];
                            $Date_Invoiced=$row['Date_Invoiced'];
                            $house=$row['house'];
                            $tenant=$row['tenant'];
                        

                            echo "
                             <tr>
                           
                              <td>$id <i class=\"fa fa-user\" aria-hidden=\"true\"></i></td>
                            <td>$Invoice_Amount</td>
                            <td>$Description</td>
                            <td>$Date_Invoiced</td>
                            <td>$house</td>
                            <td>$tenant</td>
                       
                            </tr>

                            ";
                          }

 echo "
                  
                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Invoice ID</th>
                  <th>Invoice_Amount</th>
                    <th>Description</th>
                    <th>Date_Invoiced</th>
                    <th>house</th>
                    <th>tenant</th>
              
                  </tr>
                  </tfoot>
                </table>
             
              ";




 ?>



   </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> 

<?php

include 'dbconfig.php';
$tenant_id=$_GET['id'];
 $query = "select * from  payment where tenant='$tenant_id'";
$result = mysqli_query($con,$query);


          
                 echo "
                  <table id=\"example3\" class=\"table table-bordered table-striped\">
                  <thead>
                  <tr>
                    <th>Payment ID</th>
                  <th>Payment Amount</th>
                    <th>Description</th>
                    <th>Date_Paid</th>
                    <th>house</th>
                    <th>tenant</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                 ";


                 while($row=mysqli_fetch_array($result))
                          {
                            
                            $id =$row['id'];
                         
                            $Payment_Amount=$row['Payment_Amount'];
                            $Description=$row['Description'];
                            $Date_Paid=$row['Date_Paid'];
                            $house=$row['house'];
                            $tenant=$row['tenant'];
                        

                            echo "
                             <tr>
                           
                              <td>$id <i class=\"fa fa-user\" aria-hidden=\"true\"></i></td>
                            <td>$Payment_Amount</td>
                            <td>$Description</td>
                            <td>$Date_Paid</td>
                            <td>$house</td>
                            <td>$tenant</td>
                       
                            </tr>

                            ";
                          }

 echo "
                  
                  </tbody>
                  <tfoot>
                  <tr>
                 <th>Payment ID</th>
                  <th>Payment Amount</th>
                    <th>Description</th>
                    <th>Date_Paid</th>
                    <th>house</th>
                    <th>tenant</th>
              
                  </tr>
                  </tfoot>
                </table>
             
              ";




 ?>





               </div>


</div>














<!--
Add Invoice modal
-->
    <div class="modal fade" id="Add_Invoice">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Invoice</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>




            <div class="modal-body">


              <form method="post" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label>Amount</label>
         <input type="text" class="form-control" name="house" id="house" hidden="" value=<?php echo "$house";?> >
          <input type="text" class="form-control" name="tenant" id="tenant" hidden="" value=<?php echo "$tenantid";?> >

              <input type="Number" class="form-control" name="Invoice_Amount" id="Invoice_Amount" placeholder="Enter Invoice Amount" >
                  </div>
                 
                   <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="Description" id="Description" placeholder="Enter Description" >
                  </div>

                   <div class="form-group">
                    <label>Date Invoiced</label>
                    <input type="date" class="form-control" name="Date_Invoiced" id="Date_Invoiced" placeholder="Enter Date Invoiced" >
                  </div>

                
                 
                </div>
                <!-- /.card-body -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button  type="submit" class="btn btn-success" class="btn btn-success" name="submit_invoice" >Add Invoice</button>

                      </div>

              </form>



            </div>
          


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>








<!--
Add Payment modal
-->
    <div class="modal fade" id="Add_Payment">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Recieve Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>




            <div class="modal-body">


              <form method="post" id="quickForm2">
                <div class="card-body">
                  <div class="form-group">
                    <label>Amount</label>
         <input type="text" class="form-control" name="house" id="house" hidden="" value=<?php echo "$house";?> >
          <input type="text" class="form-control" name="tenant" id="tenant" hidden="" value=<?php echo "$tenantid";?> >

              <input type="Number" class="form-control" name="Payment_Amount" id="Payment_Amount" placeholder="Enter Payment Amount" >
                  </div>
                 
                   <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="Description" id="Description" placeholder="Enter Description" >
                  </div>

                   <div class="form-group">
                    <label>Date Invoiced</label>
                    <input type="date" class="form-control" name="Date_Paid" id="Date_Paid" placeholder="Enter Date Paid" >
                  </div>

                
                 
                </div>
                <!-- /.card-body -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button  type="submit" class="btn btn-success" class="btn btn-success" name="submit_payment" >Add Payment</button>

                      </div>

              </form>



            </div>
          


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>










              <!-- /.card-body -->
            </div>









        </div>
      
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include 'footer.php';
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "order": [[ 0, "desc" ]]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


      $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "order": [[ 0, "desc" ]]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "order": [[ 0, "desc" ]]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



 
  });
</script>


<script>
$(function () {
  
  $('#quickForm').validate({
    rules: {
      Invoice_Amount: {
        required: true
      },
     
      Description: {
        required: true
      },
       Date_Invoiced: {
        required: true
      },
    
    },
    messages: {
      Invoice_Amount: {
        required: "Please enter Invoice Amount"
      },
       Description: {
        required: "Please enter Description"
      },
      Date_Invoiced: {
        required: "Please enter Date Invoiced"
      },
     
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


<script>
$(function () {
  
  $('#quickForm2').validate({
    rules: {
        Payment_Amount: {
        required: true
      },
       Description: {
        required: true
      },
       Date_Paid: {
        required: true
      },
    },
    messages: {
   
      Payment_Amount: {
        required: "Please enter Payment Amount"
      },
      Description: {
        required: "Please enter Description"
      },
      Date_Paid: {
        required: "Please enter Date Paid"
      },
     
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>

</body>
</html>
