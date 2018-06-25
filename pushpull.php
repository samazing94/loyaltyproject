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
	
	//print_r($segmented);


	//$sms = explode('+', $segmented[1]);
	// print_r($sms);
	//$phone_str = explode('phone=', $segment[0]); 
	
	//allocating values to respective vars
	$phone = $msisdn;
	$hotkey = $segmented[0];
	$subhotkey = $segmented[1];
	$name = $segmented[2];
	$dob = $segmented[3];
	$profession = $segmented[4];
	$location = $segmented[5];
	$points = 100;
	//db con
	$conn = mysqli_connect("localhost", "root", "", "loyal_db");
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
			$sql = "INSERT INTO customers (subhotkey, dob, location, profession, points, phone, hotkey, name) VALUES ('$subhotkey', '$dob', '$location', '$profession', $points, $phone, '$hotkey', '$name' )";
		mysqli_query($conn, $sql);
		 echo "Thank you for registering, you got 100 points!";
		}
	}

