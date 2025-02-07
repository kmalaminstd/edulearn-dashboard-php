<?php

    require "./functions/env.php";

    $url = $SELF_API_BASE_URL . "getstatinfo.php";
	
	try {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['admin_token'],
                'Content-Type: application/json'
            ]
        ]);

        $resp = curl_exec($curl);
        $statData = json_decode($resp, true);
        
	} catch (Exception $e) {
		echo $e;
	}

?>
