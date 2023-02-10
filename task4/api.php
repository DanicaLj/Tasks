<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Content-Type: application/json');

	include_once 'database.php';
	$db = new Database();
	$api = $_SERVER['REQUEST_METHOD'];

	if ($api == 'GET') {
	   $data = $db->getOrders();
	  echo json_encode($data);
	}
?>