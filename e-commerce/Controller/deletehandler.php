<?php
	session_start(); 
	define("filepath", "../Files/data.json");

    $userName = "";
    $userNameErr = "";
    $successfulMessage = $errorMessage = "";
    $flag = false;
    $check = false;
    $position = 0;

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $userName = $_POST['delete'];

        if(empty($userName)) {
	        $userNameErr = "Enter a username to delete.";
	        $flag = true;
        }
        if(!$flag)
        {
        	 $userName = test_input($userName);

        	 $data = read();
    		 $data = json_decode($data,true);
    		 $i = -1;
	    	foreach($data as &$candidate)  {
	    		$i++;
			    if($candidate['userName'] === $userName && $_SESSION['userName'] !== $userName)
			    {
			    	$check = true;
			    	$position = $i;
			    	break;
			    }

		    }
		    if($check)
		    {
		    	unset($data[$position]);		    

		    	$data_encode = json_encode($data);
		        write("");
		        $result1 = write($data_encode);
		        if($result1) {
		        	$successfulMessage = $userName." has been deleted";
		        }
		        else {
		        	$errorMessage = "Error while saving.";
		        }
			    
		    }
		    else
		    {
		    	if($_SESSION['userName'] === $userName)
					$errorMessage = "Admin account can't be deleted.";
				else
					$errorMessage = "Username not found.";
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