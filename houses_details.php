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
            <h1>House Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Houses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">




<?php





include 'dbconfig.php';

$id=$_GET['id'];

$query = "select * from  houses where id='$id'";

$result = mysqli_query($con,$query);


                 while($row=mysqli_fetch_array($result))
                          {
                            
                             $id =$row['id'];
                            $house_number=$row['house_number'];
                            $features=$row['features'];
                            $rent=$row['rent'];
                            $status=$row['status'];


                          }



if(isset($_POST['submit_occupied']))
  {
   $house=$_GET['id'];
include_once 'dbconfig.php';
          $sql = "UPDATE houses SET status='Occupied' where id='$house' ";
          if(mysqli_query($con, $sql))
          {
            echo "<script type=\"text/javascript\">toastr.success('$house_number-$features; marked as Occupied Successfully')</script>";
          }
}


if(isset($_POST['submit_vacant']))
  {
   $house=$_GET['id'];
include_once 'dbconfig.php';
          $sql = "UPDATE houses SET status='Vacant' where id='$house' ";
          if(mysqli_query($con, $sql))
          {
            echo "<script type=\"text/javascript\">toastr.success('$house_number-$features; marked as Vacant Successfully')</script>";
          }
}


 ?>                         


              <h3 class="d-inline-block d-sm-none"><?php echo "$house_number";   ?></h3>
              <div class="col-12">
                <img src="dist/img/house1.jpg" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="dist/img/house1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="dist/img/house2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="dist/img/house3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="dist/img/house4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="dist/img/house5.jpg" alt="Product Image"></div>
              </div>
            </div>













            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo "$house_number";   ?></h3>
              <p><?php echo "$features";   ?></p>

              <hr>
            
            
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 <?php $rent=number_format($rent); echo "Ksh $rent";   ?>
                </h2>
              
              </div>
<hr>
<?php   

if ($status=='Occupied')
{
?>

   <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-home fa-lg mr-2"></i>
               
                       
                   Occupied


                </div>

<?php
}
if ($status=='Vacant')
{
?>
   <div class="btn btn-success btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                 
                          
                    Vacant

                </div>

<?php
}
else
{
?>



<?php
}










?>
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-home fa-lg mr-2"></i>
                    <form method="post">
                       
                           <button  type="submit" class="btn btn-primary" name="submit_occupied" >Mark as Occupied</button>


                    </form>
                </div>

                <div class="btn btn-success btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                    <form method="post">
                          
                           <button  type="submit" class="btn btn-success"  name="submit_vacant" >Mark as Vacant</button>

                    </form>
                </div>
              </div>






            </div>
          </div>
      <br>
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
$house_id=$_GET['id'];
 $query = "select * from  tenants where house='$house_id'";
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
$house_id=$_GET['id'];
 $query = "select * from  invoices where house='$house_id'";
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
$house_id=$_GET['id'];
 $query = "select * from  payment where house='$house_id'";
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
        <!-- /.card-body -->
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

</body>
</html>
