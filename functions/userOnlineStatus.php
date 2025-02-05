<?php
		
	$isOnline = 'offline';

	try{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => 'http://localhost/eduwebbackend/read-last-activity.php',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				'Authorization: Bearer ' . $_SESSION['token'],
			]
		]);


		curl_close($curl);

	}catch(Exception $e){
		echo $e;
	}

?>