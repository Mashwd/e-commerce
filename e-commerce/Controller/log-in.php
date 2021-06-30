<?php 
	define("filepath", "../Files/data.json");

    $userName = $password = $email = "";
    $userNameErr = $passwordErr = "";
    $successfulMessage = $errorMessage = "";
    $flag = false;
    $logFlag = false;

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $userName = $_POST['username'];
        $password = $_POST['password'];

        if(empty($userName)) {
	        $userNameErr = "Username can not be empty!";
	        $flag = true;
        }
        if(empty($password)) {
	        $passwordErr = "Password can not be empty!";
	        $flag = true;
        }
        if(!$flag)
        {
        	 $userName = test_input($userName);
        	 $password = trim(htmlspecialchars($password));

        	 $fileData = read();
    		 $fileData = json_decode($fileData,true);
    		 
	    	foreach((object)$fileData as $candidate) {
			    if($candidate['userName'] === $userName and $candidate['password'] === $password)
			    {
			    	if($candidate['accountType'] === "Admin") {
			    		$logFlag = True;
			    		session_start();
				    	$_SESSION['userName'] = $candidate['userName'];
				    	$_SESSION['accountType'] = $candidate['accountType'];
				    	header('Location: /e-commerce/view/adminHome.php ');
			    	}
			    	else if($candidate['accountType'] === "Buyer"){
			    		echo "You are a Buyer";
			    		$logFlag = True;
			    			
		    		}
		    		else if($candidate['accountType'] === "Seller"){
		    			echo "You are a Buyer";
		    			$logFlag = True;
		    		}
		    		else if($candidate['accountType'] === "Moderator"){
		    			echo "You are a Moderator";
		    			$logFlag = True;
		    		}	
			    }
		    }

		    if(!$logFlag)
		    {
		    	$errorMessage = "log-in failed.";
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
    
?>
