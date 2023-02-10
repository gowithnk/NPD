<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['updatenpd']) && $_POST['npdNumber'] !== '') {
	
	$department = $row_staff['Department'];
	$empCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$empName = $fn . ' ' . $ln;
	$batchSeries = $_POST['batchSeries'];
	$fdaApproval = $_POST['fdaApproval'];
	$fdaApprovalDate = $_POST['fdaApprovalDate'];
	$colour = $_POST['colour'];
	$averageWeight = $_POST['averageWeight'];
	$shape = $_POST['shape'];
	$size = $_POST['size'];
	$generalInfo = $_POST['generalInfo'];
	$empRemarkl2 = $_POST['empRemarkl2'];

	$query = mysqli_query($conn, "SELECT * from l2npd where NPDNumber = '$npdNumber'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('NPD Already exist');</script>";
	} else {
		$query1 = mysqli_query($conn, "INSERT INTO l2npd (NPDNumber, BatchSeries, Department, EmpName, EmpCode, FDAApproval, FDAApprovalDate, Colour, AverageWeight, Shape, 
		Size, GeneralInfo, EmpRemark) VALUES ('$npdNumber', '$batchSeries', '$department', '$empName', '$empCode' ,'$fdaApproval','$fdaApprovalDate', '$colour', 
		'$averageWeight','$shape', '$size', '$generalInfo', '$empRemarkl2')") or die(mysqli_error());

		$query2 = mysqli_query($conn, "UPDATE tblnpd SET LevelStatus = '2' WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query1) {
			echo "<script>alert('NPD Updated Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'opennpdsl2.php'; </script>";
		}
	}
}else{
	echo 'please fill the form first';
}

?>

<body>

	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>New NPD</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">New NPD</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-1 mt-1 h4">NPD Details</h2>
							<hr>
							<section>
								<form name="save" method="post">
									<!-- Level 1 -->
									<div class="lvl1">
										<div class="row">
											<?php
												$query = mysqli_query($conn,"select * from tblnpd where NPDNumber = '$npdNumber' ")or die(mysqli_error());
												$row = mysqli_fetch_array($query);
											?>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="npdNumber">NPD Number</label>
													<input id="npdNumber" name="npdNumber" value="<?php echo 'NP-'.  $row['NPDNumber']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="revNumber">Revision No.</label>
													<input id="revNumber" name="revNumber" value="<?php echo $row['RevisionNo']; ?>" type="number" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<?php
													date_default_timezone_set('Asia/Kolkata');
													$date = date('Y-m-d H:i A');
													?>
													<label for="date">Date</label>
													<input id="date" name="date" value="<?php echo $row['Date']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="packStyle">Pack Style</label>
													<input readonly id="packStyle" name="packStyle" value="<?php echo $row['PackStyle']; ?>" type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="materialName">Material Name</label>
													<input readonly id="materialName" name="materialName" value="<?php echo $row['MaterialName']; ?>" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="division">Division</label>
													<input id="division" name="division" value="<?php echo $row['Division']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="marketDistribution">Market/Distribution</label>
													<input id="marketDistribution" name="market" value="<?php echo $row['Market']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="unit">Unit</label>
													<input id="unit" name="unit" value="<?php echo $row['Unit']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="genericName">Generic Name</label>
													<input id="genericName" name="genericName" value="<?php echo $row['GenericName']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="composition">Composition</label>
													<input id="composition" name="composition" value="<?php echo $row['Composition']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="partyCodeName">Party Code & Name</label>
													<input id="partyCodeName" name="pcn" value="<?php echo $row['PCN']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="selfLife">Self Life (In Months)</label>
													<input id="selfLife" name="selfLife" value="<?php echo $row['SelfLife']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="rate">Rate</label>
													<input id="rate" name="rate" value="<?php echo $row['Rate']; ?>" type="number" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="mrp">MRP</label>
													<input id="mrp" name="mrp" value="<?php echo $row['MRP']; ?>" type="number" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="empRemark">Remark <span style="font-size: 12px;">(<?php echo $row['EmpName']; ?>)</span></label>
													<textarea readonly id="empRemark" name="empRemark" placeholder="<?php echo $row['EmpRemark']; ?>" class="form-control" rows="2" ></textarea>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="hodRemark">HOD Remark (<small><?php echo $row['HODName']; ?></small>)</label>
													<textarea id="hodRemark" name="hodRemark" placeholder="<?php echo $row['HODRemark']; ?>" 
													class="form-control" rows="2" readonly></textarea>
												</div>
											</div>
										</div>
									</div>
									<!-- level 2 -->
									<hr id="l2" class="my-3">
									<div class="lvl2 mt-2">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="batchSeries">Batch Series</label>
													<input id="batchSeries" name="batchSeries" type="text" placeholder="Batch Series" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="fdaApproval">FDA Approval</label>
													<select id="fdaApproval" name="fdaApproval" class="custom-select form-control" required="true" autocomplete="on">
														<option value="">Select Option</option>
														<option value="Yes">YES</option>
														<option value="No">NO</option>
													</select>
												</div>
											</div>
											<div class="col-lg-3">
											<div class="form-group">
												<label for="fdaApprovalDate">FDA Approval Date</label>
												<input id="fdaApprovalDate" name="fdaApprovalDate" type="text" class="form-control date-picker" placeholder="00/00/0000" required="true" autocomplete="off">
											</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="colour">Colour</label>
													<input id="colour" name="colour" type="text" placeholder="white..." class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="averageWeight">Average Weight</label>
													<input id="averageWeight" name="averageWeight" type="text" placeholder="20 mg" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="shape">Shape</label>
													<input id="shape" name="shape" type="text" placeholder="Circular" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="size">Size</label>
													<input id="size" name="size" type="text" placeholder="50 mm" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="generalInfo">General Information</label>
													<input id="generalInfo" name="generalInfo" type="text" placeholder="General Information" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="empRemarkl2">Remark</label>
													<textarea id="empRemarkl2" name="empRemarkl2" placeholder="Mark your remarks here..." class="form-control" rows="2" required></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="dropdown">
											<input class="btn btn-primary btn-block mt-3" type="submit" value="UPDATE NPD" name="updatenpd" id="add">
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php') ?>
</body>

</html>