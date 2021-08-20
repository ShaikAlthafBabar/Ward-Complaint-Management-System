<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = admin_login_check($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint Management</title>
	<link rel="stylesheet" type="text/css" href="AdminLog.css">
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

.view{
  text-decoration: none;
  font-size: 30px;
}
	</style>
</head>
<body >
	<div class="div1">
			<span><h1 class="header">Ward Complaint Mangement</h1></span>
			<span><a id="home" href="Admin.php" class="fa fa-home header-home" style="font-size: 40px;" ></a></span>
			<div class="dropdown">
			<i class="fa fa-user" aria-hidden="true" style="font-size: 40px;margin-left: 40px"></i>
			    	<?php 
    					if(isset($user_data))
    					echo ($user_data['name']);
    				?>
			<i class="fa fa-caret-down"></i>
			    <div class="dropdown-content">
    				  <a href="#">Profile</a>
    				  <a href="AdminLogOut.php">Logout</a>
    			</div>	
			</div>
		</div>
		<table style="margin-left: 350px;margin-top: 100px" id="tb1">
	<tr><td><a href="view_com.php"  class="view">View all Complaints</a></td></tr>
	<tr><td><a href="view_pending.php"  class="view">Pending Complaints</a></td></tr>
	<tr><td><a href="view_ongoing.php"  class="view">Ongoing Complaints</a></td></tr>
	<tr><td><a href="view_resolved.php"  class="view">Resolved Complaints</a></td></tr>
</table>
<div>
	<img src="update.png" width="200" style="margin-left: 70%;margin-top: -400px"><br>
	<a href="update_complaints.php" style="margin-left: 72%">Update Complaints</a>
</div>
</body>
</html>