<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$ptn_id = $_GET['delete'];
		$sql = "DELETE FROM tblpartyname where id = ".$ptn_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Party Name deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'partyname.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	 $partyName=$_POST['partyName'];

     $query = mysqli_query($conn,"SELECT * FROM tblpartyname WHERE PartyName = '$partyName'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
     	echo "<script>alert('Party Name Already exist');</script>";
      }
      else{
        $query = mysqli_query($conn,"INSERT INTO tblpartyName (PartyName) VALUES ('$partyName')") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('Party Name Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'partyName.php'; </script>";
		}
    }

}

?>
<body>

	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Party Name List</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Party Name</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">New Party Name</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="partyName" >Party Name</label>
												<input name="partyName" id="partyName" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-primary btn-block mt-3" type="submit" value="ADD Party Name" name="add" id="add">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-20 pt-10 height-100-p">
								<h2 class="mb-30 h4">Party Name List</h2>
								<div class="pb-10">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th>SR NO.</th>
											<th class="table-plus">Party Name</th>
											<th>Date Time</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from tblpartyname";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td> <?php echo htmlentities($cnt);?></td>
	                                            <td><?php echo htmlentities($result->PartyName);?></td>
	                                            <td><?php echo htmlentities($result->DateTime);?></td>
												<td>
													<div class="table-actions">
														<a href="edit_partyname.php?edit=<?php echo htmlentities($result->id);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="partyname.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td>
											</tr>

											<?php $cnt++;} }?>  

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>