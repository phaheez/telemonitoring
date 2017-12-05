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
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Doctor(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<a href="#add-doctor" title="Add New Doctor" role="button" class="btn btn-success" data-toggle="modal">
											<span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW DOCTOR
										</a>
										<?php include('add_doctor_modal.php'); ?>
									</div>
								</div><br>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>DoctorID</th>
										<th>Name</th>
										<th>Specialization</th>
										<th>Gender</th>
										<th>Phone No</th>
										<th>Email</th>
										<th>Password</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("select * from doctor") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										$doctor_id = $row['doctor_id'];
										?>
										<tr>
											<td><?php echo $doctor_id; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['specialization']; ?></td>
											<td><?php echo $row['gender']; ?></td>
											<td><?php echo $row['phone_no']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['password']; ?></td>
											<td>
												<a href="#edit-doctor<?php echo $doctor_id; ?>" title="Edit Doctor" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="#delete-doctor<?php echo $doctor_id; ?>" title="Delete Doctor" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
												<?php
												include('edit_doctor_modal.php');
												?>
											</td>
											<!--Doctor Delete Modal-->
											<div id="delete-doctor<?php echo $doctor_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Doctor Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this doctor?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_doctor.php?id=<?php echo $doctor_id; ?>" class="btn btn-danger">Delete</a>
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
		

		<?php include('footer-admin.php'); ?>
	</div>
</body>