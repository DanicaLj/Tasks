<?php

class Customer
{
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $phone;
	protected $username;
	protected $password;
	protected $city;
	protected $postcode;
	protected $address;

	public const REQUIRED_FIELDS = ['firstname', 'lastname', 'email', 'phone', 'username', 
	'password', 'city', 'postcode', 'address']; 

	public function getFirstname()
	{
		return $this->firstname;
	}

	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}

	public function getLastname()
	{
		return $this->lastname;
	}

	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function getPostcode()
	{
		return $this->postcode;
	}

	public function setPostcode($postcode)
	{
		$this->postcode = $postcode;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function validateFields($data)
	{
		$missingFields = [];
		foreach (self::REQUIRED_FIELDS as $value) {
			if (!array_key_exists($value,$data)) {
				$missingFields[] = $value;
			}
		}
		return $missingFields;
	}
}