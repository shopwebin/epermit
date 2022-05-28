@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Permit Creation</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <!-- <div class="form-group">
                            <label>Type of Permit <span class="text-danger">*</span></label>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline1">Primary</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline2">Secondary</label>
                            </div>
                        </div> -->
                        <div class="pri-tabber">
                    <label class="pri-radio">
                        <input type="radio" name="permit_type" checked="" value="1" onchange="$('.primary-permit').show();$('.secondary-permit').hide();"><i></i>
                        Primary
                    </label>
                    <label class="pri-radio">
                        <input type="radio" name="permit_type" id="" value="2" onchange="$('.primary-permit').hide();$('.secondary-permit').show();"><i></i>
                        Secondary
                    </label>
                </div>
                @if(isset($type)) 
                    <form action="../permit/primary/edit/{{$dat[0]->id}}" method="post">
                 @else 
                <form action="../permit/primary/add" method="post">
            @endif 
                    @csrf
                    <div class="row box primary-permit">
                        <div class="col-12">
                            <h5 class="mt-3">Consignee Details</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="" name="name" class="form-control pri-form" value="@isset($dat[0]->seller_name) {{ $dat[0]->seller_name }}  @endisset @isset($dat[0]->name){{$dat[0]->name}}@endisset">
                                <input type="hidden" name="trade_id" value="{{ $dat[0]->id }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="text" name="ad1" class="form-control pri-form" @isset($dat[0]->ad1) value="{{$dat[0]->ad1}}"@endisset >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 2 <span class="text-danger">*</span></label>
                                <input type="text" name="ad2" class="form-control pri-form" @isset($dat[0]->ad2) value="{{$dat[0]->ad2}}" @endisset >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Commodity <span class="text-danger">*</span></label>
                                <select class="form-control pri-form commodity" name="com_id">
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
                                <select class="form-control pri-form state" name="state_id">
                                    <option>Select</option>
                                    @foreach($state as $stt)
                                        <option value="{{$stt->state_id}}" @isset($dat[0]->state_id) @if($dat[0]->state_id === $stt->state_id){{ "selected" }}@endif @endisset>{{$stt->state_title}}</option>
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
                                    var w = $('.a_weight').val();
                                    if(w > {{ $dat[0]->a_weight }}){
                                        alert("Kindly enter value below or equal available quantity");
                                        $('.a_weight').val("{{ $dat[0]->a_weight }}");
                                    }
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
                                $(".fd").val();
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
                                $(".td").val();
                            }
                        });
                        });
                        </script>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control pri-form district" name="dis_id">
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
                                <select class="form-control pri-form mandal" name="mdl_id">
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
                                <label>Available Quantity(Total Quantity {{ $dat[0]->a_weight }}@isset($dat[0]->qty_name) {{ $dat[0]->qty_name }} @endisset ) <span class="text-danger">*</span></label>
                                <input type="" value="{{ $dat[0]->a_weight }}" name="a_weight" class="form-control pri-form a_weight">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Quantity Details <span class="text-danger">*</span></label>
                                <input type="" name="q_details" class="form-control pri-form q_details" @isset($dat[0]->q_details) value="{{$dat[0]->q_details}}" @endisset >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Source (Place of purchase) <span class="text-danger">*</span></label>
                                <input type="" name="source" class="form-control pri-form source" @isset($dat[0]->source) value="{{$dat[0]->source}}" @endisset >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Destination <span class="text-danger">*</span></label>
                                <input type="" name="destination" class="form-control pri-form destination" @isset($dat[0]->destination) value="{{$dat[0]->destination}}" @endisset >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Add Vehicle Details <span class="text-danger">*</span></label>
                                <input type="" name="veh_detail" class="form-control pri-form veh_detail" @isset($dat[0]->veh_detail) value="{{$dat[0]->veh_detail}}" @endisset >
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

                        <div class="col-12 text-center">
                            <input type="submit" name="" class="btn" value=" @if(isset($type)) {{ 'Edit'}}@else {{'Create'}}@endif Permit">
                        </div>
                    </div>
                </form>
                <div class="row box secondary-permit" style="display: none;">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Quantity <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Secondary Trade Available <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form" readonly>
                        </div>
                    </div>

                    <div class="col-12">
                        <h5 class="mt-3">Consignee Details</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address Line 1 <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address Line 2 <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>State <span class="text-danger">*</span></label>
                            <select class="form-control pri-form">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>District <span class="text-danger">*</span></label>
                            <select class="form-control pri-form">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mandal <span class="text-danger">*</span></label>
                            <select class="form-control pri-form">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Village <span class="text-danger">*</span></label>
                            <select class="form-control pri-form">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Reference Trade (Last Trade Details/ Primary trade permit) <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commodity <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Vehicle Number <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantity <span class="text-danger">*</span></label>
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
                            <label>Mobile Number <span class="text-danger">*</span></label>
                            <input type="" name="" class="form-control pri-form">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <label for="">&nbsp;</label>
                        <input type="button" name="" class="btn" value="@if(isset($type)) {{ 'Edit'}}@else {{'Create'}}@endif Permit">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("includes/footer");
</body>
</html>
@dd($dat);