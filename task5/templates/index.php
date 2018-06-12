<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<!-- Bootstrap core CSS -->
	<link href="templates/css/bootstrap.min.css" rel="stylesheet">

	<style>
		section {
			margin: 10px;
		}

		.py-5 {
			padding: 1rem !important;
		}

		.first, .alert {
			margin-top: 70px;
		}

		.lead {
			font-size: 17px;
			line-height: 1;
			margin-bottom: 5px;

		}
	</style>
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="#page-top"><?= $title ?></a>

	</div>
</nav>

<?php //if ($errorMysql): ?>
<!--	<section>-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="col-lg-8 mx-auto">-->
<!--					<div class="alert alert-danger" role="alert">-->
<!--			  --><? //= $errorMysql ?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--	</section>-->
<?php //endif; ?>
<?php //if ($errorPgsql): ?>
<!--	<section>-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="col-lg-8 mx-auto">-->
<!--					<div class="alert alert-danger" role="alert">-->
<!--			  --><? //= $errorPgsql ?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--	</section>-->
<?php //endif; ?>


<section class="first" id="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<h4>Cookies</h4>
				<p class="lead">Cookies set:
			<?= $cookiesSet ?>
				</p>
				<p class="lead">Cookies:
			<?= $cookiesGet ?>
				</p>
				<p class="lead">Cookies delete:
			<?= $cookiesDel ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section id="services" class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<h4>Session</h4>
				<p class="lead">Session set:
			<?= $sessionSet ?>
				</p>
				<p class="lead">Session:
			<?= $sessionGet ?>
				</p>
				<p class="lead">Session delete:
			<?= $sessionDel ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section id="services" >
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<h4>DataBase</h4>
				<p class="lead">Data set:
			<?php if ($saveDB): ?>
							Ok.
			<?php endif; ?>
				</p>
				<p class="lead">Data get:
			<?php if ($getDB): ?>
				<?= $getDB ?>
			<?php endif; ?>
				</p>
				<p class="lead">Data delete:
			<?php if ($deleteDB): ?>
							Ok.
			<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; 2018</p>
	</div>
	<!-- /.container -->
</footer>


</body>

</html>