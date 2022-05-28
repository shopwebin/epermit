@include("includes/header")
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Trade Details</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <table class="table theme-tbl table-bordered">
                    <thead>
                        <tr>
                            <th>Trade Id</th>
                            <th>Trade Type</th>
                            <th>Market</th>
                            <th>Commodity</th>
                            <th>Quantity</th>
                            <th>Available Quantity</th>
                            <th>Value (INR)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>T202203150</td>
                            <td>Sale</td>
                            <td>Palamaner</td>
                            <td>Chironjee</td>
                            <td>100.00</td>
                            <td>0.00</td>
                            <td>300,000</td>
                            <td>
                                <button type="button" class="btn btn-info" onclick="helpModal('#pay-mode-modal')">Pay Fee</button>
                                <a href="permit-creation" class="btn btn-info">Create Permit</a>
                                <a href="edit-trade" class="btn btn-info">Edit Trade</a>
                            </td>
                        </tr>
                        <?php // var_dump($data);?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-info" onclick="helpModal('#pay-mode-modal')">Pay Fee</button>
                                <a href="permit-creation" class="btn btn-info">Create Permit</a>
                                <a href="edit-trade" class="btn btn-info">Edit Trade</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="new-trader-creation" title="Add Other Users" class="float-btn"> + </a>
</div>
@include("includes/footer")
<div id="pay-mode-modal" class="help-modal" style="display: none;">
    <div class="help-modal-content pop-md">
        <i class="priya-close" onclick="helpModalHide(this)"></i>
        <header>Select Payment Gateway</header>
        <section>
            <div class="row">
                <div class="col-md-6">
                    <h3>SBI Charges</h3>
                    <ul>
                        <li>
                            Net Banking:
                            <ul>
                                <li>SBI Bank Charges: 11.8</li>
                                <li>Other Banks - Bank Charges: 17.7</li>
                            </ul>
                        </li>
                        <li>
                            Card Payments:
                            <ul>
                                <li>State Bank Debit Cards - Bank Charges: Nill</li>
                                <li>Other Bank Debit Cards - Bank Charges: Nill</li>
                                <li>Credit Cards - Bank Charges: 12.99</li>
                            </ul>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-info">SBI</button>
                </div>
                <div class="col-md-6">
                    <h3>PAYU Charges</h3>
                    <ul>
                        <li>Credit Cards(VISA/MasterCard): 1% per transaction</li>
                        <li>Debit Cards(VISA/MasterCard/RuPay/Maestro): 0% below INR 2000 and 0.9% above INR 2000</li>
                        <li>Net Banking: INR 11 per transaction.</li>
                        <li>UPI: INR 12 per transaction</li>
                        <li>Taxes as applicable</li>
                    </ul>
                    <button type="button" class="btn btn-info">PAYU</button>
                </div>
            </div>
        </section>
    </div>
</div>
</body>

</html>