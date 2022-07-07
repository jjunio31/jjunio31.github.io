<!DOCTYPE html>
<html lang="en">

<?php 
    include 'html/head.php';
    // include 'connections/ma_receiving_conn.php'; 
    // include 'connections/stock_card_conn.php';
?>

<body>
    
            <?php 
                include 'html/materialsInfo.php';
                include 'html/head.php';
            ?>
                <div class="result-container ">
                <label class="text-white">Received QTY</label>
                <input  type="number" min="1" required step="1" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" name = "returnedqty" id="returnedqty">
                </div>
 
                <div class="result-container ">
                <label class="text-white">Remarks</label>
                <form style="width: 50%" action="" method="POST">
                    <select class="text-white bg-primary" style="width: 100%" name="SelectRemark" id="SelectRemark">
                    <option value="NON-MOVING" class="dropdown-item text-white" selected >NON-MOVING</option>
                    <option value="RETURN-TO-SUPPLIER" class="dropdown-item bg-primary text-white">RETURN TO SUPPLIER</option>
                    <option value="EDIT" class="dropdown-item bg-primary text-white">EDIT</option>
                    </select>
                </form>
                </div>
                
                <div class="result-container d-flex justify-content-center"> 
                <h6 id="messageDisplay" class="text-warning"></h6>
                </div>

                <!-- <div class="result-container d-flex justify-content-center" id="btnDiv1">
                <button type="submit" class="btn btn-primary btn-block control" id="saveBTN">Save Data</button>
                </div> -->

                <div class="result-container d-flex justify-content-center" id="modalbtn" style="width: 70%; margin: auto">
                <input type="button" name="submit" value="SAVE DATA" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary btn-block control" />
                </div>

                <div class="result-container d-flex justify-content-center" id="btnDiv2">
                <button type="submit" class="btn btn-primary btn-block control" id="btn_showReport">Show Transactions</button>
                </div>

                <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header h5">
                            Confirm Details
                        </div>
                        <div class="modal-body">
                            Are you sure you want to save the following details?

                            <!-- We display the details entered by the user here -->
                            <table class=" table-bordered">
                                <tr>
                                    <th class="check-info-label-modal align-middle">Received Quantity :</th>
                                    <td id="typed-info align-middle" class="text-dark"><input type="text" readonly class="txtbox text-primary" name="returnedqty2" id="returnedqty2" value=""></td>
                                    
                                </tr>
                                <tr>
                                    <th class="check-info-label-modal align-middle">Remarks :</th>
                                    <td id="typed-info align-middle"><input type="text" readonly class="txtbox text-primary" name="remarks" id="remarks" value=""></td>
                                </tr>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button id="saveBTN" class="btn btn-success success" data-dismiss="modal" disabled>Save</button>
                        </div>
                    </div>
                </div>
                </div>
            
            </div>
            
           <?php
?>
</form>
<script src="js/ajax_mat_in.js"></script>
<script src="js/materialIn.js"></script>
</body>
</html>


               