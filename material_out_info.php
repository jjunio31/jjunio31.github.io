<!DOCTYPE html>
<html lang="en">

<?php 
    include 'html/head.php';
    // include 'connections/ma_receiving_conn.php'; 
    // include 'connections/stock_card_conn.php';
  ?>

<body>

           
           <div class="scan-result bg-dark">
 
           <?php 
                include 'html/materialsInfo.php';
            ?>

                <div class="result-container ">
                <label class="">Issued QTY</label>
                <input  type="number" min="1" required step="1" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" id="issuedQty">
                </div>

                <!--hidden input for total returned QTY-->
                <input type="text" readonly class="txtbox bg-secondary text-warning" name="totalReturnedValue" id="totalReturnedValue" value="<?php echo $total_qty_ret?>">
                <!--hidden input for total returned QTY-->

                <div class="result-container ">
                <label class="">Order No.</label>
                <input type="text"  autocomplete="off"  class="txtbox" name="orderNum" id="orderNum" value="">
                </div>

                <div class="result-container ">
                <label class="">Remarks</label>
                <form style="width: 50%" action="" method="POST">
                    <select style="width: 100%" class="text-white bg-primary" name="SelectRemark" id="SelectRemark">
                    <option value="ISSUED-TO-PRODUCTION" class="dropdown-item bg-primary text-white" selected>ISSUED TO PRODUCTION</option>
                    <option value="SHIP-TO-CUSTOMER" class="dropdown-item text-white" >SHIP TO CUSTOMER</option>
                    <option value="ENGINEERING-EVALUATION" class="dropdown-item text-white" >ENGINEERING EVALUATION</option>
                    <option value="RETURN-TO-SUPPLIER" class="dropdown-item text-white" >RETURN TO SUPPLIER</option>
                    <option value="DISPOSE" class="dropdown-item text-white" >DISPOSE</option>
                    <option value="EDIT" class="dropdown-item bg-primary text-white">EDIT</option>
                    </select>
                </form>
                </div>

   
                <div class="result-container d-flex justify-content-center"> 
                <h6 id="messageDisplay" class="text-warning text-center"></h6>
                </div>

                <div class="result-container d-flex justify-content-center" id="modalbtn" style="width: 70%; margin: auto">
                <input type="button" name="submit" value="SAVE DATA" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary btn-block control" />
                </div>

                <div class="result-container d-flex justify-content-center" id="btnDiv2">
                <button type="submit" class="btn btn-primary btn-block control" id="btn_showReport">Show Transactions</button>
                </div>


                <!-- MODAL CONFIRM SAVE-->
                <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header h5">
                            Confirm Details
                        </div>
                        <div class="modal-body">
                            Are you sure you want to save the following details?

                            <!-- We display the details entered by the user here -->
                            <table class="table-bordered">
                                <tr>
                                    <th class="check-info-label-modal">Issued Quantity :</th>
                                    <td id="typed-info" class="text-dark"><input type="text" readonly class="txtbox text-primary" name="issuedQty2" id="issuedQty2" value=""></td>
                                </tr>
                                <tr>
                                    <th class="check-info-label-modal">Order Number :</th>
                                    <td id="typed-info"><input type="text" readonly class="txtbox text-primary" name="orderNum2" id="orderNum2" value=""></td>
                                </tr>
                                <tr>
                                    <th class="check-info-label-modal">Remarks :</th>
                                    <td id="typed-info"><input type="text" readonly class="txtbox text-primary" name="remarks" id="remarks" value=""></td>
                                </tr>
                                
                            </table>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button href="#" id="submitIssued" class="btn btn-primary success" disabled data-dismiss="modal">Save</button>
                        </div>
                    </div>
                </div>
                </div>
                <!-- END MODAL CONFIRM SAVE-->


                
                <!--  MODAL CHECK INVOICE BREAKDOWN TABLE-->

                        <div class="container bg-dark">
                         
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h6 class="modal-title">Quantity Breakdown</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark" id="breakdownDiv">
                                
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                            </div>

                            </div>
                        </div>
                        </div>
                        </div>

                <!--  END MODAL CHECK INVOICE BREAKDOWN TABLE-->
            
            </div>
            

?>
</form>

<script src="js/ajax_mat_out.js"></script>
<script>
      //AJAX FOR MODAL BREAKDOWN
  $(document).ready(function () {
    $("#breakdown-btn").click(function (e) { 
        e.preventDefault();

        var qrResult = $('input[id=goodsCode]').val();
        $.ajax({
            type: "post",
            url: "modal_breakdown.php",
            data: {qrResult:qrResult},
            dataType: "text",
            success: function (response) {
                
                $('#breakdownDiv').html(response);
            }
        });
    });
  });
      

</script>
</body>
</html>


              