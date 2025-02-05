<?php 
	
	if(session_status() == PHP_SESSION_NONE){
		session_name('eduwebdash_ui');
		session_start();
	}

	try{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => 'http://localhost/eduwebbackend/admin-recent-course-list.php',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				'Authorization: Bearer ' . $_SESSION['admin_token']
			]
		]);

		$res = curl_exec($curl);
		$data = json_decode($res , true);

		curl_close($curl);

	}catch(Excepiton $e){
		echo $e;
	}

	
?>