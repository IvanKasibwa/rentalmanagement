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
            <h1>Manage Tenants</h1>
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
if(isset($_POST['submit']))
  {
include_once 'dbconfig.php';
$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$national_id = mysqli_real_escape_string($con, $_POST['national_id']);
$phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$registration_date = mysqli_real_escape_string($con, $_POST['registration_date']);
$house = mysqli_real_escape_string($con, $_POST['house']);

// attempt insert query execution
  $sql = "INSERT INTO  tenants 
(
fullname,
gender,
national_id,
phone_number,
email,
registration_date,
house 
)
VALUES (
'$fullname',
'$gender',
'$national_id',
'$phone_number',
'$email',
'$registration_date',
'$house'
)

";
if(mysqli_query($con, $sql)){
echo "<script type=\"text/javascript\">toastr.success('Tenant Added Successfully')</script>";


  $sql = "UPDATE houses SET status='Occupied' where id='$house' ";
if(mysqli_query($con, $sql))
{
  echo "<script type=\"text/javascript\">toastr.success('House ($house) Occupied Successfully')</script>";
}




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
              <div class="card-header" align="right">
                <h3 class="card-title">View Tenants</h3>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add Tenants
                </button>
              </div>

              
              <!-- /.card-header -->
              <div class="card-body">




<?php

include 'dbconfig.php';

 $query = "select * from  tenants";
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
              </div>
              ";




 ?>




<!--
Add House modal
-->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Tenant</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>




            <div class="modal-body">


              <form method="post" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" >
                  </div>
                 
                   <div class="form-group">
                    <label>Gender</label>
                    <input type="text" class="form-control" name="gender" id="gender" placeholder="Enter gender" >
                  </div>

                   <div class="form-group">
                    <label>National Id</label>
                    <input type="text" class="form-control" name="national_id" id="national_id" placeholder="Enter National Id" >
                  </div>

                  <div class="form-group">
                    <label>Phone number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone number" >
                  </div>
                
                 <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" >
                  </div>
                  
                 
                    <div class="form-group">
                    <label>Registration date</label>
                    <input type="date" class="form-control" name="registration_date" id="registration_date" placeholder="Enter Registration Date" >
                  </div>

                 <div class="form-group">
                    <label>House</label>
                    
                              <?php
                                  include 'dbconfig.php';
                                  $query = "SELECT * FROM houses WHERE status like 'vacant' order by house_number";
                                  $result = mysqli_query ($con,$query);
                                  echo "<select name='house' value='' class='form-control'><option></option>";
                                  while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='$row[id]'>$row[house_number] | $row[features] | $row[rent]</option>"; 
                                     
                                  }
                                  echo "</select>";
                                  ?>


                  </div>


                                </div>
                <!-- /.card-body -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button  type="submit" class="btn btn-success" class="btn btn-success" name="submit" >Add Tenant</button>

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
      "order": [[ 0, "desc" ]],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

<script>
$(function () {
  
  $('#quickForm').validate({
    rules: {
      fullname: {
        required: true
      },
      gender: {
        required: true
      },
      national_id: {
        required: true
      },
phone_number: {
        required: true
      },
email: {
        required: true
      },
registration_date: {
        required: true
      },
house: {
        required: true
      },

    },
    messages: {
      fullname: {
        required: "Please enter tenant's full name"
      },
       gender: {
        required: "Please enter Tenant's gender"
      },
      national_id: {
        required: "Please enter Tenant's National Id"
      },
       phone_number: {
        required: "Please enter Tenant's Phone number"
      },
       email: {
        required: "Please enter Tenant's email",
        type: "Please enter valid email"
      },
        registration_date: {
        required: "Please enter Tenant's Registration date",
        type: "Please enter valid date"
      },

house: {
        required: "Please enter Tenant's House"
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
