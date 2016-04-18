	<!DOCTYPE html>
	<html lang="en">
	<head>
    <title>SamSam <?= $pageName ?></title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

	<link rel="icon" type="image/png" href="images/favicon.png">

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
	
	<!-- Personal CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
	
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Samen Anders Minder</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <div class="nav navbar-nav navbar-right">
                <li><a href="index.php" <?php if ($pageName=="Home") echo 'id="current"'; ?> >Home</a></li>
                <li><a href="#" <?php if ($pageName=="Informatie") echo 'id="current"'; ?> >Informatie</a></li>
                <li><a href="#" <?php if ($pageName=="Nieuws") echo 'id="current"'; ?> >Nieuws</a></li>
                <li><a href="coaches.php" <?php if ($pageName=="Coaches") echo 'id="current"'; ?> >Coaches</a></li>
                <li><a href="contact.php" <?php if ($pageName=="Contact") echo 'id="current"'; ?> >Contact</a></li>
            </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>