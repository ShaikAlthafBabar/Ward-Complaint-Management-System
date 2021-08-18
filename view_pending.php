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
<?php
	$sql = "SELECT * FROM complaints where status='pending'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		 ?>
		<table style="margin-left: 350px;margin-top: 100px;">
			<tr style="border: 2px solid black;">
				<th style="border: 2px solid black;">ComplaintID</th>
				<th style="border: 2px solid black;">UserID</th>
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
			<td style="border: 2px solid black;"><?php echo $row["UserID"]; ?></td>
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