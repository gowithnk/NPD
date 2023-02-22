<hr id="l3" class="my-3">
<div class="lvl-3">
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM l3npd WHERE NPDNumber = '$npdNumber' ") or die(mysqli_error());
        $row = mysqli_fetch_array($query);
        ?>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="packingType">Packing Type</label>
                <input id="packingType" name="packingType" type="text" value="<?php echo $row['PackingType']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="lFColour">Leading Foil (Colour)</label>
                <input id="lFColour" name="lFColour" type="text" value="<?php echo $row['LFColour']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="baseFoil">Base Foil</label>
                <input id="baseFoil" name="baseFoil" type="text" value="<?php echo $row['BaseFoil']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="pVCPVDC">PVC / PVDC</label>
                <input id="pVCPVDC" name="pVCPVDC" type="text" value="<?php echo $row['PVCPVDC']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label for="changePart">Change Part</label>
                <input id="changePart" name="changePart" type="text" value="<?php echo $row['ChangePart']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <label for="empRemark">Remarks</label>
                <input id="empRemark" name="empRemark" type="text" value="<?php echo $row['EmpRemark']; ?>" class="form-control" readonly>
            </div>

        </div>
        <div class="col-lg-12">
            <hr class="mx-5">
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="monoCarton">Mono Carton</label>
                <input id="monoCarton" name="monoCarton" type="text" value="<?php echo $row['MonoCarton']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="insert3">Insert</label>
                <input id="insert3" name="insert3" type="text" value="<?php echo $row['Insert3']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="silicaGel">Silica Gel</label>
                <input id="silicaGel" name="silicaGel" type="text" value="<?php echo $row['SilicaGel']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="outerCarton">Outer Carton</label>
                <input id="outerCarton" name="outerCarton" type="text" value="<?php echo $row['OuterCarton']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="shrink">Shrink</label>
                <input id="shrink" name="shrink" type="text" value="<?php echo $row['Shrink']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="shipperSpecs">Shipper Specs</label>
                <input id="shipperSpecs" name="shipperSpecs" type="text" value="<?php echo $row['ShipperSpecs']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="shipperPacking">Shipper Packing</label>
                <input id="shipperPacking" name="shipperPacking" type="text" value="<?php echo $row['ShipperPacking']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="referenceProduct">Reference Product</label>
                <input id="referenceProduct" name="referenceProduct" type="text" value="<?php echo $row['ReferenceProduct']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="otherRemark">Other Remarks <small>(<?php echo $row['EmpName']; ?>)</small></label>
                <input id="otherRemark" name="otherRemark" type="text" value="<?php echo $row['OtherRemark']; ?>" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>