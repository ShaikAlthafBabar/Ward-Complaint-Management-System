<?php 
	session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$count=505051;
		$userid=$user_data['User_ID'];
		$ward=$_POST['wardno'];
		$ctype=$_POST['ctype'];
		$desc=$_POST['desc'];
		$status="pending";
		$sql="SELECT * from complaints ";
		 if($row_result = mysqli_query($conn,$sql))
    	$rownum=mysqli_num_rows($row_result);
    	$count=$count+$rownum;
		$query = "INSERT INTO complaints(RegisterID,UserID,wardno,ctype,description,status)  VALUES ('$count','$userid','$ward','$ctype','$desc','$status')";
        $result = mysqli_query($conn,$query);
      header('Location: register.php?count='.$count);
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint Management</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
  background: #70e1f5;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.div1{
	  background: #56ab2f;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.box{
  background-color: rgb(240, 223, 239);
  padding-top: 6px;
  padding-bottom: 6px;
  border-radius: 7px;
  border:2px solid black;
  margin-left: 0px;
}
.Reg{
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
			<span><a id="home" href="User.php" class="fa fa-home header-home" style="font-size: 40px;" ></a></span>
			<div class="dropdown">
			<i class="fa fa-user" aria-hidden="true" style="font-size: 40px;margin-left: 40px"></i>
			    	<?php 
    					if(isset($user_data))
    					echo ($user_data['FirstName'].' '.$user_data['LastName']);
    				?>
			<i class="fa fa-caret-down"></i>
			    <div class="dropdown-content">
    				  <a href="#">Profile</a>
    				  <a href="Logout.php">Logout</a>
    			</div>	
			</div>
		</div>
		<div class="Reg">
			<form method="post" >
			<label>Ward No   :</label>
			<input type="text" class="box" name="wardno" required><br><br>
			<label>Choose complaint type</label>
			<select name="ctype" style="background-color: rgb(240, 223, 239)">
				<option value="Drainage problem">Drainage problem</option>
				<option value="Garbage collection">Garbage collection</option>
				<option value="Street lights">Street lights</option>
				<option value="Stagnant water">Stagnant water</option>
				<option value="viral disease">viral disease</option>
				<option value="Increase of Mosquitoes">Increase of Mosquitoes</option>
				<option value="Ration ">Ration </option>
				<option value="Others">Others</option>
			</select><br><br>
			<label>Description:</label><br>
			<textarea name="desc" placeholder="Not more than 100 words" style="width: 100%;height: 60px;background-color: rgb(240, 223, 239)" ></textarea><br><br>
			<input type="submit" name="" class="box" style=" margin-left: 130px;"value="Register">
			</form>
		</div>
		<h3 style="margin-left: 300px;">
			<?php 
				if(isset($_GET['count'])){
					echo 'Complaint registered Successfully and complaint Id is '. $_GET['count'];
				}
				else
			 ?>
		</h3>
		</body>
</html>