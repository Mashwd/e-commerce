<?php 
	require("../Controller/admin_home.php");
	include ("../Controller/Include/config.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include ("../Controller/Include/title.php"); ?>
</head>
<body>
	
	<?php include ("../Controller/Include/Templete.php"); ?>

    

	<br><br>
	
	<div style="display: flex; justify-content: center; align-content: center;">
		<table border = 2px>
			<tr>
				<td style="text-align: center; font-size: 25px; color: burlywood; font-weight: bold;">
					<?php echo "Total Account: ".$totalAccount; ?>
				</td>
				<td style="text-align: center; font-size: 25px; color: blue; font-weight: bold;">
					<?php echo "Total Moderator: ".$totalModerator; ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 25px; color: deepskyblue; font-weight: bold;">
					<?php echo "Total Seller: ".$totalSeller; ?>
				</td>
				<td style="text-align: center; font-size: 25px; color: purple; font-weight: bold;">
					<?php echo "Total Buyer: ".$totalBuyer; ?>
				</td>
				
			</tr>
		</table>
	</div>

	<br><br>

	<span style="font-size: 20px; color: forestgreen;display: flex;justify-content: center; align-content: center; font-weight: bold;">Most old Accounts</span>

	<br>

	<div style="display: flex; justify-content: center; align-content: center;">

		<br><br>
		
		<table border = 2px>
			<tr  style = "font-size: 20px;">
				<th style="text-align: center;">
					<?php echo "Category"; ?>
				</th>
				<th style="text-align: center;">
					<?php echo "Username"; ?>
				</th>
				<th style="text-align: center;">
					<?php echo "Join"; ?>
				</th>
			</tr>
			<tr style="color: blue; font-weight: bold;font-size: 20px;">
				<td style="text-align: center;">
					<?php echo "Moderator"; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $bestModerator; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $maxM; ?>
				</td>
				
			</tr>
			<tr style="color: purple; font-weight: bold;font-size: 20px;">
				<td style="text-align: center;">
					<?php echo "Buyer"; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $bestBuyer; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $maxB; ?>
				</td>
				
			</tr>
			<tr style="color: deepskyblue; font-weight: bold;font-size: 20px;">
				<td style="text-align: center;">
					<?php echo "Seller"; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $bestSeller; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $maxS; ?>
				</td>
				
			</tr>
		</table>
	</div>
	<br><br>

	<span style="font-size: 20px; color: forestgreen;display: flex;justify-content: center; align-content: center; font-weight: bold;">Post Notice:</span>
	<br>
	<div style="display: flex; justify-content: center; align-content: center;">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
			<textarea style=" border-width: 2px; resize: none;"  rows="5" cols="50" name = "notice" ></textarea>

			<br>

			<input type="submit" name="submit" value="notice" style="float: right;"></form>
			<br><br>

			
		</form>
	</div>
	<span style="color: forestgreen ;display: flex;justify-content: center; align-content: center;"> <?php echo $noticeMsg; ?></span>
	<br>
<?php include ("../Controller/Include/Footer.php"); ?>
</body>

</html>