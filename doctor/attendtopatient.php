<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-doctor.php');
include('functions/session.php');

$get_noti_id = $_GET['id'];
$query = mysql_query("SELECT
	n.notification_id,n.patient_id,n.subject,n.description,n.video_name,
	p.patient_id,p.name
	FROM notification AS n
	JOIN patient AS p
	WHERE n.notification_id='$get_noti_id'
	AND n.patient_id=p.patient_id") or die(mysql_error());
while ($row = mysql_fetch_array($query)) {
	$notification_id = $row['notification_id'];
	$patient_id = $row['patient_id'];
	$patient_name = $row['name'];
	$subject = $row['subject'];
	$description = $row['description'];
	$video_name = $row['video_name'];
}

ob_start();
?>

<body>
	<?php include('navhead-doctor.php'); ?>
	<div class="container body-content">
		<div class="row">
			<div class="col-md-7">
				<div class="pull-left">
					<a title="Back to Notification" href="notification.php" role="button" class="btn btn-success">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back
					</a>
				</div>
				<br><br>

				<div class="alert alert-success">
					<strong style="color:black;">Attending to Patient: <strong style="color:blue;"><?php echo $patient_name; ?></strong></strong>
				</div>

				<form role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="txtResponse">Response:</label>
								<div class="col-sm-9 col-md-9">
									<input type="hidden" class="form-control" name="txtNotificationId"
                                    id="txtNotificationId" value="<?php echo $notification_id; ?>" />
									<textarea class="form-control" name="txtResponse" cols="40" rows="7"
									id="txtResponse" required></textarea>
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label  class="col-sm-3 col-md-3 control-label" for="my_video">Upload Video:</label>
								<div class="col-sm-9 col-md-9">
									<input type="file" id="my_video" name="my_video" class="form-control" required>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<div class="col-sm-3 col-md-3"></div>
								<div class="text-center text-danger col-sm-8 col-md-8">
									<i>Upload only (.mp4 file)<br>
										Maximum file size <strong>200MB</strong>
									</i>   
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>
					</div><br><br>

					<button type="submit" name="btnAddResponse" class="btn btn-primary pull-right">
						Add Response 
					</button>

					<?php 
					if (isset($_POST['btnAddResponse'])) {
						function clean($str) {
							$str = @trim($str);
							if (get_magic_quotes_gpc()) {
								$str = stripslashes($str);
							}
							return mysql_real_escape_string($str);
						}
						$videoname = $_FILES['my_video']['name'];
						$videoname = preg_replace("/[^a-zA-Z0-9.]/", "-", $videoname);
						$videoname = rand(1000,100000)."-".$videoname;
						$videoname_loc = $_FILES['my_video']['tmp_name'];
						$videoname_size = $_FILES['my_video']['size'];
						$videoname_type = $_FILES['my_video']['type'];
						$videoLocation = "videos/";

						if ($videoname_type == "video/mp4") {
							$new_video = strtolower($videoname);
							if ($videoname_size > (209715200)) {
								?>
								<script>
								alert('Error: Video size must not exceed 200MB.');
								window.location.href='subject.php';
								</script>
								<?php
							} else {
								$new_video_name = str_replace(' ', '-', $new_video);

								$do_id = $_SESSION['doctor_id'];
								$notiID = $_POST['txtNotificationId'];
								$response = $_POST['txtResponse'];

								if (move_uploaded_file($videoname_loc, $videoLocation.$new_video_name)) {
									mysql_query("INSERT INTO 
										noti_response(notification_id,doctor_id,response,video_name,added_date) 
										VALUES('$notiID','$do_id','$response','$new_video_name',NOW())");

									mysql_query("UPDATE notification SET status='Replied' WHERE notification_id='$notiID'");

									?>
									<script>
									alert('Response Added Successfully');
									window.location.href='notification.php';
									</script>
									<?php
								} else {
									?>
									<script>
									alert('Error while uploading video');
									window.location.href='notification.php';
									</script>
									<?php
								}
							}

						} else {

							?>
							<div><?php echo $do_id; ?></div>
							<script>
							alert('Error: Only (mp4) video format required!');
							window.location.href='notification.php';
							</script>
							<?php
						}
					}

					?>
				</form>
			</div>

			<div class="col-md-5">
				<br><br>
				<div class="alert alert-success">
					<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Notification Details</strong>
				</div>

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
								<textarea class="form-control" name="txtViewDescription" cols="40" rows="5"
								id="txtViewDescription" disabled><?php echo $description; ?></textarea>
							</div>
						</div>
					</div>
				</div><br>
			</div>
		</div>

		<?php include('footer-doctor.php'); ?>
	</div>
</body>