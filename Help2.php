<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint Management</title>
	<link rel="stylesheet" type="text/css" href="User-CSS.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
	.div1{
		 	background: #56ab2f;  /* fallback for old browsers */
  			background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
  			background: linear-gradient(to right, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, O*/
  }
		body{
background: #70e1f5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
</head>
<body >
	<div class="div1">
		<span><h1 class="header">Ward Complaint Mangement</h1><a id="home" href="User.php" class="fa fa-home header-home" style="font-size: 40px;margin-left: 100px"></a></span>
		<div class="dropdown">
			<i class="fa fa-user" aria-hidden="true" style="font-size: 40px;margin-left: 40px"></i>
			    	<?php 
    					if(isset($user_data))
    					echo ($user_data['FirstName'].' '.$user_data['LastName']);
    				?>
			<i class="fa fa-caret-down"></i>
			    <div class="dropdown-content">
    				  <a href="mycomplaints.php">My Complaints</a>
    				  <a href="Help2.php">Help</a>
    				  <a href="Logout.php">Logout</a>
    			</div>	
			</div>
	</div>	
	<br><br>
	<div style="text-align: center;font-size: 20px;color: rgb(20, 113, 130);">
	<h2>Hi !! New user? You can register by clicking user->register.</h2>
	<h2>Then you can login with your creditentials.</h2>
	<h2>Still any queries?Contact us</h2><br><br>
	<h2>Mail:WardSachivalyam5656@gmail.com</h2>
	</div>
</body>
</html>