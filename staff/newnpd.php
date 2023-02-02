<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE FROM tblnpd where id = " . $id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('NPD deleted Successfully');</script>";
		echo "<script type='text/javascript'> document.location = 'newnpd.php'; </script>";
	}
}
?>
<?php
$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

$query_npd = mysqli_query($conn, "SELECT * FROM tblnpd ORDER BY id DESC LIMIT 1") or die(mysqli_error());
$row_npd = mysqli_fetch_array($query_npd);
$last_npd = $row_npd['NPDNumber'];
$new_npd = $last_npd + 1;

if (isset($_POST['addnpd']) && $_POST['npdNumber'] !== '') {
	$npdNumber = $new_npd;
	$revNumber = 00 ;
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

	$query = mysqli_query($conn, "select * from tblnpd where NPDNumber = '$npdNumber'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('NPD Already exist');</script>";
	} else {
		$query = mysqli_query($conn, "INSERT INTO tblnpd (NPDNumber, RevisionNo, Date, Department, EmpName, EmpCode, PackStyle, MaterialName, Division, Market, Unit, GenericName, 
		Composition, PCN, SelfLife, Rate, MRP, EmpRemark)
  		VALUES ('$npdNumber', '$revNumber', '$date', '$department', '$empName', '$empCode' ,'$packStyle','$materialName','$division','$market','$unit','$genericName','$composition',
		'$pcn' ,'$selfLife','$rate','$mrp','$empRemark')") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('NPD Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'newnpd.php'; </script>";
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
		<div class=" xs-pd-20-10">
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
							<h2 class="mb-1 mt-1 h4">Add New NPD Details </h2>
							<hr>
							<section>
								<form name="save" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label for="npdNumber">NPD Number</label>
												<input id="npdNumber" name="npdNumber" value="<?php echo 'NP-' . $new_npd ?>" type="text" class="form-control" required="true" readonly>
											</div>
										</div>
										<div class="col-lg-3 col-md-3">
											<div class="form-group">
												<label for="revNumber">Revision No.</label>
												<input id="revNumber" name="revNumber" value="00" type="number" class="form-control" required="true" readonly>
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
												<input type="text" name="packStyle" id="packStyle" class="form-control" required="true" autocomplete="on">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="materialName">Material Name</label>
												<input id="materialName" name="materialName" placeholder="type name" type="text" required="true" class="form-control" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="division">Division</label>
												<select id="division" name="division" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Select Division</option>
													<option value="Hormone">Hormone</option>
													<option value="General">General</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="marketDistribution">Market/Distribution</label>
												<select id="market" name="market" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Select Market</option>
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
													<option value="">Select Unit</option>
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
												<input id="genericName" name="genericName" placeholder="type name" type="text" required="true" class="form-control" autocomplete="on">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="composition">Composition</label>
												<input id="composition" name="composition" placeholder="Composition" type="text" required="true" class="form-control" autocomplete="on">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="partyCodeName">Party Code & Name</label>
												<select id="partyCodeName" name="pcn" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Party Code & Name</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="selfLife">Self Life</label>
												<input id="selfLife" name="selfLife" placeholder="Self Life" type="number" required="true" class="form-control" autocomplete="on">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="rate">Rate</label>
												<input id="rate" name="rate" placeholder="500" type="number" step="0.01" required="true" class="form-control" autocomplete="off">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="mrp">MRP</label>
												<input id="mrp" name="mrp" placeholder="500" type="number" step="0.01" required="true" class="form-control" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="empRemark">Remark</label>
												<textarea id="empRemark" name="empRemark" placeholder="Message" class="form-control" required="true" rows="2" 
												autocomplete="on"></textarea>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="dropdown">
											<input class="btn btn-primary btn-block mt-3" type="submit" value="SUBMIT FOR APPROVAL" name="addnpd" id="add">
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