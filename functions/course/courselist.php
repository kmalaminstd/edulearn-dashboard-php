<?php
	
	if(session_status() == PHP_SESSION_NONE){
		session_name('eduwebdash_ui');
		session_start();
	}

	require './functions/env.php';

	$pagenumber = isset($_GET['page']) ? $_GET['page'] : 1;

	$url = $SELF_API_BASE_URL . "course-list-from-admin.php";

	try{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				'Authorization: Bearer ' . $_SESSION['admin_token'],
				'page: ' . $pagenumber
			]
		]);

		$res = curl_exec($curl);
		$courseData = json_decode($res, true);

		curl_close($curl);

	}catch(Exception $e){
		echo $e;
	}

?>
