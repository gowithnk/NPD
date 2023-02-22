<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "SELECT * FROM tblemployees JOIN  tbldepartments WHERE emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['updatenpd']) && $_POST['npdNumber'] !== '') {
	$department = $row_staff['Department'];
	$empCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$empName = $fn . ' ' . $ln;
	$packingType = $_POST['packingType'];
	$lFColour = $_POST['lFColour'];
	$baseFoil = $_POST['baseFoil'];
	$pVCPVDC = $_POST['pVCPVDC'];
	$changePart = $_POST['changePart'];
	$empRemark = $_POST['empRemark'];
	$monoCarton = $_POST['monoCarton'];
	$insert3 = $_POST['insert3'];
	$silicaGel = $_POST['silicaGel'];
	$outerCarton = $_POST['outerCarton'];
	$shrink = $_POST['shrink'];
	$shipperSpecs = $_POST['shipperSpecs'];
	$shipperPacking = $_POST['shipperPacking'];
	$referenceProduct = $_POST['referenceProduct'];
	$otherRemark = $_POST['otherRemark'];

	$query = mysqli_query($conn, "SELECT * FROM l3npd WHERE NPDNumber = '$npdNumber'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('NPD Already exist');</script>";
	} else {
		$query1 = mysqli_query($conn, "INSERT INTO l3npd (NPDNumber, Department, EmpName, EmpCode, PackingType, LFColour, BaseFoil, PVCPVDC, ChangePart, EmpRemark, 
		MonoCarton, Insert3, SilicaGel, OuterCarton, Shrink, ShipperSpecs, ShipperPacking, ReferenceProduct, OtherRemark) VALUES ('$npdNumber', '$department', '$empName', 
		'$empCode' ,'$packingType','$lFColour', '$baseFoil', '$pVCPVDC','$changePart', '$empRemark', '$monoCarton', '$insert3', '$silicaGel', '$outerCarton', '$shrink',
		'$shipperSpecs', '$shipperPacking', '$referenceProduct', '$otherRemark')") or die(mysqli_error());

		$query2 = mysqli_query($conn, "UPDATE tblnpd SET LevelStatus = '3' WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query1) {
			echo "<script>alert('NPD Updated Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'pendingnpdsl3.php'; </script>";
		}
	}
}else{
	echo 'Please fill the form first';
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
									<?php include_once('../level-data/l1.php') ?>
									<!-- level 2 -->
									<?php include_once('../level-data/l2.php') ?>
									<!-- level 3 -->
									<hr id="l3" class="my-3">
									<div class="lvl3 mt-2">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="packingType">Packing Type</label>
													<select id="packingType" name="packingType" class="custom-select form-control" required="true" autocomplete="on">
														<option value="">Select Option</option>
														<option>Alu Alu Blister</option>
														<option>Strip</option>
														<option>Blister</option>
														<option>Manual</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="lFColour">Leading Foil (Colour)</label>
													<input id="lFColour" name="lFColour" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="baseFoil">Base Foil</label>
													<select id="baseFoil" name="baseFoil" class="custom-select form-control" required="true" autocomplete="on">
														<option value="">Select Option</option>
														<option>Colour</option>
														<option>Plain</option>
														<option>Printer</option>
														<option>Manual</option>
													</select>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="pVCPVDC">PVC / PVDC</label>
													<input id="pVCPVDC" name="pVCPVDC" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="changePart">Change Part</label>
													<input id="changePart" name="changePart" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="empRemark">Remarks (If Any)</label>
													<textarea id="empRemark" name="empRemark" placeholder="Mark your remarks here..." class="form-control" rows="2" required></textarea>
												</div>
											</div>
											<div class="col-lg-12"><hr class="mt-3"></div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="monoCarton">Mono Carton</label>
													<input id="monoCarton" name="monoCarton" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="insert3">Insert</label>
													<input id="insert3" name="insert3" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="silicaGel">Silica Gel</label>
													<input id="silicaGel" name="silicaGel" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="outerCarton">Outer Carton</label>
													<input id="outerCarton" name="outerCarton" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shrink">Shrink</label>
													<input id="shrink" name="shrink" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shipperSpecs">Shipper Specs</label>
													<input id="shipperSpecs" name="shipperSpecs" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shipperPacking">Shipper Packing</label>
													<input id="shipperPacking" name="shipperPacking" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="referenceProduct">Reference Product</label>
													<input id="referenceProduct" name="referenceProduct" type="text" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="otherRemark">Other Remark (if any)</label>
													<textarea id="otherRemark" name="otherRemark" placeholder="Mark your remarks here..." class="form-control" rows="2" required></textarea>
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