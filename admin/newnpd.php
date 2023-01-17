<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php
if (isset($_GET['delete'])) {
	$department_id = $_GET['delete'];
	$sql = "DELETE FROM tbldepartments where id = " . $department_id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Department deleted Successfully');</script>";
		echo "<script type='text/javascript'> document.location = 'newnpd.php'; </script>";
	}
}
?>

<?php
if (isset($_POST['addnpd'])) {
	$deptname = $_POST['departmentname'];
	$deptshortname = $_POST['departmentshortname'];

	$query = mysqli_query($conn, "select * from tbldepartments where DepartmentName = '$deptname'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('Already exist');</script>";
	} else {
		$query = mysqli_query($conn, "insert into tbldepartments (DepartmentName, DepartmentShortName)
  		 values ('$deptname', '$deptshortname')      
		") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'newnpd.php'; </script>";
		}
	}
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
							<h2 class="mb-1 mt-1 h4">Add New NPD Details</h2>
							<hr>
							<section>
								<form name="save" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label for="npdnumber">NPD Number</label>
												<input id="npdnumber" name="departmentname" placeholder="NP123" type="number" 
												class="form-control" required="true" autocomplete="off">
											</div>
										</div>
										<div class="col-lg-3 col-md-3">
											<div class="form-group">
												<label for="revNumber">Revision No.</label>
												<input id="revNumber" name="revNumber" placeholder="123" type="number" class="form-control" 
												required="true" autocomplete="off" style="text-transform:uppercase">
											</div>
										</div>
										<div class="col-lg-3 col-md-3">
											<div class="form-group">
											<?php 
											date_default_timezone_set('Asia/Kolkata'); 
											$date = date('Y-m-d H:i A'); 
											?>
												<label for="date">Date</label>
												<input id="date" name="date" value="<?= $date ?>" class="form-control" 
												title="Automatic Current time" required="true" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-md-4">
											<div class="form-group">
												<label for="sonl" class="form-label">Sales Order No. Lookup</label>
												<input class="form-control" list="datalistOptions" id="sonl" placeholder="Type to search...">
												<datalist style="width:500px" id="datalistOptions">
													<option style="width:500px" value="Option 1">
													<option value="Option 2">
													<option value="Option 3">
													<option value="Option 4">
													<option value="Option 5">
												</datalist>
											</div>
										</div>
										<div class="col-lg-4 col-md-4">
											<div class="form-group">
												<label for="slnl">Sales Line No. Lookup</label>
												<select id="slnl" name="slnl" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Sales Line No. Lookup</option>
													<option value="male">Option 1</option>
													<option value="female">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4 col-md-4">
											<div class="form-group">
												<label for="materialCode">Material Code</label>
												<input id="materialCode" name="departmentshortname" placeholder="123" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="packStyle">Pack Style</label>
												<select id="packStyle" name="packStyle" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Pack Style</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="materialName">Material Name</label>
												<input id="materialName" name="materialName" placeholder="NP123" type="text" class="form-control" required="true" autocomplete="off">
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
												<input id="marketDistribution" name="marketDistribution" placeholder="NP123" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="unit">Unit</label>
												<input id="unit" name="unit" placeholder="NP123" type="number" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="genericName">Generic Name</label>
												<select id="genericName" name="genericName" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Select Generic Name</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="composition">Composition</label>
												<select id="composition" name="composition" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Select Composition</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="partyCodeName">Party Code & Name</label>
												<select id="partyCodeName" name="partyCodeName" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Party Code & Name</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="selfLife">Self Life</label>
												<select id="selfLife" name="selfLife" class="custom-select form-control" required="true" autocomplete="off">
													<option value="">Self Life</option>
													<option value="Option 1">Option 1</option>
													<option value="Option 2">Option 2</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="rate">Rate</label>
												<input id="rate" name="rate" placeholder="500" type="number" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="mrp">MRP</label>
												<input id="mrp" name="mrp" placeholder="500" type="number" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="remark">Remark (If Any)</label>
												<textarea id="remark" name="remark" placeholder="Message" class="form-control" required="true" rows="2" autocomplete="off"></textarea>
											</div>
										</div>
									</div>
									<!-- <div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="preparedBy">Prepared By</label>
												<input id="preparedBy" name="preparedBy" value="Niranjan" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="approvedBy">Approved By</label>
												<input id="approvedBy" name="approvedBy" value="Niranjan" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div> -->
									<div class="col-sm-12">
										<div class="dropdown">
											<input class="btn btn-primary btn-block mt-3" type="submit" value="SUBMIT FOR APPROVAL" 
											name="addnpd" id="add">
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