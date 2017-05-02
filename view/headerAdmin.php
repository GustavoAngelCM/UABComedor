<!DOCTYPE html>
<html lang="en">
<head>

	<title>Comedor</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/estiloMenAdmin.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

</head>
<body>

	<header>

		<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black; opacity:0.8">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="../view/multimedia/img/logo.png" class="img-responsive img-rounded"   width="25" height="25" ></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="menuAdmin.php">Home</a></li>
						<li><a href="menuAdmin.php?modo=gProduct">Productos</a></li>
						<li><a href="#">Pedidos</a></li>
						<li><a href="#">Nutrionista</a></li>
						<li><a href="#">Reportes</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><?php echo $_SESSION['user']; ?></a></li>
						<li><a href="menuAdmin.php?modo=cerrarSesion"><span class="fa fa-sign-out"></span> Salir</a></li>
					</ul>
				</div>
			</div>
		</nav>

	</header>
