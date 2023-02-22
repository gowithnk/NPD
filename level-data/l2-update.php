<hr class="my-3 ">
<div class="lvl2 mt-2">
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM l2npd WHERE NPDNumber = '$npdNumber' ") or die(mysqli_error());
        $row = mysqli_fetch_array($query);
        ?>
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
        <div class="col-lg-12">
            <div class="form-group">
                <label for="empRemarkl2">Employee Remark (<small><?php echo $row['EmpName']; ?></small>)</label>
                <textarea id="empRemarkl2" name="empRemarkl2" class="form-control" rows="2" readonly><?php echo $row['EmpRemark']; ?></textarea>
            </div>
        </div>
    </div>
</div>