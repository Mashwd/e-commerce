<?php
	session_start();
	include ("../Controller/Include/config.php");
	define("filepath1", "../Files/notice.json");	

?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include ("../Controller/Include/title.php"); ?>
</head>
<body>
	<?php include ("../Controller/Include/Templete.php"); ?>
	<hr style="width: 35%; align-content: center;">
	<div style="display: flex; justify-content: center; align-content: center;">
		<fieldset style="border-radius: 20px;">
		<?php
			$fileData = readNotcie();
			$fileData = json_decode($fileData,true);
			echo "<ul style='list-style-type:square';>";
			foreach ($fileData as $notice) {
				
				echo "<li>";
				echo "<span style = 'color:red;'>['".$notice['sys']."']</span>".": ".$notice['notice']."<span style = 'color:blue; float: right'>&nbsp&nbsp&nbsp&nbsp Sent: ".$notice['time']."</span>.";
				echo "</li>";
				echo "<hr>";
			}
			echo "</ul>";
			function readNotcie() {
			    $resource = fopen(filepath1, "r");
			    $fz = filesize(filepath1);
			    $fr = "";
			    if($fz > 0) {
			    	$fr = fread($resource, $fz);
		    	}
			    fclose($resource);
			    return $fr;
			}
		?>
		</fieldset>
	</div>
	<?php include ("../Controller/Include/Footer.php"); ?>

</body>
</html>