<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-doctor.php');
include('functions/session.php');

$get_noti_id = $_GET['noti_id'];
$query4 = mysql_query("SELECT * FROM notification WHERE notification_id='$get_noti_id'");
while ($row4 = mysql_fetch_array($query4)) {
	$notification_id = $row4['notification_id'];
	$patient_id = $row4['patient_id'];
	$subject = $row4['subject'];
	$description = $row4['description'];
	$video_name = $row4['video_name'];
	
	$query5 = mysql_query("SELECT name FROM patient WHERE patient_id='$patient_id'");
	while ($row5 = mysql_fetch_array($query5)) {
		$patient_name = $row5['name'];
	}
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
					src="<?php echo "../patient/my_videos/$video_name"; ?>" controls="controls"
					poster="../images/banner.png" preload="none"></video>
				</div>
			</div>
			<div class="col-md-4">
				<br><br>
				<div class="alert alert-info">
					<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Notification Details</strong>
				</div>
				<form role="form" method="post" action="" >
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
									<textarea class="form-control" name="txtViewDescription" cols="45" rows="5"
									id="txtViewDescription" disabled><?php echo $description; ?></textarea>
								</div>
							</div>
						</div>
					</div><br>
					
					<!--<a href="#reply-notification<?php //echo $notification_id; ?>" title="Reply Notification" role="button" class="btn btn-primary pull-right" data-toggle="modal">
						<span class="glyphicon glyphicon-send"></span>&nbsp;Attend To Patient
					</a>
					<?php 
					//include('reply_notification_modal.php');
					?>-->
					<a href="attendtopatient.php?id=<?php echo $notification_id; ?>" title="Reply Notification" role="button" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-send"></span>&nbsp;Attend To Patient
					</a>
					
				</form>
			</div>
		</div>

		<?php include('footer-doctor.php'); ?>
	</div>
</body>