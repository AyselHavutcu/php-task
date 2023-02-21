<?php
function getAccessToken(){
    $curl = curl_init();
    curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.baubuddy.de/index.php/login",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"username\":\"365\", \"password\":\"1\"}",
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
function getTaskData(){
    $token = getAccessToken();
    $curl = curl_init();
		$request = "{\"username\":\"365\", \"password\":\"1\"}";

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.baubuddy.de/dev/index.php/v1/tasks/select",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => $request,
			  CURLOPT_HTTPHEADER => array(
				    "authorization: Bearer $token",
				    "content-type: application/json",
				  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);
			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  //echo $response;
			}
			curl_close($curl);
            $task_data = json_decode($response, true);
            return $task_data;

  }
?>