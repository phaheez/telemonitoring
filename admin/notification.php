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
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Notification(s)</strong>
								</div>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>PatientID</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Video</th>
										<th>Created Date</th>
										<th>Status</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("SELECT * FROM notification") or die(mysql_error());

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