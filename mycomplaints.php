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
	<link rel="stylesheet" type="text/css" href="checkstatus.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
td,th,table{
		border:2px solid balck;
		border-collapse: collapse;
	}
	.Reg{
	margin-left: 300px;
	margin-top: 100px;
	border:2px solid black;
	padding: 20px 40px;
	width:25%;
  box-shadow:5px 10px 8px #888888;
}
	</style>
</head>
<body >
	<div class="div1">
			<span><h1 class="header">Ward Complaint Mangement</h1></span>
			<span><a id="home" href="User.php" class="fa fa-home header-home" style="font-size: 40px;" ></a></span>
			<div class="dropdown">
			<i class="fa fa-user" aria-hidden="true" style="font-size: 40px;margin-left: 40px;"></i>
			    	<?php 
    					if(isset($user_data))
    					echo ($user_data['FirstName'].' '.$user_data['LastName']);
    				?>
			<i class="fa fa-caret-down"></i>
			    <div class="dropdown-content">
    				  <a href="mycomplaints.php">My complaints</a>
    				  <a href="help2.php">Help</a>
    				  <a href="Logout.php">Logout</a>
    			</div>	
			</div>
		</div>
		<h2 style="color: rgb(230, 177, 34);margin-left: 200px;margin-top: 50px;">My Complaints</h2>
	<?php
	$userid=$user_data['User_ID'];
	$sql = "SELECT RegisterID,wardno,ctype,description,status FROM complaints where  UserID=$userid";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) >0) {
		 ?>
		<table style="margin-left: 350px;margin-top: 50px;">
			<tr style="border: 2px solid black;">
				<th style="border: 2px solid black;">ComplaintID</th>
				<th style="border: 2px solid black;">Wardno</th>
				<th style="border: 2px solid black;">Complaint Type</th>
				<th style="border: 2px solid black;">Description</th>
				<th style="border: 2px solid black;">Status</th>
			</tr>
		<?php
		while($row = mysqli_fetch_assoc($result)) {
		?>
		<tr style="border: 2px solid black;">
			<td style="border: 2px solid black;"><?php echo $row['RegisterID']; ?></td>
			<td style="border: 2px solid black;"><?php echo $row["wardno"]; ?></td>
			<td style="border: 2px solid black;"><?php echo $row["ctype"]; ?></td>
			<td style="border: 2px solid black;"><?php echo $row["description"]; ?></td>
			<td style="border: 2px solid black;"><?php echo $row["status"]; ?></td>
		</tr>
    	<?php 
    	}}
    	else{
    		echo "0 results found";
    	}
    	 ?>
    </table>
		</body>
</html>