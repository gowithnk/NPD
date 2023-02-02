<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['approve'])) {
	$status = 1;
	$hodCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$hodName = $fn . ' ' . $ln;
	$hodRemark = $_POST['hodRemark'];

		$query = mysqli_query($conn, "UPDATE tblnpd SET Status = '$status', HODRemark = '$hodRemark', HODName = '$hodName', HODCode = '$hodCode' WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('Approved Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'closednpds.php'; </script>";
		}
	}
?>
<?php
if (isset($_POST['reject'])) {
	$status = 2;
	$empCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$empName = $fn . ' ' . $ln;
	$hodRemark = $_POST['hodRemark'];

		$query = mysqli_query($conn, "UPDATE tblnpd SET Status = '$status', HODRemark = '$hodRemark', EmpName = '$empName', EmpCode = '$empCode' WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('Submitted for an update');</script>";
			echo "<script type='text/javascript'> document.location = 'closednpds.php'; </script>";
		}
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
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">New NPD</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-1 mt-1 h4">Add New NPD Details</h2>
							<hr>
							<section>
								<form name="save" method="post">
									<div class="row">
										<?php
											$query = mysqli_query($conn,"SELECT *, tblnpd.EmpName as Emp1Name, tblnpd.EmpRemark as Emp1Remark, tblnpd.HODName as HOD1Name, 
											tblnpd.HODRemark as HOD1Remark FROM tblnpd JOIN l2npd ON tblnpd.NPDNumber = l2npd.NPDNumber WHERE tblnpd.NPDNumber = '$npdNumber' ") or die(mysqli_error());
											$row = mysqli_fetch_array($query);
										?>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label for="npdNumber">NPD Number</label>
												<input id="npdNumber" name="npdNumber" value="<?php echo $row['NPDNumber']; ?>" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-3 col-md-3">
											<div class="form-group">
												<label for="revNumber">Revision No.</label>
												<input id="revNumber" name="revNumber" value="<?php echo $row['RevisionNo']; ?>" type="number" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-3 col-md-3">
											<div class="form-group">
												<?php
												date_default_timezone_set('Asia/Kolkata');
												$date = date('Y-m-d H:i A');
												?>
												<label for="date">Date</label>
												<input id="date" name="date" value="<?php echo $row['Date']; ?>" class="form-control" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="packStyle">Pack Style</label>
												<input readonly id="packStyle" name="packStyle" value="<?php echo $row['PackStyle']; ?>" type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
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
												<label for="selfLife">Self Life</label>
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
										<div class="col-lg-12">
											<div class="form-group">
												<label for="empRemark">Employee Remark <small>(<?php echo $row['Emp1Name']; ?>)</small></label>
												<textarea readonly id="empRemark" name="empRemark" placeholder="<?php echo $row['Emp1Remark']; ?>" class="form-control" rows="2" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label for="hodRemark">HOD Remark <small>(<?php echo $row['HOD1Name']; ?>)</small></label>
												<textarea readonly id="hodRemark" name="hodRemark" placeholder="<?php echo $row['HOD1Remark']; ?>" class="form-control" rows="2" ></textarea>
											</div>
										</div>
									</div>
									<div class="lvl2 mt-2">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="batchSeries">Batch Series</label>
													<input id="batchSeries" value="<?php echo $row['BatchSeries']; ?>" name="batchSeries" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="fdaApproval">FDA Approval</label>
													<input id="fdaApproval" value="<?php echo $row['FDAApproval']; ?>" name="fdaApproval" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<?php
													date_default_timezone_set('Asia/Kolkata');
													$date = date('Y-m-d H:i A');
													?>
													<label for="fdaApprovalDate">FDA Approval Date</label>
													<input id="fdaApprovalDate" name="fdaApprovalDate" value="<?php echo $row['FDAApprovalDate']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="colour">Colour</label>
													<input id="colour" name="colour" value="<?php echo $row['Colour']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="averageWeight">Average Weight</label>
													<input id="averageWeight" name="averageWeight" value="<?php echo $row['AverageWeight']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shape">Shape</label>
													<input id="shape" name="shape" value="<?php echo $row['Shape']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="size">Size</label>
													<input id="size" name="size" value="<?php echo $row['Size']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="generalInfo">General Information</label>
													<input id="generalInfo" name="generalInfo" value="<?php echo $row['GeneralInfo']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="otherRemark">Other Remarks</label>
													<textarea id="otherRemark" name="otherRemark" class="form-control" rows="1" readonly><?php echo $row['OtherRemarks']; ?></textarea>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="empRemarkl2">Employee Remark</label>
													<textarea id="empRemarkl2" name="empRemarkl2" class="form-control" rows="2" readonly><?php echo $row['EmpRemark']; ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
											<label for="hodRemark">HOD Remark</label>
												<textarea id="hodRemark" name="hodRemark" placeholder="Remark" 
												class="form-control" required="true" rows="1" autocomplete="off"></textarea>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="dropdown">
												<input class="btn btn-success btn-block mt-4" type="submit" 
												value="APPROVE" name="approve" id="add">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="dropdown">
												<input class="btn btn-danger btn-block mt-4" type="submit" 
												value="REJECT" name="reject" id="add">
											</div>
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