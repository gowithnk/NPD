<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php
	require '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	if(isset($_POST['add']))
{
    $fileName = $_FILES['attendance_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['attendance_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $name = $row['1'];
                $empCode = $row['2'];
                $department = $row['3'];
                $inTime = $row['4'];
                $outTime = $row['5'];        
                $date = $row['6'];      

                $atQuery = "INSERT INTO attendance (Name,EmpCode,Department,InTime,OutTime,Date) VALUES 
				('$name','$empCode','$department','$inTime','$outTime','$date')";
                $result = mysqli_query($conn, $atQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: attendance.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: attendance.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: attendance.php');
        exit(0);
    }
}
?>

<?php
 

?>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/deskapp-logo-svg.png" width="150" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

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
									<h4>Manage Attendance</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Attendance</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Add Attendance</h2>
								<section>
									<form name="save" method="post"  enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Choose Excel or CSV Files</label>
												<input name="attendance_file" type="file" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-block btn-primary" type="submit" value="UPLOAD" name="add" id="add">
									    </div>
									</div>
								   </form>
								   <div class="col-sm-12">
										<?php

											if(isset($_SESSION['message']))
											{
												echo "<br><h6 style='color:blue;'>".$_SESSION['message']."</h6>";
												unset($_SESSION['message']);
												
											}
										?>
								   </div>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-20 pt-10 height-100-p">
								<h2 class="mb-30 h4">Attendance List</h2>
								<div class="pb-10">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th>S NO.</th>
											<th class="table-plus">NAME</th>
											<th>E. CODE</th>
											<th>DEPT</th>
											<th>I/T</th>
											<th>O/T</th>
											<th>WH</th>
											<!-- <th class="datatable-nosort">ACTION</th> -->
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from attendance";
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
	                                            <td><?php echo htmlentities($result->Name);?></td>
	                                            <td><?php echo htmlentities($result->EmpCode);?></td>
	                                            <td><?php echo htmlentities($result->Department);?></td>
	                                            <td><?php echo htmlentities($result->InTime);?></td>
	                                            <td><?php echo htmlentities($result->OutTime);?></td>
												<td>
													<?php 
													
												$inTime = htmlentities($result->InTime);
												$outTime = htmlentities($result->OutTime);
												$inTime = strtotime($inTime);
												$outTime = strtotime($outTime);
												$hour = round(abs($outTime - $inTime) / 3600,2);
												echo $hour . ' Hr.'; ?>
												</td>
												<!-- <td>
													<div class="table-actions">
														<a href="edit_department.php?edit=<?php //echo htmlentities($result->id);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="department.php?delete=<?php //echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td> -->
											</tr>

											<?php $cnt++; } }?>  

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