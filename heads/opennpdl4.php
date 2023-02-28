<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "SELECT * FROM tblemployees JOIN  tbldepartments WHERE emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['approve'])) {
	$status = 1;
	$hodCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$hodName = $fn . ' ' . $ln;
	$hodRemark = $_POST['hodRemark'];

	$query = mysqli_query($conn, "UPDATE l4npd SET Status = '$status', HODRemark = '$hodRemark', HODName = '$hodName', HODCode = '$hodCode' 
		WHERE NPDNumber = $npdNumber") or die(mysqli_error());

	if ($query) {
		echo "<script>alert('Approved Successfully');</script>";
		echo "<script type='text/javascript'> document.location = 'opennpdsl4.php'; </script>";
	}
}
?>
<?php
if (isset($_POST['reject'])) {
	$status = 2;
	$hodCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$hodName = $fn . ' ' . $ln;
	$hodRemark = $_POST['hodRemark'];

	$query = mysqli_query($conn, "UPDATE l4npd SET Status = '$status', HODRemark = '$hodRemark', HODName = '$hodName', HODCode = '$hodCode' 
		WHERE NPDNumber = $npdNumber") or die(mysqli_error());

	if ($query) {
		echo "<script>alert('Submitted for an update');</script>";
		echo "<script type='text/javascript'> document.location = 'opennpdsl4.php'; </script>";
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
									<!-- Level 1 -->
									<?php include_once('../level-data/l1.php') ?>
									<!-- Level 2 -->
									<?php include_once('../level-data/l2.php') ?>
									<!-- Level 3 -->
									<?php include_once('../level-data/l3.php') ?>
									<!-- Level 4 -->
									<div class="lvl4">
										<hr class="my-3">
										<?php 
											$query = mysqli_query($conn, "SELECT * FROM l4npd WHERE NPDNumber = '$npdNumber' ") or die(mysqli_error());
											$row = mysqli_fetch_array($query);
										?>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="batchField">Batch Field</label>
													<input id="batchField" name="batchField" type="text" value="<?php echo $row['BatchField']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="uom">U.O.M</label>
													<input id="uom" name="uom" type="text" value="<?php echo $row['UOM']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="overage">Overage</label>
													<input id="overage" name="overage" type="text" value="<?php echo $row['Overage']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="factor">Factor</label>
													<input id="factor" name="factor" type="text"  value="<?php echo $row['Factor']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="component">Component</label>
													<input id="component" name="factcomponentor" type="text"  value="<?php echo $row['Component']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="componentDesc">Component Decription</label>
													<input id="componentDesc" name="componentDesc" type="text"  value="<?php echo $row['ComponentDesc']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="claim">Claim</label>
													<input id="claim" name="claim" type="text" value="<?php echo $row['Claim']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="quantity">Quantity</label>
													<input id="quantity" name="quantity" type="text" value="<?php echo $row['Qty']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="materialType">Material Type</label>
													<input id="materialType" name="materialType" type="text" value="<?php echo $row['MaterialType']; ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="empRemark">Emp Remarks <small>(<label id="empName"><?php echo $row['EmpName']; ?></label>)</small></label>
													<textarea id="empRemark" name="empRemark" class="form-control" readonly rows="2" autocomplete="off"><?php echo $row['EmpRemark']; ?></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="hodRemark">HOD Remark</label>
												<textarea id="hodRemark" name="hodRemark" placeholder="Remark" class="form-control" required="true" rows="2" autocomplete="off"></textarea>
											</div>
										</div>
										<div class="col-lg-3 mt-2">
											<div class="dropdown">
												<input class="btn btn-success btn-block mt-4" type="submit" value="APPROVE" name="approve" id="add">
											</div>
										</div>
										<div class="col-lg-3 mt-2">
											<div class="dropdown">
												<input class="btn btn-danger btn-block mt-4" type="submit" value="REJECT" name="reject" id="add">
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