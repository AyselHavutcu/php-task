<?php

//Global variables to be used for each curl session
$curlopt_returnt_ransfer = true;
$curlopt_encoding = "";
$curlopt_maxredirs = 10;
$curlopt_timeout = 30;
$curlopt_http_version = CURL_HTTP_VERSION_1_1;
$curlopt_postfields = "{\"username\":\"365\", \"password\":\"1\"}";

function get_access_token()
{
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.baubuddy.de/index.php/login",
    CURLOPT_RETURNTRANSFER =>  $GLOBALS['curlopt_returnt_ransfer'],
    CURLOPT_ENCODING => $GLOBALS['curlopt_encoding'],
    CURLOPT_MAXREDIRS =>  $GLOBALS['curlopt_maxredirs'],
    CURLOPT_TIMEOUT => $GLOBALS['curlopt_timeout'],
    CURLOPT_HTTP_VERSION =>  $GLOBALS['curlopt_http_version'],
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>  $GLOBALS['curlopt_postfields'],
    CURLOPT_HTTPHEADER => [
      "Authorization: Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz",
      "Content-Type: application/json"
    ],
  ]);
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {

    echo "cURL Error #:" . $err;
  } else {
    $obj = json_decode($response, true);
    $token = $obj["oauth"]["access_token"];
    return $token;
  }
}

function fetch_task_data()
{
  $token = get_access_token();
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL =>  "https://api.baubuddy.de/dev/index.php/v1/tasks/select",
    CURLOPT_RETURNTRANSFER =>  $GLOBALS['curlopt_returnt_ransfer'],
    CURLOPT_ENCODING => $GLOBALS['curlopt_encoding'],
    CURLOPT_MAXREDIRS =>  $GLOBALS['curlopt_maxredirs'],
    CURLOPT_TIMEOUT => $GLOBALS['curlopt_timeout'],
    CURLOPT_HTTP_VERSION =>  $GLOBALS['curlopt_http_version'],
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS =>  $GLOBALS['curlopt_postfields'],
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer $token",
      "content-type: application/json",
    ),
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
  }
  curl_close($curl);
  return $response;
}

//FETCH TABLE DATA
$task_data = fetch_task_data();
echo $task_data;
