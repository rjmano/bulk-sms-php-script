<?php

function sendsms($number, $message)
{
    $username = 'username';
    $password = 'password';

    //set POST variables
    $url = 'http://bulksms.2way.co.za/eapi/submission/send_sms/2/2.0';

    $fields = array(
      'username' => urlencode($username),
      'password' => urlencode($password),
      'message'  => urlencode($message),
      'msisdn'   => urlencode($number)
     );

    $fields_string = '';

    //url-ify the data for the POST
    foreach($fields as $key=>$value)
    {
      $fields_string .= $key.'='.$value.'&';
    }

    rtrim($fields_string,'&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    return $result;
	
	//by using this code you can send bulk sms by adding this php script in your web app
}