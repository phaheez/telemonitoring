<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-patient.php');
include('functions/session.php');
ob_start();

$id = $_SESSION['patient_id'];
$query = mysql_query("SELECT * FROM patient WHERE patient_id='$id'");
while ($row = mysql_fetch_array($query)) {
	$patient_id = $row['patient_id'];
	$name = $row['name'];
	$dob = $row['dob'];
	$phone_no = $row['phone_no'];
	$email = $row['email'];
	$password = $row['password'];
	$temperature = $row['temperature'];
	$pulse = $row['pulse'];
	$blood_group = $row['blood_group'];
	$blood_pressure = $row['blood_pressure'];
	$height = $row['height'];
	$weight = $row['weight'];
}
?>

<body>
	<?php include('navhead-patient.php'); ?>

	<div class="container-fluid body-content">
		<div class="row">
			<?php include('navleft-patient.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div id="responsive">
							<div class="alert alert-info">
								<strong><span class="glyphicon glyphicon-user"></span>&nbsp;My Profile</strong>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label  class="col-sm-3 col-md-3 control-label" for="lblPatientID">PatientID:</label>
										<div class="col-sm-9 col-md-9">
											<label for="lblPatientID" style="font-weight:500"><?php echo $patient_id;?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-3 col-md-3 control-label" for="lblName">Name:</label>
										<div class="col-sm-9 col-md-9">
											<label for="lblName" style="font-weight:500"><?php echo $name; ?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-3 col-md-3 control-label" for="lblDOB">DOB:</label>
										<div class="col-sm-9 col-md-9">
											<label for="lblDOB" style="font-weight:500"><?php echo $dob; ?></label>
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
										<label  class="col-sm-3 col-md-3 control-label" for="lblPassword">Password:</label>
										<div class="col-sm-6 col-md-3">
											<label for="lblPassword" style="font-weight:500"><?php echo $password; ?></label>
										</div>
									</div><br>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label  class="col-sm-4 col-md-4 control-label" for="lblTemp">Temperature:</label>
										<div class="col-sm-8 col-md-8">
											<label for="lblTemp" style="font-weight:500"><?php echo $temperature; ?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-4 col-md-4 control-label" for="lblPulse">Pulse:</label>
										<div class="col-sm-8 col-md-8">
											<label for="lblPulse" style="font-weight:500"><?php echo $pulse; ?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-4 col-md-4 control-label" for="lblBGroup">Blood Group:</label>
										<div class="col-sm-8 col-md-8">
											<label for="lblBGroup" style="font-weight:500"><?php echo $blood_group; ?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-4 col-md-4 control-label" for="lblBPressure">Blood Pressure:</label>
										<div class="col-sm-8 col-md-8">
											<label for="lblBPressure" style="font-weight:500"><?php echo $blood_pressure; ?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-4 col-md-4 control-label" for="lblHeight">Height:</label>
										<div class="col-sm-8 col-md-8">
											<label for="lblHeight" style="font-weight:500"><?php echo $height; ?></label>
										</div>
									</div><br>
									<div class="form-group">
										<label  class="col-sm-4 col-md-4 control-label" for="lblWeight">Weight:</label>
										<div class="col-sm-8 col-md-8">
											<label for="lblWeight" style="font-weight:500"><?php echo $weight; ?></label>
										</div>
									</div><br>
								</div>
								
								<div class="form-group">
									<div class="col-sm-3 col-md-3"></div>
									<div class="col-sm-9 col-md-9">
										<a href="#change-password<?php echo $patient_id; ?>" title="Change Password" role="button" class="btn btn-primary" data-toggle="modal">
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
		

		<?php include('footer-patient.php'); ?>
	</div>
</body>