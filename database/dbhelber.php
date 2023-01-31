<?php
require_once('config.php');

function execute($sql) {
	$conn = mysqli_connect(HOST,  USERNAME, PASSWORD,DATABASE) 
	or die ('Không thể kết nối tới database');
	mysqli_set_charset($conn,'UTF8');

	$data = mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function executeResult($sql) {
	$data = [];
	$conn = mysqli_connect(HOST,  USERNAME, PASSWORD,DATABASE);
	mysqli_set_charset($conn,'UTF8');

	$reslutset = mysqli_query($conn, $sql);
	while(($row = mysqli_fetch_array($reslutset , 1) != null) ) {
		$data = $row;
	}
	mysqli_close($conn);

	return $data;
}

function executeResultFirst($sql) {
	$data = [] ;
	$conn = mysqli_connect(HOST,  USERNAME, PASSWORD,DATABASE);
	mysqli_set_charset($conn,'UTF8');

	$reslutset = mysqli_query($conn, $sql);
	$rs = '';
	while(($row = mysqli_fetch_array($reslutset , 1) != null) ) {
		$data = $row;
	}
	$rs = '';
	mysqli_close($conn);
	return $data;
}