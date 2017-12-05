<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-patient.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-patient.php'); ?>

	<div class="container-fluid body-content">
		<div class="row">
			<?php include('navleft-patient.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info pull-left">
							<strong>PATIENT DASHBOARD!</strong>&nbsp;Welcome to CHMSC Telemonitoring System
						</div>
					</div>
				</div>

				<div class="jumbotron"></div>
			</div>
		</div>

		<?php include('footer-patient.php'); ?>
	</div>
</body>
</html>