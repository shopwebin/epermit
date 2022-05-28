@include("includes.header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Edit Trade for Multicommodities</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Permit Id</th>
                                <th>Permit Type</th>
                                <th>Commodity</th>
                                <th>Trade Value</th>
                                <th>Market Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" title="Edit Trade"><i class="priya-edit"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    <input type="button" name="" class="btn" value="Print Permit">
                    <input type="button" name="" class="btn" value="Download">
                </div>

                <h6>Multi Commodity Selection</h6>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-check1">
                                <label class="pri-radio">
                                    <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_1" class="commodity_wether_cls" value="amc-div"><i></i>
                                    Address (All the Districts) <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Trade ID <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Date <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Commodity <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Trade Quantity <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Available Quantity <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Trade Value <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form">
                            </div>
                        </div>
                    </div>
                </div>
                <h6>Consignee Details</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Consignee Name <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Address Line 2</label>
                                <input type="" name="" class="form-control pri-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control pri-form">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control pri-form">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Mandal <span class="text-danger">*</span></label>
                                <select class="form-control pri-form">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Village <span class="text-danger">*</span></label>
                                <select class="form-control pri-form">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Trade Value <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check1">
                                <label>Market Fee <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="button" name="" class="btn" value="Submit">
                    <input type="button" name="" class="btn" value="Cancel">
                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Permit Id</th>
                                <th>Permit Type</th>
                                <th>Commodity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    <input type="button" name="" class="btn" value="Print Permit">
                    <input type="button" name="" class="btn" value="Download">
                </div>

            </div>
        </div>
    </div>
</div>
@include("includes/footer");
</body>

</html>