<?php
class Connection {
	private const DBHOST = 'localhost';
	private const DBUSER = 'root';
	private const DBPASS = '';
	private const DBNAME = 'nb_soft';
	private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';
	protected $conn = null;

	public function __construct() {
		try {
	      $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
	      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
	      die('Connectionn Failed : ' . $e->getMessage());
	    }
	    return $this->conn;
	}
	  
	public function message($content, $status) {
		return json_encode(['message' => $content, 'error' => $status]);
	}

	public function getBearerToken($headers = null) {
		if (!empty($headers)) {
		    if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
		        return $matches[1];
		    }
		}
		return null;
	}
}

?>