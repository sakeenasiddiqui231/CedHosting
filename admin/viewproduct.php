<?php
include('../classes/Product.php');
$product = new Product();

$data = new Config(); 


if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = $product->deleteproduct($id);
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
            <h1>View Products</h1>
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
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of all the Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product </th>
                    <th>Product ID</th>
                    <th>Monthly Price</th>
                    <th>Annual Price</th>
                    <th>SKU</th>
                    <th>Webspace</th>
                    <th>Bandwidth</th>
                    <th>Domain</th>
                    <th>Language</th>
                    <th>Mailbox</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody class="elements">
                  <?php

                  $res = $product->view_table();
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
                    <td><?php echo $element['prod_id']; ?></td>
                     <td><?php echo $element['mon_price']; ?></td>
                     <td><?php echo $element['annual_price']; ?></td>
                     <td><?php echo $element['sku']; ?></td>
                     <?php
                     $result = json_decode($element['description']);
                         ?>
                      <td><?php echo $result->webspace;  ?></td>
                      <td><?php echo $result->bandwidth;  ?></td>
                      <td><?php echo $result->domain;  ?></td>
                      <td><?php echo $result->language;  ?></td>
                      <td><?php echo $result->mailbox;  ?></td>

                      <?php
                      $res = json_encode($result);
                      
                      
                      ?>
                      
                    <td><a href="editproduct.php?m_price=<?php echo $element['mon_price'] ?>&a_price=<?php echo $element['annual_price'] ?>&sku=<?php echo $element['sku'] ?>&description=<?php echo $res ?> " class="btn btn-success btn-sm">Edit</a>
                    <a href="viewproduct.php?delete=<?php echo $element['prod_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td> 
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
