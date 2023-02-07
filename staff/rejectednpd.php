<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "select * from tblemployees join tbldepartments where emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['npdupdate'])) {
	$status = 0;
	$npdNumber = $_POST['npdNumber'];
	$revNumber = $_POST['revNumber']; 
	$date = $_POST['date'];
	$department = $row_staff['Department'];
	$empCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$empName = $fn . ' ' . $ln;
	$packStyle = $_POST['packStyle'];
	$materialName = $_POST['materialName'];
	$division = $_POST['division'];
	$market = $_POST['market'];
	$unit = $_POST['unit'];
	$genericName = $_POST['genericName'];
	$composition = $_POST['composition'];
	$pcn = $_POST['pcn'];
	$selfLife = $_POST['selfLife'];
	$rate = $_POST['rate'];
	$mrp = $_POST['mrp'];
	$empRemark = $_POST['empRemark'];

		$query = mysqli_query($conn, "UPDATE tblnpd SET Status = '$status', NPDNumber = '$npdNumber', RevisionNo = '$revNumber', Date = '$date', Department = '$department', 
		EmpCode = '$empCode', EmpName = '$empName', PackStyle = '$packStyle', MaterialName = '$materialName', Division = '$division', Market = '$market', Unit = '$unit', 
		GenericName = '$genericName', Composition = '$composition', PCN = '$pcn', SelfLife = '$selfLife', Rate = '$rate', MRP = '$mrp', EmpRemark = '$empRemark'
		WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('Updated Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'inprocessnpds.php'; </script>";
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
											$query = mysqli_query($conn,"SELECT * FROM tblnpd WHERE NPDNumber = '$npdNumber' ")or die(mysqli_error());
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
												$date = date('Y-m-d H:i:s A');
												?>
												<label for="date">Date</label>
												<input id="date" name="date" value="<?= $date ?>" class="form-control" title="Automatic Current time" required="true" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="packStyle">Pack Style</label>
												<input  id="packStyle" name="packStyle" value="<?php echo $row['PackStyle']; ?>" type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="materialName">Material Name</label>
												<input  id="materialName" name="materialName" value="<?php echo $row['MaterialName']; ?>" type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="division">Division</label>
												<select id="division" name="division" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['Division']; ?>"><?php echo $row['Division']; ?></option>
													<option value="Hormone">Hormone</option>
													<option value="General">General</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="marketDistribution">Market/Distribution</label>
												<select id="market" name="market" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['Market']; ?>"><?php echo $row['Market']; ?></option>
													<option value="Domestic">Domestic</option>
													<option value="Deemed Export">Deemed Export</option>
													<option value="Export">Export</option>
													<option value="Govt.">Govt.</option>
													<option value="Trading">Trading</option>
													<option value="Sample">Sample</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="unit">Unit</label>
												<select id="unit" name="unit" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['Unit']; ?>"><?php echo $row['Unit']; ?></option>
													<option value="Synokem Pharma MFG, Unit-I">Synokem Pharma MFG, Unit-I</option>
													<option value="Synokem Pharma MFG, Unit-II">Synokem Pharma MFG, Unit-II</option>
													<option value="Synokem Life Sciences, Unit-III">Synokem Life Sciences, Unit-III</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="genericName">Generic Name</label>
												<input id="genericName" name="genericName" value="<?php echo $row['GenericName']; ?>" type="text" class="form-control" >
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="composition">Composition</label>
												<input id="composition" name="composition" value="<?php echo $row['Composition']; ?>" type="text" class="form-control" >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="partyCodeName">Party Code & Name</label>
												<select id="partyCodeName" name="pcn" class="custom-select form-control" required="true" autocomplete="off">
													<option value="<?php echo $row['PCN']; ?>"><?php echo $row['PCN']; ?></option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="selfLife">Self Life</label>
												<input id="selfLife" name="selfLife" value="<?php echo $row['SelfLife']; ?>" type="text" class="form-control" >
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="rate">Rate</label>
												<input id="rate" name="rate" value="<?php echo $row['Rate']; ?>" type="number" class="form-control" >
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="mrp">MRP</label>
												<input id="mrp" name="mrp" value="<?php echo $row['MRP']; ?>" type="number" class="form-control" >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="empRemark">Employee Remark <small>(<?php echo $row['EmpName']; ?>)</small></label>
												<textarea  id="empRemark" name="empRemark" placeholder="<?php echo $row['EmpRemark']; ?>" class="form-control" rows="2" required></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
											<label for="hodRemark">HOD Remark <small>(<?php echo $row['HODName']; ?>)</small></label>
												<textarea id="hodRemark" name="hodRemark" placeholder="<?php echo $row['HODRemark']; ?>" 
												class="form-control" rows="2" readonly></textarea>
											</div>
										</div>
										<div class="col-lg-6 mt-2">
											<div class="dropdown">
												<input class="btn btn-success btn-block mt-4" type="submit" 
												value="RESUBMIT FOR APPROVAL" name="npdupdate" id="add">
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