<?php
	
	try {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/eduwebbackend/getstatinfo.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['admin_token'],
                'Content-Type: application/json'
            ]
        ]);

        $resp = curl_exec($curl);
        $data = json_decode($resp, true);
        
	} catch (Exception $e) {
		echo $e;
	}

?>