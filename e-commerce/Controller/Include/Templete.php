<div>

	<span style="background: seagreen; text-align: center; color: white; height: 90px; display: block;"><br><span style="text-align: center; font-size: 40px;"><img src="\e-commerce\logo\e-shop.png" alt="logo" style="width: 25px; height: 25px">E-Shop<span style="text-align: center; font-size: 10px;">You shop, We ship</span></span></span>
<br>

<button style="background-color: #800000; color: white; " onclick="document.location.href='/e-commerce/view/adminHome.php'">Home</button>
<button style="background-color: #800000; color: white;" onclick="document.location.href='/e-commerce/view/viewProfile.php'">View Profile</button>
<button style="background-color: #800000; color: white;" onclick="document.location.href='/e-commerce/view/editProfile.php'">Edit Profile</button>

<button style="background-color: #800000; color: white;" onclick="document.location.href='/e-commerce/view/accountList.php'">Account list</button>

<button style="background-color: #800000; color: white;" onclick="document.location.href='/e-commerce/view/addAccount.php'">Add accounts</button>

<button style="background-color: #800000; color: white;" onclick="document.location.href='/e-commerce/view/postedNotice.php'">Notice</button>

<form style="display: inline-flex; float: right;" action="/e-commerce/Controller/admin_home.php" method="POST">
	<input type="submit" name="logout" value="log out" style="background-color: orangered; color: white; float:right; ">
</form>
<!--
<button style="background-color: orangered; color: white; float:right; " onclick="document.location.href='log-out.php'">log out</button>
-->

<span style="float: right; display: inline-flex;">Hey <em style="color: forestgreen;">'<?php echo $_SESSION['userName'] ?>',</em>You are logged in as <b style="color: red;">'<?php echo $_SESSION['accountType'] ?>' &nbsp</b></span>

</div>

<hr style="display: block; width: 100%;">

<h2 style="text-align:center; color: seagreen;"><?php echo $CURRENT_PAGE; ?></h2>

