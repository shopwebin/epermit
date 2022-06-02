@include("includes/header")
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Trade Details</span>
                <!--div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div-->
            </h5>
            @if(session()->has('alert'))
                <script>
                    alert("{{session()->get('alert')}}");
                    {{session()->forget('alert')}}
                </script>
            @endif
            <div class="card-body" style="overflow: auto;height: 75vh;">
                <table class="table theme-tbl table-bordered">
                    <thead>
                        <tr>
                            <th>Trade Id</th>
                            <th>Trade Type</th>
                            <th>AMC</th>
                            <th>Trade Date</th>
                            <th>Commodity</th>
                            <th>Purchase Quantity</th>
                            <th>Balance Quantity</th>
                            <th>Value (INR)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dat as $td)
                        <tr>
                            <td data-id="{{ $td->id }}" data-p_status="{{ $td->id }}">T{{ $td->id }}</td>
                            <td>{{ $td->trade_type }}</td>
                            <td>{{ $td->amc }}</td>
                            <td>{{explode(' ',$td->created_at)[0]}}</td>
                            <td>{{ $td->cty }}</td>
                            <td>{{ $td->weight }} {{$td->qty}}</td>
                            <td>{{ $td->a_weight }} {{$td->qty}}</td>
                            <td>Rs {{ $td->trade_value }}</td>
                            <td>
                                @if($td->p_status % 2 == 0)
                                    <button data-id="{{ $td->id }}" type="button" class="btn btn-info pay" onclick="helpModal('#pay-mode-modal')">Pay Fee</button>
                                @else
                                    <button class="btn btn-info">Paid</button>
                                @endif
                                {{--@if(($td->a_weight > 0 ) && ($td->trade_type != 'Stock'))--}}
                                @if(($td->trade_type != 'Stock'))
                                @if(($td->a_weight >0))
                                    @if(isset($td->permit_id))
                                        <a href="secondary-permit-creation/T{{ $td->id }}" class="btn btn-info">Create Secondary Permit</a>
                                        {{-- @if(!isset($td->permit_id))
                                        <a href="permit-creation/T{{ $td->id }}" class="btn btn-info">Create Permit</a>
                                        @endif --}}
                                    @else
                                        <a href="permit-creation/T{{ $td->id }}" class="btn btn-info">Create Permit</a>
                                    @endif
                                    @endif
                                    @if($td->p_status > 2) 
                                        @foreach($td->sec as $sec)                                      
                                            <a href="secondary-permit-creation/S{{$sec->id}}" class="btn btn-info">Edit Permit-S{{$sec->id}}</a>
                                        @endforeach
                                    @endif
                                    @if(isset($td->permit_id))
                                    @if(strtotime($dt[0]." ".$dt[1]) > time())
                                    <a href="permit-creation/P{{ $td->permit_id }}" class="btn btn-info">View Permit-P{{ $td->permit_id }}</a>
                                    @else
                                    <a href="permit-creation/P{{ $td->permit_id }}" class="btn btn-info">Edit Permit-P{{ $td->permit_id }}</a>
                                    @endif
                                    @endif
                                @endif
                                <a href="edit-trade/T{{ $td->id }}" class="btn btn-info">Edit Trade</a>
                            </td>
                        </tr>
                        @endforeach
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
        $('.payfee').attr('onclick','sub('+$(this).attr('data-id')+')');
    });
    function sub(id){
        $.ajax({
            type:'GET',
            url:'{{url("pay")}}/'+id,
            success:function(result){
                alert("Paid successfull for trade No."+id);
                location.reload();
            }
        });
    }
</script>
</body>
</html>