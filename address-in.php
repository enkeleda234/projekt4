<?php

?>
<div class="modal-header bg-primary">
<h3 class="modal-title " id="exampleModalLabel">Add New Address</h3>
</div>
<form id="payment-form" class="form" action="/address-func.php" method="post">
    <div class="modal-body">
            <div class="card p-3">
                <h6 class="text-uppercase">Address details</h6>
                <div class="mt-4 mb-4">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2">
                                <input type="text" name="address" class="form-control" required="required"> <span>Street Address</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2">
                                <input type="text" name="city" class="form-control" required="required"> <span>City</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2">
                                <input type="text" name="state" class="form-control" required="required"> <span>State/Province</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2">
                                <input type="text" name="zipcode" class="form-control" required="required"> <span>Zip code</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-4 d-flex justify-content-between">
                <button class="btn btn-success " type="submit"> Confirm  </button>
            </div>
            </form>
        </div>
    </div>


