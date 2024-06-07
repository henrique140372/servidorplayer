<?php 

/**
 * Name: Direct Link Player Script
 * Version: 1.0, Last updated: Oct 20, 2020
 * Website: https://ykstream.com
 * Contact: Support@ykstream.com
 */ 

error_reporting(0);
include_once 'library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['link'])) {
		
		$title = (!empty($_POST['title'])) ? $_POST['title'] : '';
		$slug = (!empty($_POST['slug'])) ? $_POST['slug'] : '';
		$link = (!empty($_POST['link'])) ? $_POST['link'] : '';
		$poster = (!empty($_POST['poster'])) ? $_POST['poster'] : '';
		$label = (!empty($_POST['label'])) ? $_POST['label'] : '';
		
		$var = array();
		$var['title'] = trim($title);
		$var['slug'] = trim($slug);		
		$var['link'] = trim($link);
		$var['poster'] = trim($poster);

		$varSub = array();
	
		$sub = $_POST['sub'];
		foreach ($sub as $key => $value) {
			if ($value != '') {
				$varSub[$label[$key]] = trim($value);
			}
			else $varSub['English'] = "";
		}
		$var['sub'] = $varSub;
		
		echo encode(json_encode($var));

	} else echo 'Error Isset!';
} else echo 'Error Request!';

?>