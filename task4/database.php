<?php
	include_once 'connection.php';

	class Database extends Connection {

		public function getOrders() {
		   $sql = "SELECT *
			FROM orders
			INNER JOIN orderitem
			ON orders.id = orderitem.orderId";
		   $stmt = $this->conn->prepare($sql);
		   $stmt->execute();
		   $rows = $stmt->fetchAll();
		   return $rows;
		 }

	  public function registerCustomer($customer) {
	    $sql = 'INSERT INTO customers (firstname, lastname, email, phone, username,
	    password, city, postcode, address) VALUES (:firstname, :lastname, :email, :phone, :username,
	    :password, :city, :postcode, :address)';
	    try {
	    	$stmt = $this->conn->prepare($sql);
	   		$stmt->execute(['firstname' => $customer->getFirstname(), 'lastname' => $customer->getLastname(), 'email' => $customer->getEmail(), 'phone' => $customer->getPhone(), 'username' => $customer->getUsername(), 'password' => $customer->getPassword(), 'city' =>$customer->getCity(), 'postcode' => $customer->getPostcode(), 'address' =>$customer->getAddress()]);
	    } catch (PDOException $e) {
	    	return false;
	    }
	    return true;
	  }
	}

?>