<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php




include 'config.php';
$data = new Config();  
include_once('dbfunction.php');  
       
$funObj = new dbfunction();

if(isset($_POST['register'])){  
	$name = $_POST['name'];  
	$email = $_POST['email'];
	//echo $email;
	//die();
	$mobile = $_POST['mobile'];
	$security_question = $_POST['security_question'];
	$security_answer = $_POST['security_answer'];  
	$password = $_POST['password'];  
	$confirmPassword = $_POST['password1'];  
	if($password == $confirmPassword){ 
		$email1 = $funObj->isUserExist($email);  
		if($email1!= "Username already exists"){  
			$register = $funObj->UserRegister($name, $email, $mobile, $password, $security_question, $security_answer);  
			if($register){  
				 echo "<script>alert('Registration Successful...Please verify ')</script>"; 
				 header('refresh:0; url=verify.php');	 
				 
			}else{  
				echo "<script>alert('Registration Not Successful')</script>";  
			}  
		} else {  
			echo "<script>alert('Email Already Exist')</script>";  
		}  
	} else {  
		echo "<script>alert('Password Not Match')</script>";  
	  
	}  
}  
?>  

<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
<!--script-->
</head>
<body>
	<!---header--->
<?php
include 'header.php';
?>
	<!---header--->
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form name="login" action="account.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="name" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required> 
					 </div>
					 <div>
						<span>Email<label>*</label></span>
						<input type="text" name="email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" required> 
					 </div>
					 <div>
						 <span>Mobile<label>*</label></span>
						 <input type="text" name="mobile" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required> 
					 </div>
					 <div>
						 <span>Security Question<label>*</label></span>
						 <select name="security_question" id="security" style="width:525px;height:35px;">
							 <option>What was your childhood nickname?</option>
							 <option>What is the name of your favourite childhood friend?</option>
							 <option>What was your favourite place to visit as a child?</option>
							 <option>What was your dream job as a child?</option>
							 <option>What is your favourite teacher's nickname?</option>
						 </select>
						 <br><br>
					 </div>
					 <div>
						 <span>Security Answer<label>*</label></span>
						 <input type="text" name="security_answer" pattern="^[a-zA-z][a-zA-Z0-9]{1,}" required> 
					 </div>
					 
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" required >
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="password1" required>
							 </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="submit" name="register" >
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<!---footer--->
				<?php
					include 'footer.php';
				?>

			<!---footer--->
</body>
</html>