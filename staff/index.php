<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/deskapp-logo-svg.png" width="150" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="../vendors/images/banner-img.png" width="200" alt="">
					</div>
					<div class="col-md-8">

						<?php $query= mysqli_query($conn,"select * from tblemployees where emp_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?php echo $row['FirstName']. " " .$row['LastName']; ?>,</div>
						</h4>
						<p class="font-18 max-width-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
					</div>
				</div>
			</div>

			<div class="title pb-20">
				<h2 class="h3 mb-0">Data Information</h2>
			</div>
			<div class="row pb-10">
				<!-- <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$sql = "SELECT emp_id from tblemployees";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$empcount=$query->rowCount();
						?>
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">Total Staffs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$dept = $_SESSION['adepart'];
						if($dept=='INFORMATION TECHNOLOGY'){
							$sql = "SELECT * FROM tblnpd WHERE Department='$dept' AND Status=0";
						}elseif($dept=='MIS'){
							$sql = "SELECT * FROM tblnpd WHERE Status=1 AND LevelStatus=1";
						}else{
							$sql = "SELECT * FROM tblnpd JOIN l2npd ON tblnpd.NPDNumber=l2npd.NPDNumber WHERE tblnpd.Status=1 AND tblnpd.LevelStatus=2 AND l2npd.Status=1";
						}
						
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$openNPD=$query->rowCount();
						?>        
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($openNPD); ?></div>
								<div class="font-14 text-secondary weight-500">Open NPDs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#b9c3ff"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$dept = $_SESSION['adepart'];
						if($dept=='INFORMATION TECHNOLOGY'){
							$sql = "SELECT * FROM tblnpd WHERE Department='$dept' AND Status=0";
						}elseif($dept=='MIS'){
							$sql = "SELECT * FROM l2npd WHERE Department='$dept' AND Status=0";
						}else{
							$sql = "SELECT * FROM l3npd WHERE Department='$dept' AND Status=0";
						}
						
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$openNPD=$query->rowCount();
						?>        
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($openNPD); ?></div>
								<div class="font-14 text-secondary weight-500">Pending NPDs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#fbef00"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$dept = $_SESSION['adepart'];
						if($dept=='INFORMATION TECHNOLOGY'){
							$sql = "SELECT * FROM tblnpd WHERE Department='$dept' AND Status=1";
						}elseif($dept=='MIS'){
							$sql = "SELECT * FROM l2npd WHERE Department='$dept' AND Status=1";
						}else{
							$sql = "SELECT * FROM l3npd WHERE Department='$dept' AND Status=1";
						}
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$inProcessNPD=$query->rowCount();
						?>         
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($inProcessNPD); ?></div>
								<div class="font-14 text-secondary weight-500">In Process NPD</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$dept = $_SESSION['adepart'];
						if($dept=='INFORMATION TECHNOLOGY'){
							$sql = "SELECT * FROM tblnpd WHERE Department='$dept' AND Status=2";
						}elseif($dept=='MIS'){
							$sql = "SELECT * FROM l2npd WHERE Department='$dept' AND Status=2";
						}else{
							$sql = "SELECT * FROM l3npd WHERE Department='$dept' AND Status=2";
						}
						$query = $dbh -> prepare($sql);
						$query->bindParam(':status',$status,PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$leavecount=$query->rowCount();
						?>  
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($leavecount); ?></div>
								<div class="font-14 text-secondary weight-500">Rejected NPDs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Department Head</div>
							
						</div>
						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from tblemployees where role='HOD' and Department='$session_depart' ORDER BY tblemployees.emp_id desc limit 4") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['emp_id'];
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $row['Department']; ?></span>
											<div class="font-14 weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['EmailId']; ?></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8"><?php echo $row['Phonenumber']; ?></div>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Staff</div>
						</div>
						 <div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from tblemployees where role = 'Staff' and Department='$session_depart' ORDER BY tblemployees.emp_id desc limit 4") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['emp_id'];
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $row['Department']; ?></span>
											<div class="font-14 weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['EmailId']; ?></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8"><?php echo $row['Phonenumber']; ?></div>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Let's Chat</div>
						</div>

						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from tblemployees where Department = '$session_depart' and emp_id != '$session_id' ORDER BY tblemployees.emp_id desc limit 10") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['emp_id'];
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<a href="chat.php?sender=<?php echo $session_id; ?>&receiver=<?php echo $row['emp_id']; ?>">
									  <div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div style="margin-left: 10px;" class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $row['Department']; ?></span>
											<div class="font-14 weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['EmailId']; ?></div>
										</div>
									</div>
								    </a>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="row">
				<div class="col-lg-12 mb-30">
					<div class="card-box pd-20 pt-10 height-100-p">
						<h2 class="mb-30 h4">NPD List</h2>
						<div class="pb-10">
							<table class="data-table-ten table stripe hover nowrap">
								<thead>
									<tr>
										<th>SR NO.</th>
										<th class="table-plus">NPD No.</th>
										<th>Material Name</th>
										<th>Date</th>
										<th>Status</th>
										<th class="datatable-nosort">ACTION</th>
									</tr>
								</thead>
								<tbody>

									<?php $sql = "SELECT * from tblnpd";
									$query = $dbh->prepare($sql);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $result) {               ?>
											<tr>
												<td> <?php echo htmlentities($cnt); ?></td>
												<td><?php echo 'NP-' . htmlentities($result->NPDNumber); ?></td>
												<td><?php echo htmlentities($result->MaterialName); ?></td>
												<td><?php echo htmlentities($result->Date); ?></td>
												<td><?php echo htmlentities($result->Status); ?></td>
												<td>
													<div class="table-actions">
														<a href="edit_department.php?edit=<?php echo htmlentities($result->id); ?>" data-color="#265ed7">
															<i class="icon-copy dw dw-edit2"></i></a>
														<a href="newnpd.php?delete=<?php echo htmlentities($result->id); ?>" data-color="#e95959">
															<i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td>
											</tr>

									<?php $cnt++;
										}
									} ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> -->

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>