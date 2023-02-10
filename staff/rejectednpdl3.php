<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "select * from tblemployees join  tbldepartments where emp_id = '$session_id'") or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['updatenpd']) && $_POST['npdNumber'] !== '') {
	$status = 0;
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

	$query = mysqli_query($conn, "SELECT * from l2npd where NPDNumber = '$npdNumber'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

		$query = mysqli_query($conn, "UPDATE l3npd SET Status = '$status', Department = '$department', 
		EmpCode = '$empCode', EmpName = '$empName', PackingType = '$packingType', LFColour = '$lFColour', BaseFoil = '$baseFoil', PVCPVDC = '$pVCPVDC', ChangePart = '$changePart', 
		EmpRemark = '$empRemark', MonoCarton = '$monoCarton', Insert3 = '$insert3', SilicaGel = '$silicaGel', OuterCarton = '$outerCarton', Shrink = '$shrink', 
		ShipperSpecs = '$shipperSpecs', ShipperPacking = '$shipperPacking', ReferenceProduct = '$referenceProduct', OtherRemark = '$otherRemark'
		WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('NPD Updated Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'rejectednpdsl3.php'; </script>";
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
							<h2 class="mb-1 mt-1 h4">Add New NPD Details</h2>
							<hr>
							<section>
								<form name="save" method="post">
									<!-- Level 1 -->
									<div class="row">
										<?php
											$query = mysqli_query($conn,"SELECT *, tblnpd.EmpName as Emp1Name, tblnpd.EmpRemark as Emp1Remark, tblnpd.HODName as HOD1Name,	tblnpd.HODRemark as 
											HOD1Remark, l2npd.EmpName as Emp2Name, l2npd.EmpRemark as Emp2Remark, l2npd.HODName as HOD2Name, l2npd.HODRemark as HOD2Remark 
											FROM tblnpd JOIN l2npd ON tblnpd.NPDNumber = l2npd.NPDNumber JOIN l3npd ON l2npd.NPDNumber = l3npd.NPDNumber WHERE tblnpd.NPDNumber = '$npdNumber' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
										?>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="npdNumber">NPD Number</label>
												<input id="npdNumber" name="npdNumber" value="<?php echo 'NP-'. $row['NPDNumber']; ?>" type="text" class="form-control" readonly>
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
										<div class="col-lg-5">
											<div class="form-group">
												<label for="packStyle">Pack Style</label>
												<input readonly id="packStyle" name="packStyle" value="<?php echo $row['PackStyle']; ?>" type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="materialName">Material Name</label>
												<input readonly id="materialName" name="materialName" value="<?php echo $row['MaterialName']; ?>" type="text" class="form-control">
											</div>
										</div>
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
										<div class="col-lg-4">
											<div class="form-group">
												<label for="genericName">Generic Name</label>
												<input id="genericName" name="genericName" value="<?php echo $row['GenericName']; ?>" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="composition">Composition</label>
												<input id="composition" name="composition" value="<?php echo $row['Composition']; ?>" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="partyCodeName">Party Code & Name</label>
												<input id="partyCodeName" name="pcn" value="<?php echo $row['PCN']; ?>" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="selfLife">Self Life (in Months)</label>
												<input id="selfLife" name="selfLife" value="<?php echo $row['SelfLife']; ?>" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="rate">Rate</label>
												<input id="rate" name="rate" value="<?php echo $row['Rate']; ?>" type="number" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="mrp">MRP</label>
												<input id="mrp" name="mrp" value="<?php echo $row['MRP']; ?>" type="number" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="empRemark">Employee Remark <small>(<?php echo $row['Emp1Name']; ?>)</small></label>
												<textarea readonly id="empRemark" name="empRemark" placeholder="<?php echo $row['Emp1Remark']; ?>" class="form-control" rows="2" ></textarea>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="hodRemark">HOD Remark <small>(<?php echo $row['HOD1Name']; ?>)</small></label>
												<textarea readonly id="hodRemark" name="hodRemark" placeholder="<?php echo $row['HOD1Remark']; ?>" class="form-control" rows="2" ></textarea>
											</div>
										</div>
									</div>
									<!-- level 2 -->
									<hr class="my-3 ">
									<div class="lvl2 mt-2">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="batchSeries">Batch Series</label>
													<input id="batchSeries" name="batchSeries" value="<?php echo $row['BatchSeries']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="fdaApproval">FDA Approval</label>
													<input id="fdaApproval" name="fdaApproval" value="<?php echo $row['FDAApproval']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
											<div class="form-group">
												<label for="fdaApprovalDate">FDA Approval Date</label>
												<input id="fdaApprovalDate" name="fdaApprovalDate" value="<?php echo $row['FDAApprovalDate']; ?>" type="text" class="form-control" readonly>
											</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="colour">Colour</label>
													<input id="colour" name="colour" value="<?php echo $row['Colour']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="averageWeight">Average Weight</label>
													<input id="averageWeight" name="averageWeight" value="<?php echo $row['AverageWeight']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="shape">Shape</label>
													<input id="shape" name="shape" value="<?php echo $row['Shape']; ?>" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
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
											<div class="col-lg-6">
												<div class="form-group">
													<label for="empRemarkl2">Employee Remark (<small><?php echo $row['Emp2Name']; ?></small>)</label>
													<textarea id="empRemarkl2" name="empRemarkl2" class="form-control" rows="2" readonly><?php echo $row['Emp2Remark']; ?></textarea>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="hodRemarkl2">HOD Remark (<small><?php echo $row['HOD2Name']; ?></small>)</label>
													<textarea id="hodRemarkl2" name="hodRemarkl2" class="form-control" rows="2" readonly><?php echo $row['HOD2Remark']; ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<!-- level 3 -->
									<hr id="l3" class="my-3">
									<div class="lvl3 mt-2">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="packingType">Packing Type</label>
													<select id="packingType" name="packingType" class="custom-select form-control" required="true" autocomplete="on">
														<option><small><?php echo $row['PackingType']; ?></option>
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
													<input id="lFColour" name="lFColour" type="text" value="<?php echo $row['LFColour']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="baseFoil">Base Foil</label>
													<select id="baseFoil" name="baseFoil" class="custom-select form-control" required="true" autocomplete="on">
														<option><?php echo $row['BaseFoil']; ?></option>
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
													<input id="pVCPVDC" name="pVCPVDC" type="text" value="<?php echo $row['PVCPVDC']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="changePart">Change Part</label>
													<input id="changePart" name="changePart" type="text" value="<?php echo $row['ChangePart']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="empRemark">Remarks (If Any)</label>
													<textarea id="empRemark" name="empRemark" placeholder="<?php echo $row['EmpRemark']; ?>" class="form-control" rows="2" required></textarea>
												</div>
											</div>
											<div class="col-lg-12"><hr class="mt-3"></div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="monoCarton">Mono Carton</label>
													<input id="monoCarton" name="monoCarton" type="text" value="<?php echo $row['MonoCarton']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="insert3">Insert</label>
													<input id="insert3" name="insert3" type="text" value="<?php echo $row['Insert3']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="silicaGel">Silica Gel</label>
													<input id="silicaGel" name="silicaGel" type="text" value="<?php echo $row['SilicaGel']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="outerCarton">Outer Carton</label>
													<input id="outerCarton" name="outerCarton" type="text" value="<?php echo $row['OuterCarton']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shrink">Shrink</label>
													<input id="shrink" name="shrink" type="text" value="<?php echo $row['Shrink']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shipperSpecs">Shipper Specs</label>
													<input id="shipperSpecs" name="shipperSpecs" type="text" value="<?php echo $row['ShipperSpecs']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shipperPacking">Shipper Packing</label>
													<input id="shipperPacking" name="shipperPacking" type="text" value="<?php echo $row['ShipperPacking']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="referenceProduct">Reference Product</label>
													<input id="referenceProduct" name="referenceProduct" type="text" value="<?php echo $row['ReferenceProduct']; ?>" class="form-control" required="true" autocomplete="on">
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="otherRemark">OtherRemark (if any)</label>
													<textarea id="otherRemark" name="otherRemark" placeholder="<?php echo $row['OtherRemark']; ?>" class="form-control" rows="2" required></textarea>
												</div>
											</div>
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
													value="RESUBMIT FOR APPROVAL" name="updatenpd" id="add">
												</div>
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