<?php


$number = $_POST['number'];


$url="https://ifsc.razorpay.com/".$number;

//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$val = json_decode($result);
echo $val->ADDRESS;
echo",";
echo $val->STATE;




































?>
