<?php
date_default_timezone_set('America/New_York');
$emails = file('delete.csv');
$rid = "004cdd91e828c3a98c6dbeaa8eb816a1";
require('sdk/ET_Client.php');
$myclient = new ET_Client();
foreach ($emails as $email) {
	$email = trim($email);
	$subscriber = new ET_Subscriber();
	$subscriber->authStub = $myclient;
	$subscriber->props = array("EmailAddress" => $email, "Lists" => array("ID" => 1295684));
	$results = $subscriber->delete();
	$status = $results->results[0]->StatusCode;
	if ($status === 'OK') {
		echo $email . " deleted.\n";
	} else {
		echo $email . " NOT DELETED.\n";
	}
}
?>
