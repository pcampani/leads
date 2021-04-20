<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/styles.css">
	<title>Leads and Clients</title>
</head>
<body>
	<div class="wrapper">
		<header>
			<h2>Leads and Clients</h2>
			<div class="form-box">
				<div>
					<label for="name">Name</label>
					<input type="text" name="search" id="search">
				</div>
				<form id="myForm" action="/leads/process_date" method="post">
					<input type="date" name="from" id="from_date">
					<input type="date" name="to" id="to_date">
				</form>
			</div>
		</header>
		