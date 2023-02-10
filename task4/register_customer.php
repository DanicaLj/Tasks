<?php

class RegisterCustomer
{
	public function run($file){
		global $argv;
		
		$csv = $this->csvToArray($file);
		foreach ($csv as $line) {
			$result = $this->sendPostData($line);
			echo $result;
		}
	}

	public function csvToArray($file)
	{
		$f = fopen($file, 'r');
		while (($data = fgetcsv($f, 2000, ",")) !== false) {
			$csv[] = array_map('trim', $data);
		}
		fclose($f);

		array_walk($csv, function(&$a) use ($csv) {
			$a = array_combine($csv[0], $a);
		});
		array_shift($csv);
		return $csv;
	}

	public function sendPostData($data)
	{
		$url = "http://localhost/task4/authorizeApi.php";
		$authorization = "Authorization: Bearer danica";

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json" , $authorization]);
		curl_setopt($ch,CURLOPT_POSTFIELDS,  json_encode($data));
		
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

		$result = curl_exec($ch);
		$httpCode = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
		curl_close($ch);
		if ($httpCode >= 200 && $httpCode < 300) {
			return $result;
		}
		return false;
	}
}

$shell = new RegisterCustomer();
$shell->run($argv[1]);
