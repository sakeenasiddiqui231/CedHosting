<?php
include('../classes/Product.php');
$product = new Product();

$data = new Config(); 


if(isset($_POST['submit'])){
  $prod_parent_id= $_POST['prod_parent_id'];
  $prod_name = $_POST['prod_name'];
  $link = $_POST['link'];
  $mon_price = $_POST['mon_price'];
  $annual_price = $_POST['annual_price'];
  $sku = $_POST['sku'];


  $webspace = $_POST['webspace'];
  $bandwidth = $_POST['bandwidth'];
  $domain = $_POST['domain'];
  $language = $_POST['language'];
  $mailbox = $_POST['mailbox'];


  $contain = array("webspace" => $webspace, "bandwidth" => $bandwidth, "domain" => $domain, "language" => $language, "mailbox" => $mailbox);
  $features_encode = json_encode($contain);
  $register = $product->insert_product($prod_parent_id, $prod_name, $link, $mon_price, $annual_price, $sku, $features_encode);  
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
 .form-group span{
   color:red;
 }


</style>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <?php
include './theme/topnav.php';
?>
<?php

include './theme/navigation.php';
  
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create New Product</li>
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

            <!-- general form elements -->
            <div class="col-md-2 col-lg-2"></div>
            <div class="col-md-8 col-lg-8 card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enter Product Details</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST">
              <div class="card-body">
              <div class="form-group">
                  <label for="exampleSelectRounded0">Select Product Category<span>*</span></label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="prod_parent_id">
                  <?php
                  $res = $product->sub_category();
                  foreach($res as $item)
                  {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['prod_name']; ?></option>
                    <?php
                  }
                ?>
                    <!-- <option>Please Select</option>
                    <option>Value 2</option>
                    <option>Value 3</option> -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Enter Product Name<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0"  name="prod_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Page URL<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" name="link">
                </div>
                
               
                
                <hr class="my-4">
                <h4>Product Description</h4>
                <h6><b>Enter Product Description Below</b></h6>
                <hr class="my-4">
                <div class="form-group">
                  <label for="exampleInputRounded0">Enter Monthly Price<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="mon_price">
                  <p> This would be Monthly Plan</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Enter Annual Price<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="ex:23" name="annual_price">
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">SKU<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="sku">
                </div>
                <hr class="my-4">
                <h4>Features</h4>
                <hr class="my-4">
                <div class="form-group">
                  <label for="exampleInputRounded0">Web Space(in GB)<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="webspace">
                  <p> Enter 0.5 for 512 MB</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Bandwidth (in GB)<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="bandwidth">
                  <p> Enter 0.5 for 512 MB</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Free Domain<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="domain">
                  <p> Enter 0 if no domain available in this service</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Language / Technology Support<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="language">
                  <p> Separate by (,) Ex:PHP, MYSQL, MongoDB</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Mailbox<span>*</span></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" name="mailbox">
                  <p> Enter Number or mailbox will be provided, enter 0 if none</p>
                </div>
                <hr class="my-4">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" >Create Now</button>
                </div>
              </div>
                </form>
              <!-- /.card-body -->
            </div>
            
              <!-- /.card-body -->
            </div>
            

          </div>
         
          </div>
          <!--/.col (right) -->
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
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>