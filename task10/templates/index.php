<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<!-- Bootstrap core CSS -->
	<link href="templates/css/bootstrap.min.css"
	      rel="stylesheet">
	<style>
		.bg-light, .alert {
			margin-top: 70px;
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

<?php if ($errorMysql): ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="alert alert-danger" role="alert">
			  <?= $errorMysql ?>
					</div>
				</div>
			</div>
	</section>
<?php endif; ?>
<?php if ($errorPgsql): ?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="alert alert-danger" role="alert">
			  <?//= $errorPgsql ?>
					</div>
				</div>
			</div>
	</section>
<?php endif; ?>


<section id="services" class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<h3>MySQL</h3>
				<h5>Insert in DB</h5>
				<p class="lead">id of the record:
			<?= $mysqlInsert ?>
				</p>
				<h5>Select record DB</h5>
				<p class="lead">Select cell 'userdata' =
			<?php foreach ($mysqlSelect as $val): ?>
				<?= $val ?>
			<?php endforeach; ?>
				</p>
				<h5>Update record DB</h5>
				<p class="lead">The term is affected:
			<?= $mysqlUpdate ?>
				</p>
				<h5>Delete record DB</h5>
				<p class="lead">Delete of the record:
			<?= $mysqlDelete ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<h3>PgSQL</h3>
				<h5>Insert in DB</h5>
				<p class="lead">id of the record:
			<?= $pgsqlInsert ?>
				</p>
				<h5>Select record DB</h5>
				<p class="lead">Select cell 'userdata' =
			<?php foreach ($pgsqlSelect as $val): ?>
				<?= $val ?>
			<?php endforeach; ?>
				</p>
				<h5>Update record DB</h5>
				<p class="lead">The term is affected:
			<?= $pgsqlUpdate ?>
				</p>
				<h5>Delete record DB</h5>
				<p class="lead">Delete of the record:
			<?= $pgsqlDelete ?>
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