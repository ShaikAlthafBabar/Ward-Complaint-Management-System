<?php 
	session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint management</title>
</head>
<body>
		<?php
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cid'])){
	$userid=$user_data['User_ID'];
	$cid=$_POST['cid'];
	$sql = "SELECT wardno,ctype,status FROM complaints where RegisterID=$cid";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		 ?>
		<table style="margin-left: 200px;margin-top: 100px;">
			<tr style="border: 2px solid black;">
				<th style="border: 2px solid black;">Wardno</th>
				<th style="border: 2px solid black;">Complaint Type</th>
				<th style="border: 2px solid black;">Status</th>
			</tr>
		<?php
		while($row = mysqli_fetch_assoc($result)) {
		?>
		<tr style="border: 2px solid black;">
			<td style="border: 2px solid black;"><?php echo $row["wardno"]; ?></td>
			<td style="border: 2px solid black;"><?php echo $row["ctype"]; ?></td>
			<td style="border: 2px solid black;"><?php echo $row["status"]; ?></td>
		</tr>
    	<?php 
    	}}
    	else{
    		echo "0 results found";
    	}}
    	 ?>
    </table>


</body>
</html>