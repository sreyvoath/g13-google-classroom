<?php
session_start();
if(!isset($_SESSION['user'])){
 header("location:/user-signin");
 exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Classroom</title>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Eduport- LMS, Education and Course Theme">


	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- link boostrap5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/main.css">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="vendor/glightbox/css/glightbox.css">
	<link rel="stylesheet" type="text/css" href="vendor/css/hover.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">
	<link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/todos.css">
	
	<!-- Theme JS  -->
	<script src="vendor/js/search.js" defer></script>
	<script src="vendor/js/todos.js" defer></script>
	<script src="vendor/js/join_class.js"defer></script>

	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-7N7LGGGWT1');
		
	</script>

</head>

<body>