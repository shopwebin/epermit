@include("includes/header");

<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Primary Permit Creation</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
                @if(isset($dat[0]->qty))    @else
                @php $dat[0]->qty = 0;@endphp   @endif
            <div class="card-body">
                <!--div class="form-group">
                    <label>Type of Permit <span class="text-danger">*</span></label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Primary</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Secondary</label>
                    </div>
                </div-->
                <script>
                            $(document).ready(function() {
                                @if( isset($dat[0]->c_status) && (!$dat[0]->c_status))
                                    window.location.href = '{{url("print-permit")}}/P{{ $dat[0]->id }}';
                                @endif
                            });
                            $(document).ready(function() {
                                $(".state").change(function() {
                                    $.get("{{url('district')}}/" + $(this).val(), function(result) {
                                        var str;
                                        for (var i = 0; i < result.length; i++) {
                                            str += '<option value="' + result[i].id + '" @isset($dat[0]->dis_id) @if($dat[0]->dis_id == "' + result[i].id + '"){{ "selected" }}@endif @endisset>' + result[i].name + '</option>';
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
                                            str += '<option value="' + result[i].id + '" @isset($dat[0]->mdl_id) @if($dat[0]->mdl_id == "' + result[i].id + '"){{ "selected" }}@endif @endisset>' + result[i].name + '</option>';
                                        }
                                        $('.mandal').html(str);
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $(".commodity").change(function() {
                                    $.get("{{url('commodity_weight')}}/" + $(this).val(), function(result) {
                                        // console.log(result[0]['wht']);
                                        $('.a_weight').val(result[0]['wht']);
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $(".a_weight").change(function() {
                                    var c = {{$dat[0]->com_id}};
                                    var q = {{$dat[0]->q_id}};
                                    var w = $('.a_weight').val();
                                    $('.bal_qty').val({{$dat[0]->qty+$dat[0]->a_weight}}-w);
                                    if(w > {{ ($dat[0]->a_weight+$dat[0]->qty) }}){
                                                alert("Kindly enter value below or equal available quantity");
                                                $('.a_weight').val("{{ $dat[0]->a_weight }}");
                                                $('.bal_qty').val({{$dat[0]->qty}});
                                            } else {
                                    $.ajax({
                                        type: 'POST',
                                        url: "{{url('com_val')}}",
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                            com: c,
                                            qty: q
                                        },
                                        success: function(data) {
                                            $('.trade_val').val(w * data[0].amt);
                                        }
                                    });}
                                });
                            }); 
                        @if(!isset($dat[0]->value))            
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
                                    var strDate = (new Date()).toISOString().split('T')[0];
                                    // alert(w);
                                    // alert(strDate);
                                    if((w < strDate)||(w>=h)){
                                        alert("Atleast 1 day  permit can be Created");
                                        $(".td").val('');
                                    }
                                });
                            });
                        @endif

                            $(document).ready(function() {
                                $('.c_qty').change(function(){
                                    var a = $('.a_weight').val();
                                    var c = $('.c_qty').val(); 
                                    if(c - a >0){
                                        alert('Kindly enter number less or equal to the Available Quantity');
                                        $('.c_qty').val(0);
                                    }
                                    $('.c_r').css('display','block');
                                });
                            });

                            $(document).ready(function() {
                                $('#cancelbtn').click(function(e){
                                    e.preventDefault();
                                    $('.c_qty1').val($('.c_qty').val());
                                    $('.c_reason1').val($('.c_reason').val());
                                    $('.c_id1').val('P'+$('.id').val());
                                    $('.c_tid1').val($('input[name=t_id]').val());
                                    $('.form2').submit();
                                });
                            });
                        </script>
                @if(isset($type)) 
                    <form action="{{url('permit')}}/primary/edit/{{$dat[0]->id}}" method="post">
                 @else 
                <form action="{{url('permit')}}/primary/add" method="post">
                @endif 
                    @csrf
                <h5 class="mt-3">Consignee Details</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="" name="name" class="form-control pri-form" value="@isset($dat[0]->seller_name) {{ $dat[0]->seller_name }}  @endisset @isset($dat[0]->name){{$dat[0]->name}}@endisset" required>
                            <input type="hidden" name="id" value="{{ $dat[0]->id }}" class="id">
                            @if(isset($dat[0]->trade_id))  
                            <input type="hidden" name="t_id" value="{{ $dat[0]->trade_id }}">
                            @else
                            @php $dat[0]->trade_id = $dat[0]->id; @endphp
                                <input type="hidden" name="t_id" value="{{ $dat[0]->trade_id }}">
                            @endif

                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="text" name="ad1" class="form-control pri-form" @isset($dat[0]->ad1) value="{{$dat[0]->ad1}}"@endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 2 <span class="text-danger">*</span></label>
                                <input type="text" name="ad2" class="form-control pri-form" @isset($dat[0]->ad2) value="{{$dat[0]->ad2}}" @endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Commodity <span class="text-danger">*</span></label>
                                <select class="form-control pri-form commodity" name="com_id" required>
                                @if($dat[0] != '')
                                    <option value="{{ $dat[0]->com_id }}">{{ $dat[0]->com_name }}</option>
                                @else                                
                                    <option>Select</option>
                                @endif 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control pri-form state" name="state_id" required>
                                    <option>Select</option>
                                    @foreach($state as $stt)
                                        <option value="{{$stt->state_id}}" @isset($dat[0]->state_id) @if($dat[0]->state_id === $stt->state_id){{ "selected" }}@endif @endisset>{{$stt->state_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control pri-form district" name="dis_id" required>
                                    @if(isset($dat[0]->dis_id))
                                        @foreach($districts as $mdl)
                                            <option value="{{ $mdl->id }}" @if($dat[0]->dis_id == $mdl->id) {{"selected"}} @endif >{{$mdl->name}}</option>
                                        @endforeach
                                    @endif
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mandal <span class="text-danger">*</span></label>
                                <select class="form-control pri-form mandal" name="mdl_id" required>
                                    @if(isset($dat[0]->mdl_id))
                                    @foreach($mandals as $mdl)
                                    <option value="{{ $mdl->id }}" @if($dat[0]->mdl_id == $mdl->id) {{"selected"}} @endif >{{$mdl->name}}</option>
                                    @endforeach
                                    @endif
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Quantity(Balance Quantity {{ ($dat[0]->a_weight+$dat[0]->qty) }}@isset($dat[0]->qty_name) {{ $dat[0]->qty_name }} @endisset ) <span class="text-danger">*</span></label>
                                <input type="" value="{{ $dat[0]->a_weight }}" name="a_weight" class="form-control pri-form a_weight" required>
                                <input type="hidden" name="bal_qty" class="bal_qty" value="{{$dat[0]->qty}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Quantity Details <span class="text-danger">*</span></label>
                                <input type="" name="q_details" class="form-control pri-form q_details" @isset($dat[0]->q_details) value="{{$dat[0]->q_details}}" @endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Trade Value (INR) <span class="text-danger">*</span></label>
                                <input type="" name="value" class="trade_val form-control pri-form" @isset($dat[0]->value) value="{{$dat[0]->value}}" @endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Source (Place of purchase) <span class="text-danger">*</span></label>
                                <input type="" name="source" class="form-control pri-form source" @isset($dat[0]->source) value="{{$dat[0]->source}}" @endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Destination <span class="text-danger">*</span></label>
                                <input type="" name="destination" class="form-control pri-form destination" @isset($dat[0]->destination) value="{{$dat[0]->destination}}" @endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Add Vehicle Details <span class="text-danger">*</span></label>
                                <input type="" name="veh_detail" class="form-control pri-form veh_detail" @isset($dat[0]->veh_detail) value="{{$dat[0]->veh_detail}}" @endisset required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Add Mobile Number <span class="text-danger">*</span></label>
                                <input type="" name="mobile" class="form-control pri-form mobile" @isset($dat[0]->mobile) value="{{$dat[0]->mobile}}" @endisset  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Add Invoice No. <span class="text-danger">*</span></label>
                                <input type="" name="invoice" class="form-control pri-form invoice" @isset($dat[0]->invoice) value="{{$dat[0]->invoice}}" @endisset required>
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
                        </div>
                        <div class="col-md-4" style="">
                            <div class="form-group">
                                <label> Reason <span class="text-danger">*</span></label>
                                <input type="text" class="c_reason form-control pri-form">
                                <!--select class="c_reason form-control pri-form">
                                    <option value="">Select</option>
                                    <option value="Natural Disaster">Natural Disaster</option>
                                    <option value="Product Damaged and Returned">Product Damaged and Returned</option>
                                </select-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> Cancelled Quantity </label>
                                <input type="number" class="c_qty form-control pri-form">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                        @if(isset($dt))
                            @if((strtotime($dt[0]." ".$dt[1]) > time()) && ($dat->c_status == 1))
                                <input type="submit" value="Early Arrival" class="btn" name="submit">
                                <input type="submit" value="SOS" class="btn" name="submit">
                                <button id="cancelbtn" class="btn">Cancel Permit</button>
                                <input type="submit" name="" class="btn" value="Edit Permit">
                            @endif
                        @else
                            <input type="submit" name="" class="btn" value="Create Permit">
                        @endif
                        @if(isset($type))
                            <a href="{{url('print-permit')}}/P{{ $dat[0]->id }}" name="" class="btn">Print Permit</a>
                        @endif
                    </div>
                </form>
                <form action="{{url('cancel-permit')}}" method="post" class="form2">
                @csrf    
                <input type="hidden" name="c_qty" class="c_qty1">
                    <input type="hidden" name="c_reason" class="c_reason1">
                    <input type="hidden" name="id" class="c_id1">
                    <input type="hidden" name="tid" class="c_tid1">
                </form>
            </div>
        </div>
    </div>
</div>
@include("includes/footer");
</body>

</html>