<?php

	if(session_status() == PHP_SESSION_NONE){
		session_name('eduwebdash_ui');
		session_start();
	}

	require '../../functions/env.php';
	
	// header('Location: ../../courses.php?page=1')

	if(!$_GET['course-id']){
		header('Location: ../../courses.php?page=1');
	}

	$url = $SELF_API_BASE_URL . 'admin-delete-course.php';

	try{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_CUSTOMREQUEST => "DELETE",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				'Authorization: Bearer ' . $_SESSION['admin_token'],
				'course_id: ' . $_GET['course-id']
			]
		]);

		$resp = curl_exec($curl);
		$dltMsg = json_decode($resp, true);

		print_r($resp);

		curl_close($curl);

		header('Location: ../../courses.php?page=1');

	}catch(Excepiton $e){
		echo $e;
		header('Location: ../../courses.php?page=1');
	}

?>
