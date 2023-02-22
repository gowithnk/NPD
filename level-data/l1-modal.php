<div class="row">
    <div class="col-lg-3">
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
    <div class="col-lg-4">
        <div class="form-group">
            <label for="bdName">BD Name</label>
            <input id="bdName" name="bdName" type="text" class="form-control" readonly>
        </div>
    </div>
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
            <label for="selfLife">Self Life (In Months)</label>
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
    <div class="col-lg-6">
        <div class="form-group">
            <label for="empRemark">Employee Remark <small>(<label id="empName"></label>)</small></label>
            <textarea readonly id="empRemark" name="empRemark" class="form-control" rows="2"></textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="hodRemark">HOD Remark <small>(<label id="hodName"></label>)</small></label>
            <textarea id="hodRemark" name="hodRemark" class="form-control" rows="2" readonly></textarea>
        </div>
    </div>
</div>