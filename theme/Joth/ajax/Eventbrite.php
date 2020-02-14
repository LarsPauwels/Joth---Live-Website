<?php
require_once('../vendor/autoload.php');

$key = "CVCOGHUBBWB42TOOWNS5";
$domain = "https://www.eventbriteapi.com/v3";
$userId = "296318835154";
$url = $domain."/users/".$userId."/events?token=".$key;

$client = new GuzzleHttp\Client();
$res = $client->request('GET', $url);

$result = json_decode((string) $res->getBody());

if ($res->getStatusCode() == 200) {
	$result = [
		"status" => "success",
		"status_code" =>  $res->getStatusCode(),
		"message" => "data successfully pulled from API.",
		"data" => $result
	];
} else {
	$result = [
		"status" => "error",
		"status_code" => $res->getStatusCode(),
		"message" => "Something went wrong."
	];
}

echo json_encode($result);