<?php 
	session_start();

	define("filepath", "../Files/data.json");

    $firstName = $lastName = $phone  = $birthday = $password = $oldPassword =  $email = $gender = "";
    
    $birthdayErr = $passwordErr = $emailErr = $firstNameErr = $lastNameErr = $oldPasswordErr = $genderErr =  "";
    $successfulMessage = $errorMessage = $passSuccessfulMsg = $emailMsg = $passMsg = "";
    $flag = false;
    $flag1 = false;

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];  
        $birthday = $_POST['birthday'];
        $phone =$_POST['phone'];
        $email = $_POST['email'];      
        $password = $_POST['password'];
        $oldPassword = $_POST['oldPassword'];

        if(empty($oldPassword) && empty($password) && empty($firstName) && empty($lastName) && empty($_POST['gender']) && empty($birthday) && empty($phone) && empty($email))
	    {
	    	$flag = true;
	    	$errorMessage = "Nothing changed.";
	    }
	    else
	    {

	        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  	$emailMsg = "Invalid email format";
			  	$flag = true;
			}
			else{
				  	$flag1 = true;
			}
			if(!empty($oldPassword)){
				$oldPassword = htmlspecialchars($oldPassword);

				$fileData = read();
		        $data  = json_decode($fileData, true);

		        $f = $f1 = 0;
				foreach($data as &$candidate) {
					if($candidate['userName'] === $_SESSION['userName'] && $candidate['password'] === $oldPassword)
					{
						if(!empty($password))
				        {
				        	$number = preg_match('@[0-9]@', $password);
							 
							if(strlen($password) < 6  || !$number) {
							    $passMsg = "Password must be at least 6 characters in length and must contain at least one number.";
							    $flag = true;
							} 
							else {
								$f = 1;		
							    $passSuccessfulMsg = "Changed.";
							}
				        }
				        else
				        {
				        	$flag = true;
				        	$passwordErr = "New password can not be empty.";
				        }
				        $f1 = 1;
						break;
					}
				}

				if($f == 0 && !empty($oldPassword))
				{
					$flag = true;
					if($f1 == 0)
						$oldPasswordErr = "Wrong password.";

				}

		        
		    }
		}



        if(!$flag) {
	        $firstName = test_input($firstName);
	        $lastName = test_input($lastName);
	        $phone = test_input($phone);
	        $email = test_input($email);
	        $password = htmlspecialchars($_POST['password']);
	        if(!empty($_POST['gender']))
	        	$gender = $_POST['gender'];
	        

			$fileData = read();
	        $data  = json_decode($fileData, true);

			foreach($data as &$candidate) {
				if($candidate['userName'] === $_SESSION['userName'])
				{
					if(!empty($firstName))
						$candidate['firstname'] = $firstName;
					if(!empty($lastName))
						$candidate['lastname'] = $lastName;
					if(!empty($birthday))
						$candidate['birthday'] = $birthday;
					if(!empty($userName)){
						$candidate['userName'] = $userName;
						$_SESSION['userName'] = $userName;
					}
					if(!empty($password))
						$candidate['password'] = $password;
					if(!empty($gender))
						$candidate['gender'] = $gender;
					if(!empty($phone))
						$candidate['phone'] = $phone;
					if(!empty($email))
						$candidate['email'] = $email;
					break;
				}
			}

	        $data_encode = json_encode($data);
	        write("");
	        $result1 = write($data_encode);
	        if($result1) {
	        	$successfulMessage = "Successfully saved.";
	        }
	        else {
	        	$errorMessage = "Error while saving.";
	        }	
    	}
}

    function write($content) {
        $resource = fopen(filepath, "w");
        $fw = fwrite($resource, $content);
        fclose($resource);
        return $fw;
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
        
?>
