<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php $npdNumber = $_GET['edit']; ?>
<?php
$query_staff = mysqli_query($conn, "SELECT * FROM tblemployees JOIN  tbldepartments WHERE emp_id = '$session_id'")
	or die(mysqli_error());
$row_staff = mysqli_fetch_array($query_staff);

if (isset($_POST['updatenpd']) && $_POST['npdNumber'] !== '') {
	$department = $row_staff['Department'];
	$empCode = $row_staff['Staff_ID'];
	$fn = $row_staff['FirstName'];
	$ln = $row_staff['LastName'];
	$empName = $fn . ' ' . $ln;
	$batchField = $_POST['batchField'];
	$uom = $_POST['uom'];
	$factor = $_POST['factor'];
	$overage = $_POST['overage'];
	$component = $_POST['component'];
	$componentDesc = $_POST['componentDesc'];
	$claim = $_POST['claim'];
	$quantity = $_POST['quantity'];
	$materialType = $_POST['materialType'];
	$empRemark = $_POST['empRemark'];

	$query = mysqli_query($conn, "SELECT * FROM l4npd WHERE NPDNumber = '$npdNumber'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('NPD Already Exists');</script>";
	} else {
		$query1 = mysqli_query($conn, "INSERT INTO l4npd (NPDNumber, Department, EmpName, EmpCode, EmpRemark, BatchField, Factor, Overage) VALUES ('$npdNumber', '$department', '$empName', '$empCode','$empRemark', '$batchField', '$factor', '$overage')")
			or die(mysqli_error());

		foreach ($component as $key => $value) {
			$sql2 = "INSERT INTO l4npd_component(Component,ComponentDesc,Claim,Qty,MaterialType,UOM,NPDNumber) 
					VALUE ('" . $value . "', '" . $componentDesc[$key] . "', '" . $claim[$key] . "', '" . $quantity[$key] . "', '" . $materialType[$key] . "', '" . $uom[$key] . "', '$npdNumber')";

			$query2 = mysqli_query($conn, $sql2);
		}

		$query2 = mysqli_query($conn, "UPDATE tblnpd SET LevelStatus = '4' WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query1 && $query2) {
			echo "<script>alert('NPD Updated Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'pendingnpdsl4.php'; </script>";
		}
	}
} else {
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
								<form method="post">
									<?php
									// level 1
									include_once('../level-data/l1.php');
									// level 2
									include_once('../level-data/l2.php');
									// level 3
									include_once('../level-data/l3.php');
									?>
									<hr id="l4" class="my-3">
									<div class="lvl-4">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="batchField">Batch Field</label>
													<input type="text" class="form-control" id="batchField" name="batchField" placeholder="Batch Field" required>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="overage">Overage </label>
													<input type="text" class="form-control" id="overage" name="overage" placeholder="overage" required>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="factor">Factor</label>
													<input type="text" class="form-control" name="factor" id="factor" placeholder="Factor">
												</div>
											</div>
											<!-- Component Repeater -->
											<div id="show_item">
												<div class="row mx-0">
													<div class="col-lg-2">
														<div class="form-group">
															<label for="component">Component</label>
															<select name="component[]" id="compo" class="form-control custom-select compo" onchange="abs(this, 0);" required="true" autocomplete="off">
																<option value="">...</option>
																<?php
																$query = mysqli_query($conn, "SELECT * FROM tblcomponents");

																while ($row = mysqli_fetch_array($query)) { ?>
																	<option value="<?php echo $row['Component']; ?>" data-desc="<?php echo $row['ComponentDesc'] ?>"><?php echo $row['Component'] . ' - ' . $row['ComponentDesc']; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label for="componentDesc">Component Desc</label>
															<!-- <input type="text" id="desc"> -->
															<select name="componentDesc[]" id="componentDesc0" class="form-control custom-select" required>
																<option value="">...</option>
															</select>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label for="claim">Claim</label>
															<input type="text" class="form-control" name="claim[]" id="claim" placeholder="claim">
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label for="quantity">Qty</label>
															<input type="number" class="form-control" name="quantity[]" id="quantity" placeholder="quantity">
														</div>
													</div>
													<div class="col-lg-1">
														<div class="form-group">
															<label for="uom">U.O.M</label>
															<input type="text" class="form-control" id="uom" name="uom[]" placeholder="uom" required>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label for="materialType">Material Type</label>
															<select name="materialType[]" id="materialType" class="custom-select form-control">
																<option value="">...</option>
																<option>ZSFG</option>
																<option>ZRWA</option>
																<option>ZRWE</option>
																<option>ZPKP</option>
																<option>ZPKN</option>
															</select>
														</div>
													</div>
													<div class="col-lg-1">
														<div class="form-group">
															<button class="btn btn-success btn-sm add_item_btn mt-4">+</button>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="empRemark">Remarks</label>
													<textarea id="empRemark" name="empRemark" placeholder="Mark your remarks here..." class="form-control" rows="2" required></textarea>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="dropdown">
													<input class="btn btn-primary btn-block mt-3" type="submit" value="UPDATE NPD" name="updatenpd" id="add">
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

	<div id="divLoading"></div>

	<script>
		//console.log('selectize', $('#compo99'));
		$('#compo').selectize({
			normalize: true
		});
	</script>

	<?php include('includes/scripts.php') ?>

	<script>
		function loadScript(src, callback) {
			$(`script[src='{src}']`).remove()
			var script;
			var scriptTag;
			script = document.createElement('script');
			script.type = 'text/javascript';
			script.src = src;
			script.onload = script.onreadystatechange = function() {
				if (!this.readyState || this.readyState == 'complete') {
					callback();
				}
			};
			scriptTag = document.getElementsByTagName('script')[0];
			scriptTag.parentNode.insertBefore(script, scriptTag);
		}

		function reInitSelectSearch(itemIdx = 0) {
			// console.log('reInitSelectSearch', itemIdx);
			// console.log('reInitSelectSearch', $('#compo' + itemIdx));

			loadScript('../vendors/scripts/selectize-core.js', () => {
				//console.log('loadScript', 'loadScript')
				$('#compo' + itemIdx).selectize();
			});
		}

		function addOption(selecterId, options = []) {
			var productSelect = document.getElementById(selecterId);
			productSelect.options.length = 0;
			for (var index = 0; index < options.length; index++) {
				// console.log(options[index]);
				var item = options[index];
				var pSelectOption = document.createElement("option");
				pSelectOption.text = item.label;
				pSelectOption.value = item.value;
				pSelectOption.selected = item.selected || false;
				productSelect.add(pSelectOption);
			}
		}

		function getOption(Component, itemIdx = 0) {
			//console.log('getOption', itemIdx);
			$("#divLoading").addClass('show');
			jQuery.ajax({
				type: 'post',
				url: 'get-data.php',
				data: 'Component=' + Component,
				success: function(result) {
					$("#divLoading").removeClass('show');
					addOption('componentDesc' + itemIdx, [{
						label: result,
						value: result,
						selected: true
					}])
				}
			});
		}

		function abs(sel, itemIdx = 0) {
			//console.log('abs', itemIdx);

			const seletedOption = sel.options[sel.selectedIndex];
			const selected = seletedOption.selected;
			const label = seletedOption.label;
			const value = seletedOption.value;

			if (value && label && selected) {
				getOption(value, itemIdx)
			} else {

				addOption('componentDesc', [])
			}
		}
	</script>
	<!-- Item Repeater -->
	<script>
		$(document).ready(function() {
			$(".add_item_btn").click(function(e) {
				e.preventDefault();
				var itemsLen = $("#show_item").children().length + 1;
				//console.log(itemsLen);
				$("#show_item").append(`
				<div class="row mx-0">
					<!-- <div class="col-lg-12">
						<hr class="bg-info">
					</div> -->
					<div class="col-lg-2">
						<div class="form-group">
							<select name="component[]" id="compo${itemsLen}" class="form-control custom-select compo" onchange="abs(this, ${itemsLen});" required="true" autocomplete="off">
								<option value="">...</option>
								<?php
								$query = mysqli_query($conn, "SELECT * FROM tblcomponents");

								while ($row = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $row['Component']; ?>" data-desc="<?php echo $row['ComponentDesc'] ?>"><?php echo $row['Component'] . ' - ' . $row['ComponentDesc']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<select name="componentDesc[]" id="componentDesc${itemsLen}" class="form-control custom-select" required>
								<option value="">...</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<input type="text" class="form-control" name="claim[]" id="claim" placeholder="claim">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<input type="number" class="form-control" name="quantity[]" id="quantity" placeholder="quantity">
						</div>
					</div>
					<div class="col-lg-1">
						<div class="form-group">
							<input type="text" class="form-control" id="uom" name="uom[]" placeholder="uom" required>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<select name="materialType[]" id="materialType" class="custom-select form-control">
								<option value="">...</option>
								<option>ZSFG</option>
								<option>ZRWA</option>
								<option>ZRWE</option>
								<option>ZPKP</option>
								<option>ZPKN</option>
							</select>
						</div>
					</div>
					<div class="col-lg-1">
						<div class="form-group">
							<button class="btn btn-danger btn-sm remove_item_btn"><i class="fa-solid fa-trash-can"></i>X</button>
						</div>
					</div>
				</div>
                `);

				setTimeout(() => {
					reInitSelectSearch(itemsLen)
				}, 400)
			});
			$(document).on('click', '.remove_item_btn', function(e) {
				e.preventDefault();
				let row_item = $(this).parent().parent().parent();
				$(row_item).remove();
			});
		});
	</script>
</body>

</html>