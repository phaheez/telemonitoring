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
						<div id="responsive" class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
								<div class="alert alert-info">
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Notification(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<a href="#add-notification" title="Add New Notification" role="button" class="btn btn-success" data-toggle="modal">
											<span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW NOTIFICATION
										</a>
										<?php include('add_notification_modal.php'); ?>
									</div>
								</div><br>

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
									$patID = $_SESSION['patient_id'];
									$query = mysql_query("SELECT * FROM notification 
										WHERE patient_id='$patID' 
										AND status='No-reply' 
										ORDER BY created_date DESC") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										$patient_id = $row['patient_id'];
										$notification_id = $row['notification_id'];
										?>
										<tr>
											<td><?php echo $patient_id; ?></td>
											<td><?php echo $row['subject']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $row['video_name']; ?></td>
											<td><?php echo $row['created_date']; ?></td>
											<td><?php echo $row['status']; ?></td>
											<td>
												<a href="#edit-notification<?php echo $notification_id; ?>" title="Edit Notification" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="#delete-notification<?php echo $notification_id; ?>" title="Delete Notification" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
												<?php
												include('edit_notification_modal.php');
												?>
											</td>
											<!--Patient Delete Modal-->
											<div id="delete-notification<?php echo $notification_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Notification Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this notification?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_notification.php?id=<?php echo $notification_id; ?>" class="btn btn-danger">Delete</a>
																<button type="button" class="btn btn-success" data-dismiss="modal">
																	Cancel
																</button>
															</div>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											<!--End Delete Modal-->
											
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
											<th>Subject</th>
											<th>Description</th>
											<th>Video Name</th>
											<th>Response</th>
											<th>Added Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody style="font-family: tahoma">
										<?php
										$patID = $_SESSION['patient_id'];
										
										$query = mysql_query("SELECT 
											n.notification_id,
											n.patient_id,
											n.subject,
											n.description, 
											r.response_id,
											r.response,
											r.video_name,
											r.added_date 
											FROM notification AS n
											JOIN noti_response AS r
											WHERE n.patient_id='$patID' 
											AND r.notification_id=n.notification_id
											ORDER BY r.added_date ASC") or die(mysql_error());

										while ($row = mysql_fetch_array($query)) {
											$patient_id = $row['patient_id'];
											$notification_id = $row['notification_id'];
											$res_id = $row['response_id'];
											?>
											<tr>
												<td><?php echo $row['subject']; ?></td>
												<td><?php echo $row['description']; ?></td>
												<td><?php echo $row['video_name']; ?></td>
												<td><?php echo $row['response']; ?></td>
												<td><?php echo $row['added_date']; ?></td>
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
		

		<?php include('footer-patient.php'); ?>
	</div>
</body>