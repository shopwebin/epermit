@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Create Trade</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5> 
            @if(session()->has('alert'))
                <script>
                    alert( "{{session()->get('alert')}}");
                </script>
            @endif
            <form action="trade-list/add" class="form1" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Seller Name <span class="text-danger">*</span></label>
                                <input type="" name="seller_name" class="form-control pri-form">
                                <input type="hidden" name="p_status" class="p_status" value="0">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Trade type<span class="text-danger">*</span></label>
                                <div class="a">
                                    <label class="pri-radio d-inline-block mr-5"><input type="radio" name="trade_type" value="Sales"><i></i>Sale</label>
                                    <label class="pri-radio d-inline-block"><input type="radio" name="trade_type" value="Stock"><i></i>Stock</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>AMC<span class="text-danger">*</span></label>
                                <select name="amc" class="form-control pri-form" id="amc">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control pri-form state" name="state" class="">
                                    <option>Select</option>
                                    @foreach($state as $stt)
                                    <option value="{{$stt->state_id}}">{{$stt->state_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <script>
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                            $(document).ready(function() {
                                $(".state").change(function() {
                                    $.get("{{url('district')}}/" + $(this).val(), function(result) {
                                        var str;
                                        for (var i = 0; i < result.length; i++) {
                                            str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                        }
                                        $('.district').html(str);
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $(".district").change(function() {
                                    $.get("{{url('mandal')}}/" + $(this).val(), function(result) {
                                        var str;
                                        for (var i = 0; i < result.length; i++) {
                                            str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                        }
                                        $('.mandal').html(str);
                                    });
                                    $.get("{{url('amc')}}/" + $(this).val(), function(result) {
                                        var str;
                                        for (var i = 0; i < result.length; i++) {
                                            str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                        }
                                        $('#amc').html(str);
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $(".trade_value").change(function() {
                                    console.log({{$mfee[0]->percent}});
                                    $(".m_fee").val(($(".trade_value").val() * {{$mfee[0]->percent}})/100);
                                });
                            });
                            function com_val_1(){
                                var c = $(".commodity").val();
                                var q = $(".quantity").val();
                                var w = $('.weight').val();
                                console.log(c);
                                console.log(q);
                                console.log(w);
                                if(!empty(c) && !empty(q) && !empty(w)){
                                    $.ajax({
                                        type:'POST',
                                        url: "com_val",
                                        data: { com:c, qty:q },
                                        success:function(data){
                                            console.log(data[0].amt);
                                            $('.trade_value').val(w * data[0].amt);
                                            $('.m_fee').val(w * data[0].amt* {{$mfee[0]->percent}}/100);
                                        }
                                    });
                                }
                            }
                            $(document).ready(function() {
                                $(".weight").change(function() {
                                    var c = $(".commodity").val();
                                    var q = $(".quantity").val();
                                    var w = $('.weight').val();
                                    $.ajax({
                                        type:'POST',
                                        url: "com_val",
                                        data: { com:c, qty:q },
                                        success:function(data){
                                            console.log(data[0].amt);
                                            $('.trade_value').val(w * data[0].amt);
                                            $('.m_fee').val(w * data[0].amt* {{$mfee[0]->percent}}/100);
                                        }
                                    });
                                });
                            });
                        </script>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control pri-form district" name="district">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mandal <span class="text-danger">*</span></label>
                                <select class="form-control pri-form mandal" name="mandal">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <style>
                        .com > div {
                            padding: 5px;
                        }
                    </style>
                    <h5 class="mt-3">Trade Details</h5>
                    <div class="repeat-div">
                        <div class="row">
                            <div class="com" style="display: flex;padding: 0;width: 100%;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Commodity <span class="text-danger">*</span></label>
                                        <select class="form-control pri-form commodity" name="commodity[]" onchange="com_val_1()">
                                            <option>Select</option>
                                            @foreach($commodity as $cdy)
                                                <option value="{{ $cdy->com_id }}">{{ $cdy->com_name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Quantity Units <span class="text-danger">*</span></label>
                                        <select class="form-control pri-form quantity" name="quantity[]" onchange="com_val_1()">
                                            <option>Select</option>
                                            @foreach($quantity as $qty)
                                                <option value="{{$qty->id}}">{{$qty->qty_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Commodity Weight <span class="text-danger">*</span></label>
                                        <input type="" class="form-control pri-form weight" name="weight[]">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Trade Value (INR) <span class="text-danger">*</span></label>
                                        <input type="" class="form-control pri-form trade_value" name="trade_value[]">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Market Fees (INR) <span class="text-danger">*</span></label>
                                        <input type="" class="form-control pri-form m_fee" name="m_fee[]" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-new" onclick="addcom()"><i class="priya-plus"></i></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check1">
                            <label class="pri-check">
                                <input type="checkbox"><i></i>
                                I declare that the information furnished above is true to best of my knowledge
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn" href="javascript:helpModal('#pay-mode-modal')">Pay Market fee</a>
                        <input type="submit" class="btn btn-info" value="Pay Market Fee Later" />
                        <button type="button" class="btn btn-cancel" onclick="window.history.back()">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function addcom(){
        $('.repeat-div').find('.row').append($('.repeat-div').find('.com').html());
    };
</script>
@include("includes/footer");
<div id="pay-mode-modal" class="help-modal" style="display: none;">
    <div class="help-modal-content pop-md">
        <i class="priya-close" onclick="helpModalHide(this)"></i>
        <header>Select Payment Gateway</header>
        <section>
        <form action="pay" method="post">
            <div class="row">
                <div class="col-md-6">
                @csrf
                <input type="hidden" name="amount" value="1">
                <input type="hidden" name="order" value="13">
                    <h3>SBI Charges</h3>
                    <ul>
                        <li> Net Banking:
                            <ul>
                                <li>SBI Bank Charges: 11.8</li>
                                <li>Other Banks - Bank Charges: 17.7</li>
                            </ul>
                        </li>
                        <li> Card Payments:
                            <ul>
                                <li>State Bank Debit Cards - Bank Charges: Nill</li>
                                <li>Other Bank Debit Cards - Bank Charges: Nill</li>
                                <li>Credit Cards - Bank Charges: 12.99</li>
                            </ul>
                        </li>
                    </ul>
                    <!--button type="button" class="btn btn-info" onclick="sub()">SBI</button-->
                    <button type="submit" class="btn btn-info">SBI</button>
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
                    <button type="submit" class="btn btn-info">PAYU</button>
                    <!--button type="button" class="btn btn-info"  onclick="sub()">PAYU</button-->
                </div>
            </div>
        </section>
        </form>
    </div>
</div>
<script>
    function sub(){
        $.ajax({
            type: 'POST',
            url: "{{url('pay')}}",
            data: {
                order_no: "123"
            },
            success: function(data) {
                console.log(data);
            }
        });
        $('.p_status').val(1);
        // $('.form1').submit();
    }
</script>
</body>

</html>