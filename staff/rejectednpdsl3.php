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
								<h4>Rejected NPD</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Rejected NPD</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-1 mt-1 h4">All Rejected NPD</h2>
							<hr>
							<section>
							<div class="pb-10">
								<table class="data-table-ten table stripe hover nowrap">
									<thead>
										<tr>
											<th>SR NO.</th>
											<th class="table-plus">NPD No.</th>
											<th>Packing Type</th>
											<th>Change Part</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
									</thead>
									<tbody>

										<?php 
											$query= mysqli_query($conn,"select * from tblemployees where emp_id = '$session_id'")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
											$empDept = $row['Department'];
											$sql = "SELECT * FROM l3npd WHERE Status=2 AND Department = '$empDept' ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {               ?>
													<tr>
														<td> <?php echo htmlentities($cnt); ?></td>
														<td><?php echo 'NP-' . htmlentities($result->NPDNumber); ?></td>
														<td><?php echo htmlentities($result->PackingType); ?></td>
														<td><?php echo htmlentities($result->ChangePart); ?></td>
														<td>
															<div class="table-actions">
																<a href="rejectednpdl3.php?edit=<?php echo htmlentities($result->NPDNumber); ?>" data-color="#265ed7">
																<i class="icon-copy dw dw-edit2"></i></a>
															</div>
														</td>
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
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php') ?>
</body>

</html>