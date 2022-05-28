@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Historical Trade</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body"  style="text-align:center;">
                <h6>Search by date</h6>
                <form action="history_trade_date" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>From date <span class="text-danger">*</span></label>
                                <input type="date" name="fd" class="form-control pri-form" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>To date <span class="text-danger">*</span></label>
                                <input type="date" name="td" class="form-control pri-form">
                            </div>
                        </div>
                        <div class="text-center col-md-2" style="margin-top: 2%;">
                            <input type="submit" name="" class="btn" value="Search">
                        </div>
                    </div>
                </form>
                @if(session()->has('trade'))
                    @php $trade = session()->get('trade');
                    session()->forget('trade');
                    @endphp
                @endif
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Trade Id</th>
                                <th>AMC</th>
                                <th>Trade Type</th>
                                <th>Commodity</th>
                                <th>Date</th>
                                <th>Purchased Quantity</th>
                                <th>Units</th>
                                <th>Balanced Quantity</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($trade))
                            @foreach($trade as $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->amc1}}</td>
                                <td>{{$t->trade_type}}</td>
                                <td>{{$t->com_name}}</td>
                                <td>{{explode(' ',$t->created_at)[0]}}</td>
                                <td>{{$t->weight}}</td>
                                <td>{{$t->qty_name}}</td>
                                <td>{{$t->a_weight}}</td>
                                <td>{{$t->trade_value}}</td>
                                <td>@if($t->p_status % 2 == 0)<input type="button" name="" data-id="{{$t->id}}" class="btn pay" value="Pay Fee" onclick="helpModal('#pay-mode-modal')">
                                        @else <input type="button" class="btn" value="Paid">     @endif
                                        <!-- <input type="button" name="" class="btn" value="Create Permit">
                                        <input type="button" name="" class="btn" value="Edit Permit"></td> -->
                            </tr>
                            @endforeach 
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- <div class="text-center">
                    <input type="button" name="" class="btn" value="Pay Fee">
                    <input type="button" name="" class="btn" value="Create Permit">
                    <input type="button" name="" class="btn" value="Edit Permit">
                </div> -->
            </div>
        </div>
    </div>
</div>
<div id="pay-mode-modal" class="help-modal" style="display: none;">
    <div class="help-modal-content pop-md">
        <i class="priya-close" onclick="helpModalHide(this)"></i>
        <header>Select Payment Gateway</header>
        <section>
            <div class="row">
                <div class="col-md-6">
                    <h3>SBI Charges</h3>
                    <ul>
                        <li>    Net Banking:
                            <ul>
                                <li>SBI Bank Charges: 11.8</li>
                                <li>Other Banks - Bank Charges: 17.7</li>
                            </ul>
                        </li>
                        <li>    Card Payments:
                            <ul>
                                <li>State Bank Debit Cards - Bank Charges: Nill</li>
                                <li>Other Bank Debit Cards - Bank Charges: Nill</li>
                                <li>Credit Cards - Bank Charges: 12.99</li>
                            </ul>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-info payfee" onclick="sub()">SBI</button>
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
                    <button type="button" class="btn btn-info payfee" onclick="sub()">PAYU</button>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $('.pay').click(function(){
        // alert('kk');
        $('.payfee').attr('onclick','sub('+$(this).attr('data-id')+')');
    });
    function sub(id){
        $.ajax({
            type:'GET',
            url:'{{url("pay")}}/'+id,
            success:function(result){
                console.log(result);
                alert("Paid successfull for trade No."+id);
                location.reload();
            }
        });
    }
</script>
@include("includes/footer");
</body>

</html>