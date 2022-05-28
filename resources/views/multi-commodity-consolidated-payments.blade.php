@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Histrorical Trade for Group trades</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <div class="form-check1">
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_1" class="commodity_wether_cls" value="amc-div"><i></i>
                        AMC
                    </label>
                    <label class="pri-radio ml-4">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_2" class="commodity_wether_cls" value="commodity-div"><i></i>
                        Trade
                    </label>
                </div>

                <div class="amc-div box" style="display: none;">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>AMC Name</th>
                                    <th>Trade Value</th>
                                    <th>Market Fee</th>
                                    <th>Consolidated Trade Pay Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $wq = $dat;
                                $dat1 = $dat;
                                $dtf2 = [];
                                foreach($dat1 as $d1){
                                    $f = 1;
                                    $d1->nm_fee = 0;
                                    if($d1->p_status %2 ==0){
                                        $d1->nm_fee = $d1->m_fee;
                                    }
                                    foreach($dtf2 as $i=>$dt){                                        
                                        if($dt->amc_name == $d1->amc_name){
                                            $dt->trade_value += $d1->trade_value;
                                            $dt->m_fee += $d1->m_fee;
                                            $dt->nm_fee += $d1->nm_fee;
                                            $dt->id = $d1->id.",T".$dt->id;
                                            $dtf2[$i] = $dt;
                                            $f = 0;
                                        }
                                    }
                                    if($f){
                                        $dtf2[] = $d1;
                                    }
                                }
                                $dat = $wq;
                                @endphp
                                @foreach($dtf2 as $dt2)
                                <tr>
                                    <td>{{$dt2->amc_name}}</td>
                                    <td>{{$dt2->trade_value}}</td>
                                    <td>{{$dt2->m_fee}}</td>
                                    <td>{{$dt2->nm_fee}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <input type="button" name="" class="btn" value="Pay Fee" onclick="helpModal('#pay-mode-modal')">
                    </div>
                </div>
                <div class="commodity-div box" style="display: none;">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Trade Id</th>
                                    <th>Trade Type</th>
                                    <th>Market</th>
                                    <th>Commodity</th>
                                    <th>Date</th>
                                    <th>Quantity</th>
                                    <th>Trade Value</th>
                                    <th>Market Fee</th>
                                    <th>Consolidated Trades Pay Due</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dat as $f)
                                @php $a = explode('T',$f->id);@endphp
                                <tr>
                                    <td>T{{end($a)}}</td>
                                    <td>{{$f->trade_type}}</td>
                                    <td>{{$f->amc_name}}</td>
                                    <td>{{$f->com_name}}</td>
                                    <td>{{$f->created_at}}</td>
                                    <td>{{$f->weight}} {{$f->qty_name}}</td>
                                    <td>{{$f->trade_value}}</td>
                                    <td>{{$f->m_fee}}</td>
                                    <td>{{$f->nm_fee}}</td>
                                    <!-- <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="priya-edit"></i></a> -->
                                        <!-- <a href="#" class="btn btn-danger btn-sm"><i class="priya-trash"></i></a>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h6>Consolidated Trades Fee</h6>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>AMC Name</th>
                                    <th>Market Fee</th>
                                    <th>Trade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dtf2 as $dt2)
                                <tr>
                                    <td>{{$dt2->amc_name}}</td>
                                    <td>{{$dt2->m_fee}}</td>
                                    <td>T{{$dt2->id}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <input type="button" name="" class="btn" onclick="helpModal('#pay-mode-modal')" value="Pay Fee">
                        <!-- <input type="button" name="" class="btn" value="Payment Gateways"> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><div id="pay-mode-modal" class="help-modal" style="display: none;">
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
                    <button type="button" class="btn btn-info payfee" onclick="sub('all')">SBI</button>
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
                    <button type="button" class="btn btn-info payfee" onclick="sub('all')">PAYU</button>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function sub(id){
        $.ajax({
            type:'GET',
            url:'{{url("pay")}}/'+id,
            success:function(result){
                alert("Paid successfull"+id);
                location.reload();
            }
        });
    }
</script>
@include("includes/footer");
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>
</body>
</html>