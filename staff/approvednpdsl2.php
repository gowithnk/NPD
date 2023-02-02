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
								<h4>Approved NPDs</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Approved NPDs</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-1 mt-1 h4">Approved NPDs</h2>
							<hr>
							<section>
								<div class="pb-10">
									<table class="data-table-ten table stripe hover nowrap">
										<thead>
											<tr>
												<th class="datatable-nosort">ACTION</th>
												<th class="table-plus">NPD No.</th>
												<th>Revisions</th>
												<th>Date</th>
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
												<th>HOD Remark</th>
											</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from tblnpd where Status=1 ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {  ?>
													<tr>
														<td>
															<div class="table-actions">
																<a class="modalV" href="#" data-toggle="modal" data-color="#265ed7">
																&nbsp;&nbsp;&nbsp;<i class="icon-copy dw dw-eye"></i></a>
															</div>
														</td>
														<td><?php echo 'NP-' . htmlentities($result->NPDNumber); ?></td>
														<td><?php echo htmlentities($result->RevisionNo); ?></td>
														<td><?php echo htmlentities($result->Date); ?></td>
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
														<td><?php echo htmlentities($result->EmpRemark); ?></td>
														<td><?php echo htmlentities($result->HODRemark); ?></td>
													</tr>

											<?php }} ?>

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
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="npdNumber">NPD Number</label>
												<input id="npdNumber" name="npdNumber" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="revNumber">Revision No.</label>
												<input id="revNumber" name="revNumber" type="number" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<?php
												date_default_timezone_set('Asia/Kolkata');
												$date = date('Y-m-d H:i A');
												?>
												<label for="date">Date</label>
												<input id="date" name="date" class="form-control" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="packStyle">Pack Style</label>
												<input readonly id="packStyle" name="packStyle" type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="materialName">Material Name</label>
												<input readonly id="materialName" name="materialName" type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
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
									</div>
									<div class="row">
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
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="partyCodeName">Party Code & Name</label>
												<input id="partyCodeName" name="pcn" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="selfLife">Self Life</label>
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
										<div class="col-lg-12">
											<div class="form-group">
												<label for="empRemark">Employee Remark</label>
												<textarea readonly id="empRemark" name="empRemark" class="form-control" rows="2"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label for="hodRemark">HOD Remark</label>
												<textarea id="hodRemark" name="hodRemark" class="form-control" rows="2" readonly></textarea>
											</div>
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
				var data = $tr.children("td").map(function (){
					return $(this).text();
				}).get();
				console.log(data);

				$('#npdNumber').val(data[1]);
				$('#revNumber').val(data[2]);
				$('#date').val(data[3]);
				$('#packStyle').val(data[4]);
				$('#materialName').val(data[5]);
				$('#division').val(data[6]);
				$('#marketDistribution').val(data[7]);
				$('#unit').val(data[8]);
				$('#genericName').val(data[9]);
				$('#composition').val(data[10]);
				$('#partyCodeName').val(data[11]);
				$('#selfLife').val(data[12]);
				$('#rate').val(data[13]);
				$('#mrp').val(data[14]);
				$('#empRemark').val(data[15]);
				$('#hodRemark').val(data[16]);
				printSection(el);
			});
		});
	</script>
</body>

</html>