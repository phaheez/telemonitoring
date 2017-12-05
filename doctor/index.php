<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-doctor.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-doctor.php'); ?>

	<div class="container-fluid body-content">
		<div class="row">
			<?php include('navleft-doctor.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info pull-left">
							<strong>DOCTOR DASHBOARD!</strong>&nbsp;Welcome to CHMSC Telemonitoring System
						</div>
					</div>
				</div>

				<div class="jumbotron"></div>
			</div>
		</div>

		<?php include('footer-doctor.php'); ?>
	</div>
</body>
</html>