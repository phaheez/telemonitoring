<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-admin.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-admin.php'); ?>

	<div class="container-fluid body-content">
		<div class="row">
			<?php include('navleft-admin.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div id="responsive" class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
								<div class="alert alert-info">
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Notification Response(s)</strong>
								</div>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>DoctorID</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Response</th>
										<th>Video</th>
										<th>Added Date</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("SELECT 
										r.doctor_id, r.notification_id, r.response, r.added_date, r.video_name,
										n.notification_id, n.subject, n.description
										FROM noti_response AS r
										JOIN notification AS n
										WHERE r.notification_id=n.notification_id") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										?>
										<tr>
											<td><?php echo $row['doctor_id']; ?></td>
											<td><?php echo $row['subject']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $row['response']; ?></td>
											<td><?php echo $row['video_name']; ?></td>
											<td><?php echo $row['added_date']; ?></td>
										</tr>
										<?php
									}

									?>
									
								</tbody>
							</table>

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
		</div>
		

		<?php include('footer-admin.php'); ?>
	</div>
</body>