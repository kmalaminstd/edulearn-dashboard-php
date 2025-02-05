<?php
	
	if(session_status() == PHP_SESSION_NONE){
		session_name('eduwebdash_ui');
		session_start();
	}

	$pagenumber = isset($_GET['page']) ? $_GET['page'] : 1;

	try{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => 'http://localhost/eduwebbackend/course-list-from-admin.php',
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
