<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Content-Type: application/json');

	require_once('vendor/autoload.php');
	include_once 'database.php';
	include_once 'customer.php';

	$db = new Database();
	$customer = new Customer();
	$api = $_SERVER['REQUEST_METHOD'];
	$headers = apache_request_headers();
	$authorization = isset($headers['Authorization']) ? $headers['Authorization'] : null;
	$authorizationToken = $db->getBearerToken($authorization);

	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();

	if($authorizationToken && $authorizationToken == $_ENV['AUTHORIZATION']) {
		
		if ($api == 'POST') {
			$postData = json_decode(file_get_contents('php://input'),true);
			$missingFields = $customer->validateFields($postData);
			
			if (!empty($missingFields)) {
				echo $db->message('Missing fields: ' . implode(",", $missingFields),true);
				exit;
			}
			
			$customer->setFirstname($postData['firstname']);
			$customer->setLastname($postData['lastname']);
			$customer->setEmail($postData['email']);
			$customer->setPhone($postData['phone']);
			$customer->setUsername($postData['username']);
			$customer->setPassword($postData['password']);
			$customer->setCity($postData['city']);
			$customer->setPostcode($postData['postcode']);
			$customer->setAddress($postData['address']);
			
			$result = $db->registerCustomer($customer);
			echo $result ? $db->message('Success',false) : $db->message('Error occured',true);
		}
	} else {
		echo $db->message('Authorization required!',true);
	}
