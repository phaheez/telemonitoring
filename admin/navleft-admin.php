<div class="col-md-3">
	<div id="admin-responsive">
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-calendar"></span>
			<?php
			$Today = date('y:m:d');
			$new = date('l, F d, Y', strtotime($Today));
			echo $new;
			?>
		</div>
	</div><br>

	<div id="admin-responsive">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header" style="margin-left:15px">Links</li>
			<li class="active">
				<a href="adminhome.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a>
			</li>
			<li>
				<a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;My Profile</a>
			</li>
			<li>
				<a href="doctor.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Manage Doctors</a>
			</li>
			<li>
				<a href="patient.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Manage Patients</a>
			</li>
			<li>
				<a href="notification.php"><span class="glyphicon glyphicon-link"></span>&nbsp;Manage Notifications</a>
			</li>
			<li>
				<a href="response.php"><span class="glyphicon glyphicon-link"></span>&nbsp;Manage Responses</a>
			</li>
			<li>
				<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
			</li>
		</ul>
	</div>
</div>