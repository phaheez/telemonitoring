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
						<div id="responsive" class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
								<div class="alert alert-info">
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Notification(s)</strong>
								</div>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>PatientID</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Video Name</th>
										<th>Created Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$d_id = $_SESSION['doctor_id'];
									$query = mysql_query("SELECT 
										n.notification_id,
										n.patient_id,
										p.patient_id,
										p.doctor_id,
										n.subject,
										n.description, 
										n.status,
										n.video_name,
										n.created_date  
										FROM notification AS n
										JOIN patient AS p
										WHERE p.patient_id=n.patient_id 
										AND p.doctor_id='$d_id'
										AND status='No-reply' 
										ORDER BY n.created_date DESC") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										
										
										$notification_id = $row['notification_id'];
										?>
										<tr>
											<td><?php echo $row['patient_id']; ?></td>
											<td><?php echo $row['subject']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $row['video_name']; ?></td>
											<td><?php echo $row['created_date']; ?></td>
											<td><?php echo $row['status']; ?></td>
											<td>
												<a title="View Notification" href="viewnotification.php?noti_id=<?php echo $notification_id; ?>" id="notifiId" role="button" class="btn btn-primary">
													<span class="glyphicon glyphicon-eye-open"></span>&nbsp;View
												</a>
											</td>
										</tr>
										<?php
									}

									?>
									
								</tbody>
							</table>
						</div>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title" style="font-size:14px;"><strong>Notification Response(s)</strong></h3>
							</div> 
							<div class="panel-body table-responsive" id="responsive">
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
									<thead>
										<tr style="background-color:#333; color: white">
											<th>Res_ID</th>
											<th>Noti_ID</th>
											<th>DoctorID</th>
											<th>Subject</th>
											<th>Description</th>
											<th>Video Name</th>
											<th>Response</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody style="font-family: tahoma">
										<?php
										$doc_ID = $_SESSION['doctor_id'];
										
										$query7 = mysql_query("SELECT 
											n.notification_id,
											r.notification_id,
											n.subject,
											n.description, 
											r.response_id,
											r.doctor_id,
											r.response,
											r.video_name
											FROM notification AS n
											JOIN noti_response AS r
											WHERE n.notification_id=r.notification_id 
											AND r.doctor_id='$doc_ID'
											ORDER BY r.added_date ASC") or die(mysql_error());

										while ($row7 = mysql_fetch_array($query7)) {
											$doctor_id = $row7['doctor_id'];
											$notification_id = $row7['notification_id'];
											$res_id = $row7['response_id'];
											?>
											<tr>
												<td><?php echo $res_id; ?></td>
												<td><?php echo $notification_id; ?></td>
												<td><?php echo $doctor_id; ?></td>
												<td><?php echo $row7['subject']; ?></td>
												<td><?php echo $row7['description']; ?></td>
												<td><?php echo $row7['video_name']; ?></td>
												<td><?php echo $row7['response']; ?></td>
												<td>
													<a title="View Response" href="viewresponse.php?resi_id=<?php echo $res_id; ?>" id="resiId" role="button" class="btn btn-primary">
														<span class="glyphicon glyphicon-eye-open"></span>&nbsp;View
													</a>
												</td>
											</tr>
											<?php
										}

										?>
									</tbody>
								</table>
							</div>
						</div>

						<nav arial-label="..." class="pull-right">
							<ul class="pager">
								<li>
									<a href="#"><span arial-hidden="true">&larr;</span>prev</a>
								</li>
								<li>
									<a href="#">Next<span arial-hidden="true">&rarr;</span></a>
								</li>
							</ul>
						</nav>

					</div>
				</div>
			</div>
		</div>
		

		<?php include('footer-doctor.php'); ?>
	</div>
</body>