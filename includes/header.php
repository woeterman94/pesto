<?php

	require_once 'config.php';

	# debug mode is true for developers
	define ('DEBUG_MODE', true);

	# only redirect if we aren't already on the setup page.
	if (!$pesto->isConfigured() && !$pesto->isCurrentPage("po-setup.php")) {
		$pesto->setupPesto();
	}

?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>
			<?php  echo $pesto->isConfigured() ? $blog_name : "Setup Pesto"; ?>
		</title>

		<!-- CSS -->
		<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="css/pesto.css" />

		<!-- Font Awesome -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
