
<?php
session_start();

if(isset($_SESSION['uid']) and $_SESSION['uid'] != ''){
  if($_SESSION['is_admin'] == 0 ){
    header('location:../index.php');
  }
}
include('../classes/Product.php');
$product = new Product();

$data = new Config(); 


if(isset($_POST['submit'])){
  //$prod_parent_id= $_POST['prod_parent_id'];
  $prod_name = $_POST['prod_name'];
  $link = $_POST['html'];

  $register = $product->insert_subcategory($prod_name, $link);  
  if($register)
  {
    echo "<script>alert('SubCategory Added Successfully')</script>";
    header("refresh:0; url=selectcategory.php");
  }
}
if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = $product->deletecategory($id);
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
include './theme/topnav.php';
?>

<?php

include './theme/navigation.php';
  
?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-2 col-lg-2"></div>
          <div class="col-md-8 col-lg-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="POST">
                <div class="card-body">                  
                  <div class="form-group">
                  <label>Select Category</label>
                  <select class="form-control select2" style="width: 100%;" name="prod_parent_id" >
                <?php
                  $res = $product->sub_category();
                  foreach($res as $item)
                  {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['prod_name']; ?></option>
                    <?php
                  }



                ?>
                    <!-- <option selected="selected">Hosting</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option> -->
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category" name="prod_name">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link URL</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category" name="html">
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Add SubCategory</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
           <!-- /.card -->
          </div>
          
          <!--/.col (left) -->
          <!-- right column -->        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of all the SubCategories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Status</th>
                    <th>Date of Launch</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="elements">
                  <?php

                  $res = $product->table_category();
                  if($res == '0'){
                    ?>

                          <tr>
                              <td class="text-center">data not available</td>
                          </tr>
                    <?php
                  }else{
                    foreach($res as $element) {
                      $parent_name = $product->parentname($element['prod_parent_id']);
                      ?>

                      <tr>
                           <td>
                                <?php
                                    if($parent_name == '0'){
                                      echo "empty";
                                    }else{
                                      foreach ($parent_name as $p_name)
                                      {
                                        echo $p_name['prod_name'];
                                      }
                                    }
                                    ?>                                   
                    </td>
                    <td><?php echo $element['prod_name']; ?></td>
                    <td> <?php if($element['prod_available'] == '1'){ echo 'Available';} else { echo 'Unavailable' ;} ?> </td>
                    <td><?php echo $element['prod_launch_date']; ?></td>
                    <td><a href="editcategory.php?parent_id=<?php echo $element['prod_parent_id'] ?>&id=<?php echo $element['id'] ?>&name=<?php echo $element['prod_name'] ?>&link=<?php echo $element['html'] ?>&available=<?php echo $element['prod_available'] ?>" class="btn btn-success btn-sm">Edit</a><a href="selectcategory.php?delete=<?php echo $element['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                <?php
                    }
                  }
                    ?>                 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
