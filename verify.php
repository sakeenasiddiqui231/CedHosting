<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--> 
<!-- <?php

// require "vendor/autoload.php";

// $robo = 'er.sakeena7@gmail.com';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// $developmentMode = true;
// $mailer = new PHPMailer($developmentMode);

// try {
//     $mailer->SMTPDebug = 2;
//     $mailer->isSMTP();

//     if ($developmentMode) {
//     $mailer->SMTPOptions = [
//         'ssl'=> [
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//         ]
//     ];
//     }


//     $mailer->Host = 'ssl://smtp.gmail.com';
//     $mailer->SMTPAuth = true;
//     $mailer->Username = 'er.sakeena7@gmail.com';
//     $mailer->Password = 'sidriz@12#';
//     $mailer->SMTPSecure = 'ssl';
//     $mailer->Port = 465;

//     $mailer->setFrom('er.sakeena7@gmail.com', 'Name of sender');
//     $mailer->addAddress('sameerpathan1997@gmail.com', 'Name of recipient');

//     $mailer->isHTML(true);
//     $mailer->Subject = 'PHPMailer Test';
//     $mailer->Body = 'This is a <b>SAMPLE<b> email sent through <b>PHPMailer<b>';

//     $mailer->send();
//     $mailer->ClearAllRecipients();
//     echo "MAIL HAS BEEN SENT SUCCESSFULLY";

// } catch (Exception $e) {
//     echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
// }

?> -->
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
		  	  <form name="login" action="verification.php" method="POST"> 
				 
				     <div class="register-bottom-grid">
						    <h3>Veify informations</h3>
							 <div>
								<span>Email<label>*</label></span>
								<input type="text" name="email" style="width:450px;height:35px;" ><br>
								<input type="submit" value="Verify" name="" style="margin-top:20px;margin-bottom:90px;" >
							 </div>
							 <div>
								<span>Mobile<label>*</label></span>
								<input type="text" name="mobile" style="width:450px;height:35px;" ><br>
								<input type="submit" value="Verify" name="" style="margin-top:20px;margin-bottom:90px;" >
							 </div>
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