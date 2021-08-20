<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = admin_login_check($conn);
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$cid=$_POST['cid'];
		$status=$_POST['status'];
		$sql="SELECT * from complaints where RegisterID=$cid ";
		 if($row_result = mysqli_query($conn,$sql))
    	if($rownum=mysqli_num_rows($row_result)>0){
		$query = "update complaints set status='$status'  where RegisterID='$cid'";
        $result = mysqli_query($conn,$query);
        $msg="Updated Successfully !";
    }
    else{
    	$msg="Enter a valid complaintID";
}
      header('Location: update_complaints.php?msg='.$msg);
  }
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
.update{
	margin-left: 300px;
	margin-top: 100px;
	border:2px solid grey;
	padding: 20px 40px;
	width:25%;
  box-shadow:5px 10px 8px #888888;
}
	</style>
</head>
<body >
	<div class="div1">
			<span><h1 class="header">Ward Complaint Mangement</h1></span>
			<span><a id="home" href="AdminLog.php" class="fa fa-home header-home" style="font-size: 40px;" ></a></span>
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
		<div class="update">
		<form method="POST">
			<label>Complaint ID   :</label>
			<input type="text" name="cid"class="box" placeholder="Enter complaint ID" required><br><br>
			<label>Choose complaint status</label>
			<select name="status" style="background-color: rgb(240, 223, 239)">
				<option value="pending">Pending</option>
				<option value="ongoing">Ongoing</option>
				<option value="resolved">Resolved</option>
			</select><br><br>
			<input type="submit" name="" class="box" style=" margin-left: 130px;">
		</form>
	</div>
		<h3 style="margin-left: 300px;">
			<?php 
				if(isset($_GET['msg'])){
					echo  $_GET['msg'];
				}
			 ?>
		</h3>
</div>
</body>
</html>