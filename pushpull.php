<?php

	//breaking string into several sequences for var store
	//$actual_link = "$_SERVER[REQUEST_URI]";
	//$ur = explode('+', $ur);
	//$parsedurl = parse_url($actual_link, PHP_URL_QUERY);
	//echo $parsedurl;
	//$segment = (explode('&', $parsedurl)); 
	// print_r('print phone');
	// print_r($segment);
	//$sms = print_r($_REQUEST);
	$msisdn = $_REQUEST['msisdn'];
	$sms = $_REQUEST['sms'];

	$segmented = explode(' ' , $sms);

	//$sms = explode('+', $segmented[1]);
	// print_r($sms);
	//$phone_str = explode('phone=', $segment[0]); 
	
	//allocating values to respective vars
	

	$phone = $msisdn;
	$hotkey = "RST";
	// $subhotkey = $segmented[1];
	// $name = $segmented[2];
	// $dob = $segmented[3];	
	// $profession = $segmented[4];
	// $location = $segmented[5];

	$subhotkey = !empty($segmented[1]) ? $segmented[1] : "NULL";
	$name = !empty($segmented[2]) ? $segmented[2] : "NULL";
	$dob = !empty($segmented[3]) ? $segmented[3] : "NULL";
	$profession = !empty($segmented[4]) ? $segmented[4] : "NULL";
	$location = !empty($segmented[5]) ? $segmented[5] : "NULL";
	$points = 100;
	//db con
	$conn = mysqli_connect("localhost", "root", "", "loyal_db");
	// $phone = mysqli_real_escape_string($conn, $phone);
	// $hotkey = mysqli_real_escape_string($conn, $hotkey);
	// $subhotkey = mysqli_real_escape_string($conn, $subhotkey);
	// $name = mysqli_real_escape_string($conn, $name);
	// $dob = mysqli_real_escape_string($conn, $dob);
	// $profession = mysqli_real_escape_string($conn, $profession);
	// $location = mysqli_real_escape_string($conn, $location);
	
	if(!$conn)
	{
		die ("Connection failed: " . mysqli_connect_error());
	}
	// INSERT INTO customers (subhotkey, dob, location, profession, points, phone, hotkey, name) VALUES (subhotkey, dob, location, profession, points, phone, hotkey, name )
	else {
		$sql1 = "SELECT * FROM customers WHERE phone = $phone";
		$result = mysqli_query($conn, $sql1);
		$rowcount = mysqli_num_rows($result);
		if($rowcount){
			echo "This number is already registered";
		}
		else
		{
			$arrlength = count($segmented);
			if ($arrlength != 5)
				echo "Invalid format, try again";
			else 
			{
				$sql = "INSERT INTO customers (subhotkey, dob, location, profession, points, phone, hotkey, name) VALUES ('$subhotkey', '$dob', '$location', '$profession', $points, $phone, '$hotkey', '$name' )";
				mysqli_query($conn, $sql);
		 		echo "Thank you for registering, you got 100 points!";
		 	}
		}
	}

