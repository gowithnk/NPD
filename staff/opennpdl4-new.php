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

	$query = mysqli_query($conn, "SELECT * FROM l4npd WHERE NPDNumber = '$npdNumber'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('NPD Already Exists');</script>";
	} else {
		$query1 = mysqli_query($conn, "INSERT INTO l3npd (NPDNumber, Department, EmpName, EmpCode, PackingType, LFColour, BaseFoil, PVCPVDC, ChangePart, EmpRemark, MonoCarton, Insert3, SilicaGel, OuterCarton, Shrink, ShipperSpecs, ShipperPacking, ReferenceProduct, OtherRemark) VALUES ('$npdNumber', '$department', '$empName', '$empCode' ,'$packingType','$lFColour', '$baseFoil', '$pVCPVDC','$changePart', '$empRemark', '$monoCarton', '$insert3', '$silicaGel', '$outerCarton', '$shrink',	'$shipperSpecs', '$shipperPacking', '$referenceProduct', '$otherRemark')") or die(mysqli_error());

		$query2 = mysqli_query($conn, "UPDATE tblnpd SET LevelStatus = '3' WHERE NPDNumber = $npdNumber") or die(mysqli_error());

		if ($query1) {
			echo "<script>alert('NPD Updated Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'pendingnpdsl3.php'; </script>";
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
								<form  method="post">
									<?php
									// level 1
									include_once('../level-data/l1.php');
									// level 2
									include_once('../level-data/l2.php');
									// level 3
									include_once('../level-data/l3.php');
									?>

									<!-- Level 4 -->
									<hr id="l4" class="my-3">
									<div class="lvl-4">
										<div class="row">
											<div class="col-lg-5">
												<div class="form-group">
													<label for="batchSize">Batch Size</label>
													<input type="number" class="form-control" id="batchSize" name="batchSize" placeholder="Batch Size" id="batchSize" required>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label for="uom">U.O.M</label>
													<select class="form-control custom-select" name="uom" id="uom">
														<option value=""></option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="factor">Factor</label>
													<input type="text" class="form-control" name="factor" id="factor" placeholder="Factor">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="component">Component</label>
													<select name="component" id="compo" class="form-control custom-select compo" onchange="abs(this);" required="true" autocomplete="off">
														<option value="">...</option>
														<?php
														$query = mysqli_query($conn, "SELECT * FROM l4npd");

														while ($row = mysqli_fetch_array($query)) { ?>
															<option value="<?php echo $row['Component']; ?>" data-desc="<?php echo $row['ComponentDesc'] ?>"><?php echo $row['Component'] .' - ' .$row['ComponentDesc']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="componentDesc">Component Description</label>
													<!-- <input type="text" id="desc"> -->
													<select name="componentDesc1" id="componentDesc1" class="form-control custom-select" required>
															<option >Component Description</option>
													</select>
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
	<style>
	#divLoading	{
		display : none;
	}
	#divLoading.show{
		display : block;
		position : fixed;
		z-index: 100;
		background-image : url('http://loadinggif.com/images/image-selection/3.gif');
		background-color:#666;
		opacity : 0.4;
		background-repeat : no-repeat;
		background-position : center;
		left : 0;
		bottom : 0;
		right : 0;
		top : 0;
	}
	#loadinggif.show {left : 50%;
		top : 50%;
		position : absolute;
		z-index : 101;
		width : 32px;
		height : 32px;
		margin-left : -16px;
		margin-top : -16px;
	}
	</style>
		
		<script>
		$('#compo').selectize({ normalize: true });
	</script>

	<?php include('includes/scripts.php') ?>

	<script>
	// $(document).ready(function(){
	// 	jQuery('.compo').change(function(){
	// 		var id=jQuery(this).val();
	// 		//alert(id);
	// 			$("#divLoading").addClass('show');
	// 			jQuery.ajax({
	// 				type:'post',
	// 				url:'get-data.php',
	// 				data:'id='+id,
	// 				success:function(result){
	// 			 		$("#divLoading").removeClass('show');
	// 					jQuery('#componentDesc').html(result);
	// 				}
	// 			});
	// 	});
	// });
	// function abs(e){
	// 	console.log(e);
	// }
function addOption(selecterId, options = []) {
	var productSelect = document.getElementById(selecterId);
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

	function getOption(Component) {
		jQuery.ajax({
			type:'post',
			url:'get-data.php',
			data:'Component='+Component,
			success:function(result){
				// $("#divLoading").removeClass('show');
				//jQuery('#componentDesc').val(result);
				// document.getElementById("desc").value = result;
				addOption('componentDesc1', [{label: result, value: result, selected: true}])
				
			}
		});
	}

	function abs(sel) {
            const seletedOption  = sel.options[sel.selectedIndex];
			const selected = seletedOption.selected;
			const label = seletedOption.label;
            const value = seletedOption.value;

			if(value  && label && selected){
				getOption(value)
			} else {

				addOption('componentDesc1', [])
			}
        }
	</script>
</body>

</html>