<div class="lvl1">
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tblnpd WHERE NPDNumber = '$npdNumber' ") or die(mysqli_error());
        $row = mysqli_fetch_array($query);
        ?>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="npdNumber">NPD Number</label>
                <input id="npdNumber" name="npdNumber" value="<?php echo 'NP-' .  $row['NPDNumber']; ?>" type="text" class="form-control" readonly>
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
        <div class="col-lg-2">
            <div class="form-group">
                <label for="packStyle">Pack Style</label>
                <input readonly id="packStyle" name="packStyle" value="<?php echo $row['PackStyle']; ?>" type="text" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="bdName">BD Name</label>
                <input readonly id="bdName" name="bdName" value="<?php echo $row['BDName']; ?>" type="text" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="materialName">Material Name</label>
                <input readonly id="materialName" name="materialName" value="<?php echo $row['MaterialName']; ?>" type="text" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="division">Division</label>
                <input id="division" name="division" value="<?php echo $row['Division']; ?>" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="marketDistribution">Market/Distribution</label>
                <input id="marketDistribution" name="market" value="<?php echo $row['Market']; ?>" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="unit">Unit</label>
                <input id="unit" name="unit" value="<?php echo $row['Unit']; ?>" type="text" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="genericName">Generic Name</label>
                <input id="genericName" name="genericName" value="<?php echo $row['GenericName']; ?>" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="composition">Composition</label>
                <input id="composition" name="composition" value="<?php echo $row['Composition']; ?>" type="text" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="partyCodeName">Party Code & Name</label>
                <input id="partyCodeName" name="pcn" value="<?php echo $row['PCN']; ?>" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="selfLife">Self Life (In Months)</label>
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
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="empRemark">Remark <span style="font-size: 12px;">(<?php echo $row['EmpName']; ?>)</span></label>
                <textarea readonly id="empRemark" name="empRemark" placeholder="<?php echo $row['EmpRemark']; ?>" class="form-control" rows="2"></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hodRemark">HOD Remark (<small><?php echo $row['HODName']; ?></small>)</label>
                <textarea id="hodRemark" name="hodRemark" placeholder="<?php echo $row['HODRemark']; ?>" class="form-control" rows="2" readonly></textarea>
            </div>
        </div>
    </div>
</div>