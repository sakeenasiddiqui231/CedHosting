<?php
//session_start();
include_once('classes/Product.php');
$product = new Product();

$data = new Config(); 


// require_once 'classes/Product.php';
// $product = new Product();
// $data = new Config();  

$path = basename($_SERVER['REQUEST_URI']);

if($path == 'linuxhosting.php' || $path == 'wordpresshosting.php' || $path == 'windowhosting.php' || $path == 'cmshosting.php'){
$path = 'menu';
}
?>




<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								
								<h1><img src="logo.png" style="height:120px;width:180px;margin-top:-30px;"></img><a href="index.html"></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li <?php if($path == 'index.php'){ echo 'class="active"'; } ?>>
									<a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li <?php if($path == 'about.php'){ echo 'class="active"' ; } ?>>
									<a href="about.php">About</a></li>
								
								<li <?php if($path == 'services.php'){ echo 'class="active"' ;} ?>>
									<a href="services.php">Services</a></li>
								<li class="dropdown <?php if($path == 'menu'){ echo 'active' ;}?>">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">


									<?php
											$result = $product->dynamic_elements();
											foreach($result as $item)
											{
												?>
											<li><a href="catpage.php?id=<?php echo $item['id']; ?>"><?php echo $item['prod_name']; ?></a></li>
											<?php
											}
											


									?>



										
									</ul>			
								</li>
								<li <?php if($path == 'pricing.php'){ echo 'class="active"'; } ?>>
									<a href="pricing.php">Pricing</a></li>
								<li <?php if($path == 'blog.php'){ echo 'class="active"'; } ?>>
									<a href="blog.php">Blog</a></li>
								<li <?php if($path == 'contact.php'){ echo 'class="active"'; } ?>>
									<a href="contact.php">Contact</a></li>
								<li <?php if($path == 'codes.php'){ echo 'class="active"'; } ?>>
									<a href="codes.php"> <i class="fas fa-shopping-cart" style="color:#585CA7"></i></a></li>
								<?php if (!isset($_SESSION['login'])): ?><li <?php if($path == 'login.php'){ echo 'class="active"'; } ?>>
								<a href="login.php">Login</a></li><?php endif;?>
								<?php if(isset($_SESSION['login'])): ?><li><a href="logout1.php">Logout</a></li><?php endif;?>
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
