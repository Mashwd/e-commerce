<?php 
	define("filepath", "../Files/data.json");

    $firstName = $lastName = $accountType = $userName = $password = $password1 =  $email = "";
    
    $userNameErr = $passwordErr = $emailErr = $firstNameErr = $lastNameErr = $accountTypeErr = "";
    
    $successfulMessage = $errorMessage = $passSuccessfulMsg = $emailMsg = $passMsg = $passSuccessfulMsg1 = "";
    $flag = false;

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];  
        $email = $_POST['email'];      
        $userName = $_POST['username'];
        $password = $_POST['password'];


        if(empty($firstName)) {
	        $firstNameErr = "First name can not be empty!";
	        $flag = true;
        }
        if(empty($lastName)) {
	        $lastNameErr = "Last name can not be empty!";
	        $flag = true;
        }
        if(empty($email)) {
	        $emailErr = "Email can not be empty!";
	        $flag = true;
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	$emailMsg = "Invalid email format";
		  	$flag = true;
		}
		if(empty($_POST['accountType'])) {
	        $accountTypeErr = "Account type can not be empty!";
	        $flag = true;
        }
        if(empty($userName)) {
	        $userNameErr = "Username can not be empty!";
	        $flag = true;
        }
        else 
        {
        	$userName = test_input($userName);
        	$password = htmlspecialchars($password);

        	$fileData = read();
    		$fileData = json_decode($fileData,true);
    		 
	    	foreach((object)$fileData as $candidate) {
			    if($candidate['userName'] === $userName)
			    {
			    	$flag = True;
			    	$userNameErr = "Username alreay exist!";
			    	break;
			    }
		    }
        }
        if(empty($password)) {
	        $passwordErr = "Password can not be empty!";
	        $flag = true;
        }
        else
        {
        	$number = preg_match('@[0-9]@', $password);
			 
			if(strlen($password) < 6) {
			    $passMsg = "Password must be at least 6 characters in length and must contain at least one number.";
			    $flag = true;
			} 
			else if(htmlspecialchars($password) !== $_POST['password1'] ) {
				$passSuccessfulMsg1 = "Your password didn't matched.";
			    $flag = true;
			}
			else
			{
				$passSuccessfulMsg = "Your password matched.";
			}
        }
        if(!$flag) {
	        $firstName = test_input($firstName);
	        $lastName = test_input($lastName);
	        $email = test_input($email);
	        $accountType = $_POST['accountType'];
	        $userName = test_input($userName);
	        $password = htmlspecialchars($password);
	        $password1 = htmlspecialchars($password);
	        

			$fileData = read();

	        if(empty($fileData)) {
	        	$data[] = array("firstname" => $firstName, "lastname" => $lastName, "gender" => "", "birthday" => "", "phone" => "", "email" => $email, "accountType" => $accountType, "userName" => $userName, "password" => $password, "startTime" => date('d-m-y h:i:s'));
	        }
	        else {
		        $data = json_decode($fileData);
		        $temp = array("firstname" => $firstName, "lastname" => $lastName, "gender" => "", "birthday" => "", "phone" => "", "email" => $email, "accountType" => $accountType, "userName" => $userName, "password" => $password, "startTime" => date('d-m-y h:i:s'));
	        	array_push($data, $temp);
	        }
	        $data_encode = json_encode($data);
	        write("");
	        $result1 = write($data_encode);
	        if($result1) {
	        	$successfulMessage = "'s registration successfully done.";
	        }
	        else {
	        	$errorMessage = "Error while saving.";
	        }	
    	}
}

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function read() {
	    $resource = fopen(filepath, "r");
	    $fz = filesize(filepath);
	    $fr = "";
	    if($fz > 0) {
	    	$fr = fread($resource, $fz);
    	}
	    fclose($resource);
	    return $fr;
	}
	function write($content) {
        $resource = fopen(filepath, "w");
        $fw = fwrite($resource, $content);
        fclose($resource);
        return $fw;
    }
    
?>
