<?php 
	session_start();
	define("filepath", "../Files/data.json");
	define("filepath1", "../Files/notice.json");

	$logoutMsg = $notice = $noticeMsg = "";

	$totalModerator = $totalBuyer = $totalSeller = $totalAccount = 0;

	$bestModerator = $bestBuyer = $bestSeller = "";
	$maxM = $maxB = $maxS = date('d-m-y h:i:s');

	if($_SERVER['REQUEST_METHOD'] === "POST") {

		if(isset($_POST['logout']))
		{ 
			session_destroy();
			$logoutMsg = "Successfully log-out.";
			header("Location: /e-commerce/Index.php? Msg= $logoutMsg");
		}
		if(!empty($_POST['notice'])){
			$notice = $_POST['notice'];
			$account = $_SESSION['accountType'];

			$fileData = readNotcie();
			$index = 0;

	        if(empty($fileData)) {
	        	$data[] = array("index" => $index, "sys" => $account, "notice" => $notice, "time" => date('d-m-y h:i:s'));
	        }
	        else {
		        $data = json_decode($fileData);
		        $temp = array("index" => $index, "sys" => $account, "notice" => $notice, "time" => date('d-m-y h:i:s'));
	        	array_push($data, $temp);
	        }
	        $data_encode = json_encode($data);
	        write("");
	        $result1 = write($data_encode);
	        if($result1) {
	        	$noticeMsg = "Successfully posted.";
	        }
	        else {
	        	$errorMessage = "Error while posting.";
	        }
		}


	}

	$data = read();
	$data = json_decode($data,true);
	
	foreach($data as $candidate)  {

	    if($candidate['accountType'] === "Moderator")
	    {
	    	if($maxM > $candidate['startTime'])
	    	{
	    		$maxM = $candidate['startTime'];
	    		$bestModerator = $candidate['userName'];
	    	}
	    	$totalModerator++;
	    }
	    else if($candidate['accountType'] === "Buyer")
	    {
	    	if($maxB > $candidate['startTime'])
	    	{
	    		$maxB = $candidate['startTime'];
	    		$bestBuyer = $candidate['userName'];
	    	}
	    	$totalBuyer++;
	    }
	    else if($candidate['accountType'] === "Seller")
	    {
	    	if($maxS > $candidate['startTime'])
	    	{
	    		$maxS = $candidate['startTime'];
	    		$bestSeller = $candidate['userName'];
	    	}
	    	$totalSeller++;
	    }

	    $totalAccount++;
	    
    }

    $totalAccount--;

    if($totalSeller === 0)
    {
    	$maxS = "00-00-00 00:00:00";
    	$bestSeller = "none";
    }
    if($totalBuyer === 0)
    {
    	$maxB = "00-00-00 00:00:00";
    	$bestBuyer = "none";
    }
    if($totalModerator === 0)
    {
    	$maxM = "00-00-00 00:00:00";
    	$bestModerator = "none";
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
	function write($content) {
        $resource = fopen(filepath1, "w");
        $fw = fwrite($resource, $content);
        fclose($resource);
        return $fw;
    }

?>
