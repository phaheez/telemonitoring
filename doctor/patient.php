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
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Patient(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<a href="#add-patient" title="Add New Patient" role="button" class="btn btn-success" data-toggle="modal">
											<span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW PATIENT
										</a>
										<?php include('add_patient_modal.php'); ?>
									</div>
								</div><br>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>PatientID</th>
										<th>Name</th>
										<th>Gender</th>
										<th>Phone No</th>
										<th>Email</th>
										<th>Password</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$doctID = $_SESSION['doctor_id'];
									$query = mysql_query("SELECT * FROM patient WHERE doctor_id='$doctID'") or die(mysql_error());

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
											<td>
												<a href="#edit-patient<?php echo $patient_id; ?>" title="Edit Patient" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="#delete-patient<?php echo $patient_id; ?>" title="Delete Patient" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
												<?php
												include('edit_patient_modal.php');
												?>
											</td>
											<!--Patient Delete Modal-->
											<div id="delete-patient<?php echo $patient_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Patient Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this patient?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_patient.php?id=<?php echo $patient_id; ?>" class="btn btn-danger">Delete</a>
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
		

		<?php include('footer-doctor.php'); ?>
	</div>
</body>