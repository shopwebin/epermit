@include("includes/header");
                            {{--@dd($view[0]->tc[0]->amt);--}}
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Edit Trade</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <div class="pri-tabber">
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" checked class="commodity_wether_cls" value="convert-trade-div"><i></i>
                        Convert Trade
                    </label>
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_2" class="commodity_wether_cls" value="processing-div"><i></i>
                        Processing
                    </label>
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_3" class="commodity_wether_cls" value="aqua-export-div"><i></i>
                        Aqua Export
                    </label>
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_4" class="commodity_wether_cls" value="transfer-quantity-div"><i></i>
                        Transfer Quantity
                    </label>
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_5" class="commodity_wether_cls" value="retail-sale-div"><i></i>
                        Retail sale
                    </label>
                </div>
                
                @if(session()->has('dat'))
                @php    $dat = session()->get('dat');
                    session()->forget('dat');
                @endphp
                @endif
                <form action="convert" method="post">
                    @csrf
                    <div class="row convert-trade-div box" @if(!empty($dat) && isset($dat)) style="display: none;" @endif>
                        <div class="col-md-12">
                            <!-- <h6>Convert Trade</h6> -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Trade ID <span class="text-danger">*</span></label>
                                <select name="id" class="form-control pri-form">
                                    @if(count($view)>1)
                                    <option value="">- Select -</option>
                                    @endif
                                    @foreach($view as $v)
                                    <option value="{{ $v->id }}">T{{ $v->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Purchase Quantity <span class="text-danger">*</span></label>
                                <input type="" name="" class="form-control pri-form" value="{{ $view[0]->weight }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Balance Quantity <span class="text-danger">*</span></label>
                                <input type="" name="a_weight" class="form-control pri-form" value="{{ $view[0]->a_weight }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Do you want to convert ? <span class="text-danger">*</span></label>
                                <div class="a">
                                    <label class="pri-radio d-inline-block mr-4"><input type="radio" name="trade_type" value="Sales" @if($view[0]->trade_type == "Sales") {{"checked"}}@endif value="Sale"><i></i>Sales</label>
                                    <label class="pri-radio d-inline-block"><input type="radio" name="trade_type" value="Stock" @if($view[0]->trade_type == "Stock") {{"checked"}}@endif><i></i>Stock</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="button" name="" class="btn btn-cancel" value="Cancel">
                            <input type="submit" name="" class="btn" value="Submit">
                        </div>
                    </div>
                </form>
                <form action="{{url('update_trade')}}" method="post">
                @csrf
                <div class="row processing-div box" @if(empty($dat)) style="display: none;" @endif>
                    <div class="col-12 no-gap">
                        <div class="row bordered bg-color1-1">
                            <div class="col-md-8">
                                <dl>
                                    <dt>Address</dt><input type="hidden" name="id" value="@if(isset($dat->id)){{ $dat->id }}@endif">
                                    <dd>@if(isset($view[0]->ad1)){{$view[0]->ad1}}
                                    <input type="hidden" name="ad1" placeholder="Enter Address" value="{{$view[0]->ad1}}">    
                                    @else<input type="text" name="ad1" placeholder="Enter Address" value="{{$view[0]->ad1}}">@endif
                                        ,@if(isset($view[0]->ad2)){{$view[0]->ad2}}
                                        <input type="text" name="ad2" placeholder="Enter Address" value="{{$view[0]->ad2}}">
                                        @else<input type="text" name="ad2" placeholder="Enter Address" value="{{$view[0]->ad2}}">@endif</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Total Quantity</dt>
                                    <dd>{{ $view[0]->a_weight }}</dd>
                                    <!-- <dd>@if(isset($qty_amt[0]->a_qty)){{$qty_amt[0]->a_qty}}@endif</dd> -->
                                </dl>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.a_weight1').change(function(){
                                var aw = $('.a_weight1').val();
                                var w = $('.weight1').val();
                                if(aw > w){
                                    alert("Kindly check the quantity");
                                }
                            });
                        });        
                        $(document).ready(function() {
                            $(".com_id").change(function() {
                                var w = $('.a_weight').val();
                                $.get("{{url('com_value')}}/"+w,function(result){
                                    // console.log(result);
                                    $('.trade_value').val(w * result.amt);
                                    $('.mfee').val((w * result.amt*{{$mfee[0]->percent}})/100);
                                });
                            });
                        });
                        $(document).ready(function() {
                            $(".trade_value").change(function() {
                                var w = $('.trade_value').val();
                                $('.mfee').val(w*{{$mfee[0]->percent}}/50);
                            });
                        });         
                            $(document).ready(function() {      
                        $(".fd").change(function() {
                            var w = $(".fd").val();
                            var h = $(".td").val();
                            // alert(w);
                            var strDate = (new Date()).toISOString().split('T')[0];
                            // alert(strDate);
                            if(w < strDate){
                                alert("old date permit can't be Created");
                                $(".fd").val('');
                            }
                            if((!empty(h))&&(w>=h)){
                                alert("Atleast 1 day  permit can be Created");
                            }
                        });
                        });
                        $(document).ready(function() {      
                        $(".td").change(function() {
                            var w = $(".fd").val();
                            var h = $(".td").val();
                            // alert(w);
                            var strDate = (new Date()).toISOString().split('T')[0];
                            // alert(strDate);
                            if((w < strDate)||(w>=h)){
                                alert("Atleast 1 day  permit can be Created");
                                $(".td").val('');
                            }
                        });
                        });
                    </script>
                    <div class="ordered-list col-12">
                        <div class="list">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label>Previous Commodity <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $view[0]->tc[0]->com_name }}"  class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label> Proccessed Commodity <span class="text-danger">*</span></label>
                                        <select name="com_id" class="com_id form-control pri-form">
                                                <option value="">-- Select --</option>
                                            @foreach($commodity as $com)
                                                <option value="{{ $com->com_id }}">{{ $com->com_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <label>Quantity Type <span class="text-danger">*</span></label>
                                        {{--<input type="" value="{{ $view[0]->tc[0]->qty_name }}" name="q_id" class="form-control pri-form" readonly>--}}
                                        <select name="q_id" class="q_id form-control pri-form">
                                            <option value="{{ $view[0]->tc[0]->q_id }}">{{ $view[0]->tc[0]->qty_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        <label>Balance Quantity <span class="text-danger">*</span></label>
                                        <input type="" value="0" name="q_id" class="form-control pri-form" readonly>
                                    </div>
                                </div> -->
                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        <label>Quantity Before Processing<span class="text-danger">*</span></label>
                                        <input type="" value="{{ $view[0]->a_weight }}" name="b_qty" class="weight1 form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        <label>Quantity After Processing<span class="text-danger">*</span></label>
                                        <input type="" value="" name="a_weight" class="a_weight1 form-control pri-form" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Trade Id <span class="text-danger">*</span></label>
                            <input type="" name="trade_id" value="@if(isset($dat))T{{ $dat->id }} @else T{{$view[0]->id}} @endif" class="form-control pri-form" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Trade Value <span class="text-danger">*</span></label>
                            <input type="" value="" name="trade_val" class="trade_value form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Market Fee (INR) <span class="text-danger">*</span></label>
                            <input type="" name="mfee" value="" class="mfee form-control pri-form" readonly required>
                        </div>
                    </div>
                    <!-- div class="col-md-4">
                            <div class="form-group">
                                <label> Source Address <span class="text-danger">*</span></label>
                                <input type="text" name="ad1" class="form-control pri-form" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Destination Address <span class="text-danger">*</span></label>
                                <input type="text" name="ad2" class="form-control pri-form"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                <input type="" name="veh_no" class="form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control pri-form mob_no" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Permit Validity (from date) <span class="text-danger">*</span></label>
                                        <input type="date" name="fd" class="fd form-control pri-form" @isset($df[0]) value="{{$df[0]}}" @endisset>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Time</label>
                                        <input type="time" name="ft" class="ft form-control pri-form" @isset($df[1]) value="{{$df[1]}}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Permit Validity (to date) <span class="text-danger">*</span></label>
                                        <input type="date" name="td" class="td form-control pri-form" @isset($dt[0]) value="{{$dt[0]}}" @endisset>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Time</label>
                                        <input type="time" name="tt" class="tt form-control pri-form" @isset($dt[1]) value="{{$dt[1]}}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div -->
                    <div class="col-md-12 text-center">
                        <input type="button" name="" class="btn btn-cancel" value="Cancel">
                        <input type="submit" name="" class="btn" value="Submit">
                    </div>
                </div>
                </form>
                <form action="aqua_export" method="post">
                    @csrf
                    <div class="row aqua-export-div box" style="display: none;">
                        <!-- <div class="col-md-12">
                                <h6>Aqua Export</h6>
                            </div> -->
                        <div class="col-12 no-gap">
                            <div class="row bordered bg-color1-1">
                                <div class="col-md-8">
                                    <dl>
                                        <dt>Address</dt>
                                        <input type="hidden" name="id" value="{{ $view[0]->id }}">
                                        <dd>@if(isset($view[0]->ad1)){{$view[0]->ad1}}@else<input type="text" name="ad1" placeholder="Enter Address" value="{{$view[0]->ad1}}">@endif
                                            ,@if(isset($view[0]->ad2)){{$view[0]->ad2}}@else<input type="text" name="ad2" placeholder="Enter Address" value="{{$view[0]->ad2}}">@endif</dd>
                                    </dl>
                                </div>
                                <div class="col-md-4">
                                    <dl>
                                        <dt>Quantity</dt>
                                        <dd class="aqty">{{ $view[0]->a_weight }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-3">Trade Details</h5>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Trade Id <span class="text-danger">*</span></label>
                                <input type="" name="id" value="{{ $view[0]->id }}" class="form-control pri-form" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Commodity <span class="text-danger">*</span></label>
                                @foreach($commodity as $com) @if($com->com_id == $view[0]->commodity_id)
                                    <input type="" name="c_id" value="{{ $view[0]->tc[0]->com_name }}" class="form-control pri-form" readonly>
                                @endif @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Purchased Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="qty" value="{{ $view[0]->weight }}" class="qty form-control pri-form" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Balance Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="a_qty" value="{{ $view[0]->a_weight }}" class="a_qty form-control pri-form" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Quantity to Export <span class="text-danger">*</span></label>
                                <input type="number" name="qte" class="qte form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sale Value <span class="text-danger">*</span></label>
                                <input type="" name="sale_value" class="sale_value form-control pri-form">
                            </div>
                        </div>
                        <script>
                            $('.qte').change(function() {
                                var h = parseInt($('.aqty').html());
                                var f = $('.qte').val();
                                $('.a_qty').val(h - f);
                                // alert(h);
                                if ((f - h) > 0) {
                                    alert("Kindly enter number below Avaliable Quantity.");
                                    $('.qte').val(h);
                                    $('.a_qty').val(0);
                                }
                            });
                            $('.sale_value').change(function() {
                                $('.m_fee').val($('.sale_value').val() / 50);
                            });
                        </script>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Market Fee</label>
                                <input type="" name="m_fee" class="m_fee form-control pri-form" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Invoice Number</label>
                                <input type="" name="invoice" class="form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-3">Consignee Details</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="" name="name" class="form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="" name="add1" class="form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="" name="add2" class="form-control pri-form">
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
                                        var str='';
                                        for (var i = 0; i < result.length; i++) {
                                            str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                        }
                                        console.log(str);
                                        $('#amc').html(str);
                                        $('#amc2').html(str);
                                    });
                                });
                            });
                        </script>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select name="state" class="form-control pri-form state">
                                    <option>Select</option>
                                    @foreach($state as $stt)
                                    <option value="{{$stt->state_id}}">{{$stt->state_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <select name="district" class="form-control pri-form district">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Village Name <span class="text-danger">*</span></label>
                                <select class="form-control pri-form" id="amc" name="amc_id">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                <input type="" name="veh_no" class="form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control pri-form mob_no" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check1">
                                <label class="pri-check">
                                    <input type="checkbox" /><i></i>
                                    I declare that the above information is true to best of my knowledge
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="button" name="" class="btn btn-cancel" value="Cancel">
                            <button type="submit" name="" class="btn">Pay for Export</button>
                        </div>
                    </div>
                </form>
                <div class="row transfer-quantity-div box" style="display: none;">
                    <div class="col-12 no-gap">
                    <form action="{{url('trader_transfer')}}" method="post">
                        @csrf
                        <div class="row bordered bg-color1-1">
                            <div class="col-md-8">
                                <dl>
                                    <dt>Address</dt>
                                    <input type="hidden" name="id" value="{{ $view[0]->id }}">
                                    <dd>@if(isset($view[0]->ad1)){{$view[0]->ad1}}@else<input type="text" name="ad1" placeholder="Enter Address" value="{{$view[0]->ad1}}">@endif
                                        ,@if(isset($view[0]->ad2)){{$view[0]->ad2}}@else<input type="text" name="ad2" placeholder="Enter Address" value="{{$view[0]->ad2}}">@endif</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Quantity</dt>
                                    <dd>@if(isset($qty_amt[0]->a_qty)){{$qty_amt[0]->a_qty}}@endif</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5 class="mt-3">Trade Details</h5>
                    </div>                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Trade Id <span class="text-danger">*</span></label>
                            <input type="" value="T{{ $view[0]->id }}" name="t_id" class="form-control pri-form" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commodity <span class="text-danger">*</span></label>
                            @foreach($commodity as $com)@if($com->com_id == $view[0]->commodity_id)<input type="" name="c_id" value="{{ $view[0]->tc[0]->com_name }}" class="form-control pri-form" readonly>@endif @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Balance Quantity <span class="text-danger">*</span></label>
                            <input type="" name="a_weight" class="form-control pri-form" value="{{ $view[0]->a_weight }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-8 offset-sm-2">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Search Trader</strong></label>
                                    <input type="text" list="trader" name="trader" class="trader form-control pri-form" oninput="find_trader()" placeholder="Enter License No. / Mobile No." />
                                    <datalist id="trader">
                                        <optgroup label="mobile" id="mobile">
                                        </optgroup>
                                        <optgroup label="license" id="license">
                                        </optgroup>
                                    </datalist>
                                </div>
                            </div>
                            <script>
                                function find_trader() {
                                    var id = $('.trader').val();
                                    $.get("{{url('trader')}}/" + id, function(result) {
                                        var s = '';
                                        var k = '';
                                        for (var i = 0; i < result.length; i++) {
                                            item = result[i];
                                            s = s + '<option value="' + item.alternate_number + '">';
                                            s = s + '<option value="' + item.mobile + '">';
                                            k = k + '<option value="' + item.lic_no + '">';
                                        }
                                        $('#mobile').html(s);
                                        $('#license').html(k);
                                    });
                                };
                                function srch() {
                                    var id = $('.trader').val();
                                    $.get("{{url('trader')}}/" + id, function(result) {
                                        // console.log(result[0]);
                                        $('#tname').html(result[0].tname);
                                        $('#tmob').html(result[0].mobile);
                                        $('#tlic').html(result[0].lic_no);
                                        $('.trader_id').val(result[0].id);
                                    });
                                };
                                $(document).ready(function() {
                                    $(".qtt").change(function() {
                                        var w = $('.qtt').val();
                                        if(w > {{ $view[0]->a_weight }}){
                                            alert("Kindly enter value below or equal Balance quantity");
                                            $('.qtt').val("{{ $view[0]->a_weight }}");
                                            $('.trade_value').val({{ $view[0]->a_weight }} * {{ $view[0]->tc[0]->amt}});
                                        } else {
                                            $('.trade_value').val(w * {{ $view[0]->tc[0]->amt}});
                                        }
                                    });
                                });
                            </script>
                            <div class="">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <button type="button" class="btn" onclick="srch()" style="line-height: 28px;"><i class="priya-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <h5 class="mt-3">Transfer to</h5>
                    </div>
                        <div class="row ">
                            <div class="col-12 no-gap">
                                <div class="row bordered bg-color1-1">
                                    <div class="col-md-4">
                                        <dl>
                                            <dt>Trader Name</dt>
                                            <dd id="tname">Chalandri Athens Greece</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-4">
                                        <dl>
                                            <dt>Mobile No.</dt>
                                            <dd id="tmob">+91 8903216548</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-4">
                                        <dl>
                                            <dt>License No.</dt>
                                            <dd id="tlic">20220315000266</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity to Transfer <span class="text-danger">*</span></label>
                                    <input type="" name="qtt" class="qtt form-control pri-form">
                                    <input type="hidden" name="trader_id" class="trader_id form-control pri-form" value="{{$view[0]->trader_id}}">
                                    <input type="hidden" name="commodity_id" class="commodity_id form-control pri-form" value="{{$view[0]->commodity_id}}">
                                    <input type="hidden" name="quantity_id" class="quantity_id form-control pri-form" value="{{$view[0]->quantity_id}}">
                                    <input type="hidden" name="trade_type" class="trade_type form-control pri-form" value="{{$view[0]->trade_type}}">
                                    <input type="hidden" name="trade_value" class="trade_value form-control pri-form" value="">
                                    <input type="hidden" name="p_status" class="p_status form-control pri-form" value="{{$view[0]->p_status}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Vehicle Number <span class="text-danger">*</span></label>
                                    <input type="" name="veh_no" class="form-control pri-form">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Driver Mobile Number <span class="text-danger">*</span></label>
                                    <input type="" name="mob_no" class="form-control pri-form" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-3">Consignee Details</h5>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Consignee Name <span class="text-danger">*</span></label>
                                    <input type="" name="name" class="form-control pri-form">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address Line 1 <span class="text-danger">*</span></label>
                                    <input type="" name="ad1" class="form-control pri-form">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input type="" name="ad2" class="form-control pri-form">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>State <span class="text-danger">*</span></label>
                                    <select name="state_id" class="state form-control pri-form">
                                        <option>Select</option>
                                        @foreach($state as $stt)
                                        <option value="{{$stt->state_id}}">{{$stt->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $(".state").change(function() {
                                        $.get("{{url('district')}}/" + $(this).val(), function(result) {
                                            var str;
                                            for (var i = 0; i < result.length; i++) {
                                                str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                            }
                                            // console.log(str);
                                            $('.district1').html(str);
                                        });
                                    });
                                });
                                $(document).ready(function() {
                                    $(".district1").change(function() {
                                        $.get("{{url('mandal')}}/" + $(this).val(), function(result) {
                                            var str;
                                            for (var i = 0; i < result.length; i++) {
                                                str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                            }
                                            $('.mandal1').html(str);
                                        });
                                        $.get("{{url('amc')}}/" + $(this).val(), function(result) {
                                            var str;
                                            for (var i = 0; i < result.length; i++) {
                                                str += '<option value="' + result[i].id + '">' + result[i].name + '</option>';
                                            }
                                            $('#amc1').html(str);
                                        });
                                    });
                                });
                            </script>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>District <span class="text-danger">*</span></label>
                                    <select name="dis_id" class="district1 form-control pri-form">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mandal <span class="text-danger">*</span></label>
                                    <select name="mdl_id" class="mandal1 form-control pri-form">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Village Name <span class="text-danger">*</span></label>
                                    <select name="amc_id" class="form-control pri-form" id="amc1">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Invoice Number <span class="text-danger">*</span></label>
                                    <input type="" name="invoice" class="form-control pri-form">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check1">
                                    <label class="pri-check">
                                        <input type="checkbox" name="" required><i></i>
                                        I declare that the information furnished above is true to best of my knowledge
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="button" name="" class="btn btn-cancel" value="Cancel" />
                                <input type="submit" name="" class="btn" value="Submit" onclick="confirm('Are you Sure you want to transfer the stock.')" />
                            </div>
                        </div>
                    </form>
                </div>
                @if(session()->has('alert'))
                <script>
                    alert("{{session()->get('alert')}}");
                </script>                
                {{session()->forget('alert')}}
                @endif

                <script>
                    $(document).ready(function() {
                        $('#a_weight').change(function(){
                            $q = $('#a_weight').val();
                            if($q > {{$view[0]->a_weight}}){
                                alert("Kindly enter value below or equal current Balance quantity");
                                $('#a_weight').val({{$view[0]->a_weight}});
                                $('.trade_value').val({{$view[0]->a_weight}} * {{$view[0]->tc[0]->amt}});
                            }else {
                                $('.trade_value').val($q * {{$view[0]->tc[0]->amt}});}
                        });
                    });
                </script>

                <form action="{{url('retail_sale')}}" method="post">
                @csrf
                <div class="row retail-sale-div box" style="display: none;">
                    <!-- <div class="col-md-12">
                                <h6>Retail Sale</h6>
                            </div> -->
                    <div class="col-12 no-gap">
                        <div class="row bordered bg-color1-1">
                            <div class="col-md-8">
                                <dl>
                                    <dt>Address</dt>
                                    <input type="hidden" name="id" value="{{ $view[0]->id }}">
                                    <dd>@if(isset($view[0]->ad1)){{$view[0]->ad1}}@else<input type="text" name="ad1" placeholder="Enter Address" value="{{$view[0]->ad1}}">@endif
                                        ,@if(isset($view[0]->ad2)){{$view[0]->ad2}}@else<input type="text" name="ad2" placeholder="Enter Address" value="{{$view[0]->ad2}}">@endif</dd>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Current Quantity</dt>
                                    <dd>@if(isset($view[0]->a_weight)){{$view[0]->a_weight}}@endif</dd>
                                    <!--<dd>@if(isset($qty_amt[0]->a_qty)){{$qty_amt[0]->a_qty}}@endif</dd>-->
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Reference Trade</dt>
                                    <dd><input type="text" name="rad1" placeholder="Enter Address" value="">,
                                    <input type="text" name="rad2" placeholder="Enter Address" value=""></dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Commodity</dt>
                                    <input type="hidden" name="com_name" value="{{$view[0]->tc[0]->com_name}}">
                                    <dd>{{$view[0]->tc[0]->com_name}}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Balance Quantity</dt>
                                    <dd><input type="number"  name="a_weight" id="a_weight" placeholder="Enter quantity" value=""> {{$view[0]->tc[0]->qty_name}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5 class="mt-3">Consignee Details</h5>
                        <input type="hidden" name="trade_id" value="{{$view[0]->id}}">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Consignee Name <span class="text-danger">*</span></label>
                            <input type="" name="name" class="form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Address Line 1 <span class="text-danger">*</span></label>
                            <input type="" name="ad1" class="form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="" name="ad2" class="form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>State <span class="text-danger">*</span></label>
                            <select name="state_id" class=" state form-control pri-form" required >
                            <option>Select</option>
                                @foreach($state as $stt)
                                    <option value="{{$stt->state_id}}">{{$stt->state_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>District <span class="text-danger">*</span></label>
                            <select name="dis_id" class="district form-control pri-form" required>
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Mandal <span class="text-danger">*</span></label>
                            <select name="mdl_id" class="mandal form-control pri-form" required>
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Village Name <span class="text-danger">*</span></label>
                            <select id="amc2" name="amc_id" class="form-control pri-form" required>
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Invoice Number <span class="text-danger">*</span></label>
                            <input type="" name="invoice" class="form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> Amount <span class="text-danger">*</span></label>
                            <input type="" name="trade_value" class="trade_value form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> Mobile Number <span class="text-danger">*</span></label>
                            <input type="" name="mobile" class="mobile form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> Vehicle No. <span class="text-danger">*</span></label>
                            <input type="" name="veh_detail" class="veh_detail form-control pri-form" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check1">
                            <label class="pri-check">
                                <input type="checkbox" required><i></i>
                                I declare that the information furnished above is true to best of my knowledge
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="button" name="" class="btn btn-cancel" value="Cancel" />
                        <input type="submit" name="" class="btn" value="Submit" onclick="/*prAlert('Retail permit is created with the transaction Id: <b>P202203150002</b>')*/" />
                    </div>
                    </form>
                    <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>Edit Permit <span class="text-danger">*</span></label>
                                    <input type="" name="" class="form-control pri-form" readonly>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label>Selection – SOS (Selected) <span class="text-danger">*</span></label>
                                    <select class="form-control pri-form">
                                        <option>Select</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label>Early Arrivals <span class="text-danger">*</span></label>
                                    <select class="form-control pri-form">
                                        <option>Select</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cancel Permit <span class="text-danger">*</span></label>
                                    <select class="form-control pri-form">
                                        <option>Select</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Emergency Permit Reason <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="" name="" class="form-control pri-form">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>State <span class="text-danger">*</span></label>
                                        <select class="form-control pri-form">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>District <span class="text-danger">*</span></label>
                                        <select class="form-control pri-form">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Mandal <span class="text-danger">*</span></label>
                                        <select class="form-control pri-form">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Village <span class="text-danger">*</span></label>
                                        <select class="form-control pri-form">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Seller Name <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Mobile Number <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Original Permit Reference <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Commodity <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quantity Type <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Purchased Quantity <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Trade Value <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Market Fee (INR) <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Balance Quantity <span class="text-danger">*</span></label>
                                        <input type="" name="" class="form-control pri-form" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="repeat-div">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>New Vehicle Number <span class="text-danger">*</span></label>
                                                    <input type="" name="" class="form-control pri-form">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Purchased Quantity <span class="text-danger">*</span></label>
                                                    <input type="" name="" class="form-control pri-form">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Trade Value (INR) <span class="text-danger">*</span></label>
                                                    <input type="" name="" class="form-control pri-form">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Market Fees <span class="text-danger">*</span></label>
                                                    <input type="" name="" class="form-control pri-form">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mobile Number <span class="text-danger">*</span></label>
                                                    <input type="" name="" class="form-control pri-form">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-new"><i class="priya-plus"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="button" name="" class="btn btn-cancel" value="Cancel">
                                    <input type="button" name="" class="btn" value="Submit">
                                </div -->
                </div>
            </div>
        </div>
    </div>
</div>
@include("includes/footer");
<script type="text/javascript">
    $(document).ready(function() {
        $('.pri-tabber input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>
</body>
{{-- @if(isset($dat)) @dd($dat) @endif 
 @dd($view) --}}

</html>