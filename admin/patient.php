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
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Patient(s)</strong>
								</div>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>PatientID</th>
										<th>Name</th>
										<th>Gender</th>
										<th>Phone No</th>
										<th>Email</th>
										<th>Password</th>
										<th>Created Date</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("select * from patient") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										$patient_id = $row['patient_id'];
										?>
										<tr>
											<td><?php echo $patient_id; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['gender']; ?></td>
											<td><?php echo $row['phone_no']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['password']; ?></td>
											<td><?php echo $row['created_date']; ?></td>
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