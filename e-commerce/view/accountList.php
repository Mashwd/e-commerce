<?php 
	include ("../Controller/Include/config.php");
	require("../Controller/deletehandler.php"); 

	$fileData = read();
	$fileData = json_decode($fileData,true);
	if(empty($fileData))
	{
		$totalaccount = 0;
	}
	else
	{
		$totalaccount = count($fileData); 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include ("../Controller/Include/title.php"); ?>
</head>
<body style="background: #F3F3F3;">
	<?php include ("../Controller/Include/Templete.php"); ?>

	<div style="display: grid; place-items: center center"> 

		<hr style="height: 2px; width: 50%; background-color: seagreen; ">
		
		<fieldset style="border-radius: 10px; border-width: 2px; border-color: seagreen;">

			<form style="display: inline-flex;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" autocomplete="off">

				<label for = "delete" style="font-weight: bold;">Delete user:</label>
				<input type="text" name="delete" id="delete" value="" title="input your text">

				<input type="submit" name="submit" value="delete" style="color: red;">

				<span style="color: green;"><?php echo $successfulMessage; ?></span>

				<span style="color: red;"><?php echo $errorMessage.$userNameErr; ?></span>

			</form>

			<span style="float: right;">total account: <?php echo $totalaccount?></span><br>			
			<p style="text-align: center; color: orangered; font-size: 17px bold;"><b>1. Admin list</b></p>
			
			<?php
			//Admin list:

			echo "<table border = 2px style='margin-left: auto; margin-right: auto'>";
		    echo "<tr>";
		    echo "<th>";
		    echo "Username";
		    echo "</th>";
		    echo "<th>";
		    echo "Account Type";
		    echo "</th>";
			echo "<th>";
		    echo "First name";
		    echo "</th>";
		    echo "<th>";
		    echo "Last name";
		    echo "</th>";
		    echo "<th>";
		    echo "Gender";
		    echo "</th>";
		    echo "<th>";
		    echo "Birthday";
		    echo "</th>";
		    echo "<th>";
		    echo "Email";
		    echo "</th>";
		    echo "<th>";
		    echo "Phone";
		    echo "</th>";
		    echo "<th>";
		    echo "Join";
		    echo "</th>";
		    echo "</tr>"; 
		    if(!empty($fileData)){
				foreach($fileData as $item) {
					if($item['accountType'] === "Admin"){
						echo "<tr>";
						echo "<td style ='color: orangered;'>";
						echo $item['userName'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['accountType'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['firstname'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['lastname'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['gender'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['birthday'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['email'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['phone'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['startTime'];
						echo "</td>";
						echo "</tr>";
					}
			    }
			}
		    echo "</table>";
		    ?>

		    <br>
		    <h4 style="text-align:center; color: blue;">2. Moderator list</h4>

		    <?php
		    //Moderator List:

		    echo "<table border = 2px style='margin-left: auto; margin-right: auto'>";
		    echo "<tr>";
		    echo "<th>";
		    echo "Username";
		    echo "</th>";
		    echo "<th>";
		    echo "Account Type";
		    echo "</th>";
			echo "<th>";
		    echo "First name";
		    echo "</th>";
		    echo "<th>";
		    echo "Last name";
		    echo "</th>";
		    echo "<th>";
		    echo "Gender";
		    echo "</th>";
		    echo "<th>";
		    echo "Birthday";
		    echo "</th>";
		    echo "<th>";
		    echo "Email";
		    echo "</th>";
		    echo "<th>";
		    echo "Phone";
		    echo "</th>";
		    echo "<th>";
		    echo "Join";
		    echo "</th>";
		    echo "</tr>"; 

		    if(!empty($fileData)){
				foreach($fileData as $item) {
					if($item['accountType'] === "Moderator"){
						echo "<tr>";
						echo "<td style ='color: blue;'>";
						echo $item['userName'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['accountType'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['firstname'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['lastname'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['gender'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['birthday'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['email'];
						echo "</td>";
						echo "<td style ='color: blue;'>";
						echo $item['phone'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['startTime'];
						echo "</td>";
						echo "</tr>";
					}
			    }
			}
		    echo "</table>";
		    ?>

		    <br>
		    <h4 style="text-align:center; color: purple;">3. Buyer list</h4>

		    <?php
		    //Buyer List:

		    echo "<table border = 2px style='margin-left: auto; margin-right: auto'>";
		    echo "<tr>";
		    echo "<th>";
		    echo "Username";
		    echo "</th>";
		    echo "<th>";
		    echo "Account Type";
		    echo "</th>";
			echo "<th>";
		    echo "First name";
		    echo "</th>";
		    echo "<th>";
		    echo "Last name";
		    echo "</th>";
		    echo "<th>";
		    echo "Gender";
		    echo "</th>";
		    echo "<th>";
		    echo "Birthday";
		    echo "</th>";
		    echo "<th>";
		    echo "Email";
		    echo "</th>";
		    echo "<th>";
		    echo "Phone";
		    echo "</th>";
		    echo "<th>";
		    echo "Join";
		    echo "</th>";
		    echo "</tr>"; 

		    if(!empty($fileData)){
				foreach($fileData as $item) {
					if($item['accountType'] === "Buyer"){
						echo "<tr>";
						echo "<td style ='color: purple;'>";
						echo $item['userName'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['accountType'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['firstname'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['lastname'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['gender'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['birthday'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['email'];
						echo "</td>";
						echo "<td style ='color: purple;'>";
						echo $item['phone'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['startTime'];
						echo "</td>";
						echo "</tr>";
					}
			    }
			}
		    echo "</table>";
		    ?>

		    <br>
		    <h4 style="text-align:center; color: deepskyblue;">4. Seller list</h4>

		    <?php

		    //Seller List:

		    echo "<table border = 2px style='margin-left: auto; margin-right: auto'>";
		    echo "<tr>";
		    echo "<th>";
		    echo "Username";
		    echo "</th>";
		    echo "<th>";
		    echo "Account Type";
		    echo "</th>";
			echo "<th>";
		    echo "First name";
		    echo "</th>";
		    echo "<th>";
		    echo "Last name";
		    echo "</th>";
		    echo "<th>";
		    echo "Gender";
		    echo "</th>";
		    echo "<th>";
		    echo "Birthday";
		    echo "</th>";
		    echo "<th>";
		    echo "Email";
		    echo "</th>";
		    echo "<th>";
		    echo "Phone";
		    echo "</th>";
		    echo "<th>";
		    echo "Join";
		    echo "</th>";
		    echo "</tr>"; 

		    if(!empty($fileData)){
				foreach($fileData as $item) {
					if($item['accountType'] === "Seller"){
						echo "<tr>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['userName'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['accountType'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['firstname'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['lastname'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['gender'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['birthday'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['email'];
						echo "</td>";
						echo "<td style ='color: deepskyblue;'>";
						echo $item['phone'];
						echo "</td>";
						echo "<td style ='color: orangered;'>";
						echo $item['startTime'];
						echo "</td>";
						echo "</tr>";
					}
		    	}
		    }
		    echo "</table><br>";
			
		
	?>
	</fieldset>

</div>
	<?php include ("../Controller/Include/Footer.php"); ?>
</body>
</html>