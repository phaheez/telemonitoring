<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-doctor.php');
include('functions/session.php');

$get_resi_id = $_GET['resi_id'];
//$query4 = mysql_query("SELECT * FROM noti_response WHERE response_id='$get_resi_id'");
$query4 = mysql_query("SELECT 
	n.notification_id,n.subject,n.description,n.patient_id,
	r.notification_id,r.response_id,r.response,r.video_name,r.added_date,
	p.patient_id,p.name
	FROM notification AS n
	JOIN noti_response AS r
	JOIN patient AS p
	WHERE r.response_id='$get_resi_id'
	AND n.notification_id=r.notification_id 
	AND n.patient_id=p.patient_id") or die(mysql_error());
while ($row4 = mysql_fetch_array($query4)) {
	$patient_id = $row4['patient_id'];
	$patient_name = $row4['name'];
	$subject = $row4['subject'];
	$description = $row4['description'];
	$response = $row4['response'];
	$video_name = $row4['video_name'];
}

ob_start();
?>


<body>
	<?php include('navhead-doctor.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-8">
				<div class="pull-left">
					<a title="Back to Notification" href="notification.php" role="button" class="btn btn-success">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back
					</a>
				</div>
				<br><br>

				<div id="box">
					<video class="video" width="100%" height="440" style="padding:10px" 
					src="<?php echo "videos/$video_name"; ?>" controls="controls"
					poster="../images/banner.png" preload="none"></video>
				</div>
			</div>
			<div class="col-md-4">
				<br><br>
				<div class="alert alert-info">
					<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Notification Details</strong>
				</div>
				<form role="form" method="post" action="">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="lblPatientId">Patient ID:</label>
								<div class="col-sm-9 col-md-9">
									<label for="lblPatientId" style="font-weight:500"><?php echo $patient_id;?></label>
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="lblPatientName">Name:</label>
								<div class="col-sm-9 col-md-9">
									<label for="lblPatientName" style="font-weight:500"><?php echo $patient_name;?></label>
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="lblSubject">Subject:</label>
								<div class="col-sm-9 col-md-9">
									<label for="lblSubject" style="font-weight:500"><?php echo $subject;?></label>
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="txtViewDescription">Description:</label>
								<div class="col-sm-9 col-md-9">
									<textarea class="form-control" name="txtViewDescription" cols="40" rows="3"
									id="txtViewDescription" disabled><?php echo $description; ?></textarea>
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="txtViewResponse">Response:</label>
								<div class="col-sm-9 col-md-9">
									<textarea class="form-control" name="txtViewResponse" cols="40" rows="3"
									id="txtViewResponse" disabled><?php echo $response; ?></textarea>
								</div>
							</div>
						</div>
					</div><br>
				</form>
			</div>
		</div>

		<?php include('footer-doctor.php'); ?>
	</div>
</body>