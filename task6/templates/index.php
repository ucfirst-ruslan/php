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

<section class="first">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto text-center">
				<h1><?= $band->getName() ?></h1>
				<p class="lead">(<?= $band->getGenre() ?>)</p>
			</div>
		</div>
	</div>
</section>

<?php foreach ($band->getMusician() as $musician): ?>
	<section id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h3><?= $musician->getMusicianName() ?></h3>
					<small><?= $musician->getMusicianType() ?></small>
					<dl>
			  <?php foreach ($musician->getInstrument() as $instrument): ?>
								<dt><?= $instrument->getName() ?></dt>
								<dd>
									<small><?= $instrument->getCategory() ?></small>
								</dd>
			  <?php endforeach; ?>
						<dl>
				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>


<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; 2018</p>
	</div>
	<!-- /.container -->
</footer>


</body>

</html>