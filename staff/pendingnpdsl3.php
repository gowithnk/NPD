<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

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
								<h4>Pending NPDs</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Pending NPDs</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-1 mt-1 h4">All Pending NPDs</h2>
							<hr>
							<section>
								<div class="pb-10">
									<table class="data-table-ten table stripe hover nowrap">
										<thead>
											<tr>
												<th class="datatable-nosort">S. No.</th>
												<th class="table-plus">NPD No.</th>
												<th>Revisions</th>
												<th>Date</th>
												<th>BD Name</th>
												<th>Pack Style</th>
												<th>Material Name</th>
												<th>Division</th>
												<th>Market</th>
												<th>Unit</th>
												<th>Generic Name</th>
												<th>Composition</th>
												<th>Party Code & Name</th>
												<th>Self Life</th>
												<th>Rate</th>
												<th>MRP</th>
												<th>Employee Remark</th>
												<th>Employee Name</th>
												<th>HOD Remark</th>
												<th>HOD Name</th>
												<th>Batch Series</th>
												<th>FDA Approval</th>
												<th>FDA Approval Date</th>
												<th>Colour</th>
												<th>Average Weight</th>
												<th>Shape</th>
												<th>Size</th>
												<th>General Info</th>
												<th>Remark</th>
												<th>Emp. Name</th>
												<th>HOD Remark</th>
												<th>HOD Name</th>
												<th>Packing Type</th>
												<th>LF Coloure</th>
												<th>Base Foil</th>
												<th>PVC / PVDC</th>
												<th>Change Part</th>
												<th>Remarks</th>
												<th>Mono Carton</th>
												<th>Insert</th>
												<th>Silica Gel</th>
												<th>Outer Carton</th>
												<th>Shrink</th>
												<th>Shipper Specs</th>
												<th>Shipper Packing</th>
												<th>Reference Product</th>
												<th>OtherRemark</th>
											</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT *, tblnpd.EmpName as Emp1Name, tblnpd.EmpRemark as Emp1Remark, tblnpd.HODName as HOD1Name,	tblnpd.HODRemark as 
											HOD1Remark, l2npd.EmpName as Emp2Name, l2npd.EmpRemark as Emp2Remark, l2npd.HODName as HOD2Name, l2npd.HODRemark as HOD2Remark 
											FROM tblnpd JOIN l2npd ON tblnpd.NPDNumber = l2npd.NPDNumber JOIN l3npd ON l2npd.NPDNumber = l3npd.NPDNumber 
											WHERE tblnpd.Status=1 AND tblnpd.LevelStatus=3 AND l2npd.Status=1 AND l3npd.Status=0 ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {  ?>
													<tr>
														<td>
															<div class="table-actions">
																<?php echo $cnt ?>
																<a class="modalV" href="#" data-toggle="modal" data-color="#265ed7">
																	&nbsp;&nbsp;&nbsp;<i class="icon-copy dw dw-eye"></i></a>
															</div>
														</td>
														<td><?php echo 'NP-' . htmlentities($result->NPDNumber); ?></td>
														<td><?php echo htmlentities($result->RevisionNo); ?></td>
														<td><?php echo htmlentities($result->Date); ?></td>
														<td><?php echo htmlentities($result->BDName); ?></td>
														<td><?php echo htmlentities($result->PackStyle); ?></td>
														<td><?php echo htmlentities($result->MaterialName); ?></td>
														<td><?php echo htmlentities($result->Division); ?></td>
														<td><?php echo htmlentities($result->Market); ?></td>
														<td><?php echo htmlentities($result->Unit); ?></td>
														<td><?php echo htmlentities($result->GenericName); ?></td>
														<td><?php echo htmlentities($result->Composition); ?></td>
														<td><?php echo htmlentities($result->PCN); ?></td>
														<td><?php echo htmlentities($result->SelfLife); ?></td>
														<td><?php echo htmlentities($result->Rate); ?></td>
														<td><?php echo htmlentities($result->MRP); ?></td>
														<td><?php echo htmlentities($result->Emp1Remark); ?></td>
														<td><?php echo htmlentities($result->Emp1Name); ?></td>
														<td><?php echo htmlentities($result->HOD1Remark); ?></td>
														<td><?php echo htmlentities($result->HOD1Name); ?></td>
														<td><?php echo htmlentities($result->BatchSeries); ?></td>
														<td><?php echo htmlentities($result->FDAApproval); ?></td>
														<td><?php echo htmlentities($result->FDAApprovalDate); ?></td>
														<td><?php echo htmlentities($result->Colour); ?></td>
														<td><?php echo htmlentities($result->AverageWeight); ?></td>
														<td><?php echo htmlentities($result->Shape); ?></td>
														<td><?php echo htmlentities($result->Size); ?></td>
														<td><?php echo htmlentities($result->GeneralInfo); ?></td>
														<td><?php echo htmlentities($result->Emp2Remark); ?></td>
														<td><?php echo htmlentities($result->Emp2Name); ?></td>
														<td><?php echo htmlentities($result->HOD2Remark); ?></td>
														<td><?php echo htmlentities($result->HOD2Name); ?></td>
														<td><?php echo htmlentities($result->PackingType); ?></td>
														<td><?php echo htmlentities($result->LFColour); ?></td>
														<td><?php echo htmlentities($result->BaseFoil); ?></td>
														<td><?php echo htmlentities($result->PVCPVDC); ?></td>
														<td><?php echo htmlentities($result->ChangePart); ?></td>
														<td><?php echo htmlentities($result->EmpRemark); ?></td>
														<td><?php echo htmlentities($result->MonoCarton); ?></td>
														<td><?php echo htmlentities($result->Insert3); ?></td>
														<td><?php echo htmlentities($result->SilicaGel); ?></td>
														<td><?php echo htmlentities($result->OuterCarton); ?></td>
														<td><?php echo htmlentities($result->Shrink); ?></td>
														<td><?php echo htmlentities($result->ShipperSpecs); ?></td>
														<td><?php echo htmlentities($result->ShipperPacking); ?></td>
														<td><?php echo htmlentities($result->ReferenceProduct); ?></td>
														<td><?php echo htmlentities($result->OtherRemark); ?></td>
													</tr>

											<?php $cnt++;
												}
											} ?>

										</tbody>
									</table>
								</div>
							</section>
						</div>
					</div>
				</div>
				<!-- View Modal -->

				<!-- Modal -->
				<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">NPD Details</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="pb-10">
									<!-- Level 1 -->
									<div class="lvl1">
										<div class="row">
											<div class="col-lg-2">
												<div class="form-group">
													<label for="npdNumber">NPD Number</label>
													<input id="npdNumber" name="npdNumber" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="revNumber">Revision No.</label>
													<input id="revNumber" name="revNumber" type="number" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<?php
													date_default_timezone_set('Asia/Kolkata');
													$date = date('Y-m-d H:i A');
													?>
													<label for="date">Date</label>
													<input id="date" name="date" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="bdName">BD Name</label>
													<input readonly id="bdName" name="bdName" type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-5">
												<div class="form-group">
													<label for="packStyle">Pack Style</label>
													<input readonly id="packStyle" name="packStyle" type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-7">
												<div class="form-group">
													<label for="materialName">Material Name</label>
													<input readonly id="materialName" name="materialName" type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="division">Division</label>
													<input id="division" name="division" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="marketDistribution">Market/Distribution</label>
													<input id="marketDistribution" name="market" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="unit">Unit</label>
													<input id="unit" name="unit" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="genericName">Generic Name</label>
													<input id="genericName" name="genericName" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="composition">Composition</label>
													<input id="composition" name="composition" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-5">
												<div class="form-group">
													<label for="partyCodeName">Party Code & Name</label>
													<input id="partyCodeName" name="pcn" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="selfLife">Self Life (in months)</label>
													<input id="selfLife" name="selfLife" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="rate">Rate</label>
													<input id="rate" name="rate" type="number" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="mrp">MRP</label>
													<input id="mrp" name="mrp" type="number" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="emp1Remark">Employee Remark <small>(<label id="emp1Name"></label>)</small></label>
													<textarea readonly id="emp1Remark" name="emp1Remark" class="form-control" rows="1"></textarea>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="hodRemark">HOD Remark <small>(<label id="hod1Name"></label>)</small></label>
													<textarea id="hodRemark" name="hodRemark" class="form-control" rows="1" readonly></textarea>
												</div>
											</div>
										</div>
									</div>
									<!-- Level 2 -->
									<div class="lvl2">
										<hr class="my-3">
										<div class="row">
											<div class="col-lg-5">
												<div class="form-group">
													<label for="batchSeries">Batch Series</label>
													<input id="batchSeries" name="batchSeries" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="fdaApproval">FDA Approval</label>
													<input id="fdaApproval" name="fdaApproval" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="fdaApprovalDate">FDA Approval Date</label>
													<input id="fdaApprovalDate" name="fdaApprovalDate" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="colour">Colour</label>
													<input id="colour" name="colour" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="averageWeight">Average Weight</label>
													<input id="averageWeight" name="averageWeight" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="shape">Shape</label>
													<input id="shape" name="shape" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="form-group">
													<label for="size">Size</label>
													<input id="size" name="size" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-5">
												<div class="form-group">
													<label for="generalInfo">General Info</label>
													<input id="generalInfo" name="generalInfo" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="emp2Remark">Remark <small>(<label id="emp2Name"></label>)</small></label>
													<input id="emp2Remark" name="emp2Remark" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="hod2Remark">HOD Remark <small>(<label id="hod2Name"></label>)</small></label>
													<input id="hod2Remark" name="hod2Remark" type="text" class="form-control" readonly>
												</div>
											</div>
										</div>
									</div>
									<!-- Level 3 -->
									<div class="lvl3">
										<hr class="my-3">
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label for="packingType">Packing Type</label>
													<input id="packingType" name="packingType" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="lFColour">Leading Foil (Colour)</label>
													<input id="lFColour" name="lFColour" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="baseFoil">Base Foil</label>
													<input id="baseFoil" name="baseFoil" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="pVCPVDC">PVC / PVDC</label>
													<input id="pVCPVDC" name="pVCPVDC" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-5">
												<div class="form-group">
													<label for="changePart">Change Part</label>
													<input id="changePart" name="changePart" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-7">
												<div class="form-group">
													<label for="empRemark">Remarks</label>
													<input id="empRemark" name="empRemark" type="text" class="form-control" readonly>
												</div>
												
											</div>
											<div class="col-lg-12"><hr class="mx-5"></div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="monoCarton">Mono Carton</label>
													<input id="monoCarton" name="monoCarton" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="insert3">Insert</label>
													<input id="insert3" name="insert3" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="silicaGel">Silica Gel</label>
													<input id="silicaGel" name="silicaGel" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="outerCarton">Outer Carton</label>
													<input id="outerCarton" name="outerCarton" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shrink">Shrink</label>
													<input id="shrink" name="shrink" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="shipperSpecs">Shipper Specs</label>
													<input id="shipperSpecs" name="shipperSpecs" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="shipperPacking">Shipper Packing</label>
													<input id="shipperPacking" name="shipperPacking" type="text" class="form-control" readonly>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="referenceProduct">Reference Product</label>
													<input id="referenceProduct" name="referenceProduct" type="text" class="form-control" readonly>
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group">
													<label for="otherRemark">Other Remarks</label>
													<input id="otherRemark" name="otherRemark" type="text" class="form-control" readonly>
												</div>
											</div>
											<!-- <div class="col-lg-6">
												<div class="form-group">
													<label for="hodRemark">HOD Remark <small>(<label id="hodName"></label>)</small></label>
													<input id="hodRemark" name="hodRemark" type="text" class="form-control" readonly>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
								<!-- <button type="button" class="btn btn-primary">Print</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php') ?>
	<script>
		$(document).ready(function() {
			$(".modalV").click(function() {

				$('#myModal').modal('show')

				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function() {
					return $(this).text();
				}).get();
				console.log(data);

				$('#npdNumber').val(data[1]);
				$('#revNumber').val(data[2]);
				$('#date').val(data[3]);
				$('#bdName').val(data[4]);
				$('#packStyle').val(data[5]);
				$('#materialName').val(data[6]);
				$('#division').val(data[7]);
				$('#marketDistribution').val(data[8]);
				$('#unit').val(data[9]);
				$('#genericName').val(data[10]);
				$('#composition').val(data[11]);
				$('#partyCodeName').val(data[12]);
				$('#selfLife').val(data[13]);
				$('#rate').val(data[14]);
				$('#mrp').val(data[15]);
				$('#emp1Remark').val(data[16]);
				$('#emp1Name').html(data[17]);
				$('#hodRemark').val(data[18]);
				$('#hod1Name').html(data[19]);
				$('#batchSeries').val(data[20]);
				$('#fdaApproval').val(data[21]);
				$('#fdaApprovalDate').val(data[22]);
				$('#colour').val(data[23]);
				$('#averageWeight').val(data[24]);
				$('#shape').val(data[25]);
				$('#size').val(data[26]);
				$('#generalInfo').val(data[27]);
				$('#emp2Remark').val(data[28]);
				$('#emp2Name').html(data[29]);
				$('#hod2Remark').val(data[30]);
				$('#hod2Name').html(data[31]);
				$('#packingType').val(data[32]);
				$('#lFColour').val(data[33]);
				$('#baseFoil').val(data[34]);
				$('#pVCPVDC').val(data[35]);
				$('#changePart').val(data[36]);
				$('#empRemark').val(data[37]);
				$('#monoCarton').val(data[38]);
				$('#insert3').val(data[39]);
				$('#silicaGel').val(data[40]);
				$('#outerCarton').val(data[41]);
				$('#shrink').val(data[42]);
				$('#shipperSpecs').val(data[43]);
				$('#shipperPacking').val(data[44]);
				$('#referenceProduct').val(data[45]);
				$('#otherRemark').val(data[46]);
				printSection(el);
			});
		});
	</script>
</body>

</html>