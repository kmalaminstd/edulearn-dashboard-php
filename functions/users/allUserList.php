<?php

	require "./functions/env.php";

	$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	$url = $SELF_API_BASE_URL . "userlist.php";

	try{
		$curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $_SESSION['admin_token'],
                    'Content-Type: application/json',
                    'offset: ' . $page_number
            ]
        ]);

        $curlResp = curl_exec($curl);
        $data = json_decode($curlResp, true);
    }catch(Exception $e){
        echo $e;
    }

?>
