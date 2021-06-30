<?php 
	require("../Controller/createAccount.php"); 
	include ("../Controller/Include/config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include ("../Controller/Include/title.php"); ?>
</head>
<body style="background: #F3F3F3;">

	
	<div>
	    <span style="background: seagreen; text-align: center; color: white; height: 90px; display: block;"><br><span style="text-align: center; font-size: 40px;"><img src="\e-commerce\logo\e-shop.png" alt="logo" style="width: 25px; height: 25px">E-Shop<span style="text-align: center; font-size: 10px;">You shop, We ship</span></span></span>
	    <button style="margin-left: 3px; background: #800000; color: white;" onclick="document.location.href='/e-commerce/Index.php'">Start</button>
	    <button style="margin-left: 3px; background: #800000; color: white;" onclick="document.location.href='/e-commerce/view/login.php'">login</button>

    </div>
    <hr>

	<div style="display: grid; place-items: center center">
		<br>
		<img src="\e-commerce\logo\Register.png" alt="logo" style="width: 40px; height: 40px">

		<h2 style="text-align:center; margin-bottom: 5px"><?php echo $CURRENT_PAGE; ?></h2> 

		<hr style="height:2px;border-width:0;color:gray;background-color:gray">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete = 'on'>

			<fieldset style="border-color: seagreen; border-width: 1px; border-radius: 10px;">

				<fieldset style="border: none;">
					<legend style="text-align: center; margin-bottom: 10px; color: seagreen;">--Personal Information--</legend>

					<label for="firstname">First Name <span style="color: red;">*</span>: </label>
					<input type="text" name="firstname" id="firstname" value="<?php echo $firstName; ?>">
					<span style="color: red;"><?php echo $firstNameErr; ?></span>
					<br><br>

					<label for="lastname">Last Name <span style="color: red;">*</span>: </label>
					<input type="text" name="lastname" id="lastname" value="<?php echo $lastName; ?>" style ="margin-left: 2px;">
					<span style="color: red;"><?php echo $lastNameErr; ?></span>

				    <hr style="height: 1px; margin-top: 15px; border-width: 0px; background-color: seagreen;">


				</fieldset>

				<fieldset style="border: none;">
			  	<legend style="text-align: center; margin-bottom: 10px; color: seagreen;">--Account Information--</legend>

			  		<label for="accountType">Account Type<span style="color: red;">*</span>:</label>

				    <input type="radio" id="accountType" name="accountType" value="Seller"<?php if(!empty($_POST['accountType']) && $_POST['accountType'] == 'Seller') { echo 'checked="checked"';} ?>>

				    <label for="Seller">Seller</label>

				    <input type="radio" id="accountType" name="accountType" value="Buyer"<?php if(!empty($_POST['accountType']) && $_POST['accountType'] == 'Buyer') { echo 'checked="checked"';} ?>>

				    <label for="Buyer">Buyer</label>

				    <span style="color: red;"><?php echo $accountTypeErr; ?></span>

				    <br><br>

					<label for="username">Username <span style="color: red;">*</span>: </label>
					<input type="text" name="username" id="username" value="<?php echo $userName; ?>">
					<span style="color: red; "><?php echo $userNameErr; ?></span>

					<br><br>

					<label for="password">Password <span style="color: red;">*</span>: </label>
					<input type="password" name="password" id="password" value="<?php echo $password; ?>" style ="margin-left: 4px;">
					<span style="color: red;"><?php echo $passwordErr . $passMsg; ?></span>

					<br><br>

					<label for="password1">Confirm Password <span style="color: red;">*</span>: </label>
					<input type="password" name="password1" id="password" value="<?php echo $password1; ?>" style ="margin-left: 4px;">

					<br>

					<span style="color: red; float: right"><?php echo $passwordErr . $passMsg; ?></span>
					<span style="color: green; float: right;"><?php echo $passSuccessfulMsg; ?></span>
					<span style="color: red; float: right"><?php echo $passSuccessfulMsg1; ?></span>
					<br>

					<hr style="height: 1px; margin-top: 15px; border-width: 0px; background-color: seagreen;">

			  	</fieldset>

				

				<fieldset style="border: none;">
			    <legend style="text-align: center; color: seagreen; margin-bottom: 10px;">--Contact Information--</legend>

				    <label for="email">Email<span style="color: red;">*</span>:</label>
				    <input type="email" id="email" name="email" value="<?php echo $email; ?>" >
				    <span style="color: red;"><?php echo $emailErr.$emailMsg; ?></span>

			  	</fieldset>
			  	<input type="submit" name="submit" value="Register" style="margin-right: 2px; float: right;">
		  	</fieldset>
			 
		</form>
		

		<span style="color: green; text-align: center"><?php echo $accountType.$successfulMessage; ?></span>

		<br>		
		<span style="float: right;">Already have an account?<a href="login.php">log in</a></span>
		

</div>
<?php include ("../Controller/Include/Footer.php"); ?>
</body>
</html>