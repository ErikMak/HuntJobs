<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title;?></title>
	<link href="/files/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href="/files/bootstrap-reboot.min.css" rel="stylesheet"> <!-- Bootstrap Reboot -->
	<link href="/files/style.css" rel="stylesheet">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link href="/files/icons.css" rel="stylesheet"> <!-- Icons -->
	<script defer src="/files/icons.js"></script> <!-- Icons -->
	<script type="text/javascript" src="/files/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php $this->load->view('templates/navbar'); ?>
<div class="container-xl themed-container section-container">
	<section class="row">
		<!-- Sidebar -->
		<?php $this->load->view('templates/sidebar'); ?>