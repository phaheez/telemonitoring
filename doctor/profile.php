<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-doctor.php');
include('functions/session.php');
ob_start();

$id = $_SESSION['doctor_id'];
$query = mysql_query("SELECT * FROM doctor WHERE doctor_id='$id'");
while ($row = mysql_fetch_array($query)) {
	$doctor_id = $row['doctor_id'];
	$name = $row['name'];
	$phone_no = $row['phone_no'];
	$email = $row['email'];
	$specialization = $row['specialization'];
	$password = $row['password'];
}
?>

<body>
	<?php include('navhead-doctor.php'); ?>

	<div class="container-fluid body-content">
		<div class="row">
			<?php include('navleft-doctor.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div id="responsive">
							<div class="alert alert-info">
								<strong><span class="glyphicon glyphicon-user"></span>&nbsp;My Profile</strong>
							</div>

							<div class="row">
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblDoctorID">DoctorID:</label>
									<div class="col-sm-9 col-md-9">
										<label for="lblDoctorID" style="font-weight:500"><?php echo $doctor_id;?></label>
									</div>
								</div><br>
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblName">Name:</label>
									<div class="col-sm-9 col-md-9">
										<label for="lblName" style="font-weight:500"><?php echo $name; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblPhoneBo">Phone No:</label>
									<div class="col-sm-9 col-md-9">
										<label for="lblPhoneBo" style="font-weight:500"><?php echo $phone_no; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblEmail">Email:</label>
									<div class="col-sm-9 col-md-9">
										<label for="lblEmail" style="font-weight:500"><?php echo $email; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblSpec">Specialization:</label>
									<div class="col-sm-9 col-md-9">
										<label for="lblSpec" style="font-weight:500"><?php echo $specialization; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblPassword">Password:</label>
									<div class="col-sm-6 col-md-3">
										<label for="lblPassword" style="font-weight:500"><?php echo $password; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<div class="col-sm-3 col-md-3"></div>
									<div class="col-sm-9 col-md-9">
										<a href="#change-password<?php echo $doctor_id; ?>" title="Change Password" role="button" class="btn btn-primary" data-toggle="modal">
											<span class="glyphicon glyphicon-pencil"></span>&nbsp;Change Password
										</a>
										<?php include('change_password_modal.php'); ?>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		

		<?php include('footer-doctor.php'); ?>
	</div>
</body>