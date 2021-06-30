<?php 
	session_start();
 
	define("filepath", "../Files/data.json");

    $firstName = $lastName =$phone = $accountType = $gender = $birthday = $userName = $password = $email = "";

	$fileData = read();
	$fileData = json_decode($fileData,true);

	foreach($fileData as $candidate) {
		if($candidate['userName'] === $_SESSION['userName'])
		{
			$firstName = $candidate['firstname'];
			$lastName = $candidate['lastname'];
			$gender = $candidate['gender'];
			$birthday = $candidate['birthday'];
			$userName = $candidate['userName'];
			$phone = $candidate['phone'];
			$email = $candidate['email'];
			$accountType = $candidate['accountType'];
			break;
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
