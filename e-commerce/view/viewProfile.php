<?php 
	require("../Controller/view_profile.php"); 
	include ("../Controller/Include/config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include ("../Controller/Include/title.php"); ?>
</head>
<body style="background: #F3F3F3;">
	
    <?php include ("../Controller/Include/Templete.php"); ?>

	<div style="display: grid; place-items: center center">
		<hr style="height: 2px; width: 15%; background-color: seagreen; ">	

		<fieldset style="border-radius: 10px; background-color: #E9FFFF; border-width: 2px;">
			<p><b>Username: </b><?php echo $userName; ?></p>
			<p><b>Account type: </b><?php echo $accountType; ?></p>
			<p><b>First Name: </b><?php echo $firstName; ?></p>
			<p><b>Last Name: </b><?php echo $lastName; ?></p>
			<p><b>Gender: </b><?php echo $gender; ?></p>
			<p><b>Date of Birth: </b><?php echo $birthday; ?></p>
			<p><b>Phone: </b>
				<?php 
					if(empty($phone))
					{
						$phone = "Not Provided";
					}
					echo $phone; 
				?></p>
			<p><b>Email: </b><?php echo $email; ?></p><br>

			<a href="editProfile.php" style="float: right;">Edit</a>
		</fieldset>
	</div>
	
<?php include ("../Controller/Include/Footer.php"); ?>
</body>
</html>