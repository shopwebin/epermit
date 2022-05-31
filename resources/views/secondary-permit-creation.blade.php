@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Secondary Permit Creation</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <div class="row">
                    <!--div class="col-md-3">
                        <div class="form-group">
                            <label>Type of Permit <span class="text-danger">*</span></label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Primary</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Secondary</label>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="" name="amc_name" class="form-control pri-form" value="@isset($dat[0]->amc){{$dat[0]->amc}}@endisset" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Purchase Quantity <span class="text-danger">*</span></label>
                            <input type="" name="weight" class="form-control pri-form" value="@isset($dat[0]->weight){{$dat[0]->weight}}@endisset" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Balance Quantity<span class="text-danger">*</span></label>
                            <input type="" name="a_weight" class="form-control pri-form" value="@if(isset($dat[0]->aqty)){{$dat[0]->aqty + $dat[0]->a_weight}}@else{{$dat[0]->a_weight}}@endif" readonly>
                        </div>
                    </div>
                </div>
                <script>
                    /*$(document).ready(function() {
                        {{-- @if($dat[0]->c_status)
                            window.location.href = '{{url("cancel-permit")}}/S{{ $dat[0]->id }}';
                        @endif --}}
                    });*/
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
                                    str += '<option value="' + result[i].id + '" @isset($dat[0]->dis_id) @if($dat[0]->dis_id == "' + result[i].id + '"){{ "selected" }}@endif @endisset>' + result[i].name + '</option>';
                                }
                                console.log('str');
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
                            if((w < strDate)||(w >= h)){
                                alert("Atleast 1 day permit can be Created");
                                $(".td").val();
                            }
                        });
                    });
                    $(document).ready(function() {
                        $(".a_weight").change(function() {
                            var w = $('.a_weight').val();
                            @if(isset($dat[0]->aqty))
                            if(w > {{ $dat[0]->a_weight + $dat[0]->aqty }}){
                            @else   if(w > {{ $dat[0]->a_weight }}){    @endif
                                alert("Kindly enter value below or equal available quantity");
                                $('.a_weight').val("{{ $dat[0]->a_weight }}");
                            } else {
                                $('.trade_val').val(w * {{$dat[0]->amt}});
                            }
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
                </script>
                <h5 class="mt-3">Consignee Details</h5>
                @if(isset($dat[0]->ad2))
                <form action="{{url('secondary/permit/edit')}}" method="post">
                @else
                <form action="{{url('secondary/permit/add')}}" method="post">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="" name="name" class="form-control pri-form" value="@isset($dat[0]->name){{$dat[0]->name}}@endisset">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="" name="ad1" class="form-control pri-form"  value="@isset($dat){{$dat[0]->ad1}}@endisset">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address Line 2 <span class="text-danger">*</span></label>
                                <input type="" name="ad2" class="form-control pri-form"  value="@isset($dat){{$dat[0]->ad2}}@endisset">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control pri-form state" name="stt_id">
                                    <option>Select</option>
                                    @foreach($state as $stt)
                                    <option value="{{$stt->state_id}}" @if(isset($dat[0]->stt_id)) @if($stt->state_id == $dat[0]->stt_id){{"selected"}}@endif @endif>{{$stt->state_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control pri-form district" name="dis_id">
                                @if(isset($dat[0]->dis_id))
                                    <option value="{{$dat[0]->dis_id}}">{{$dat[0]->dis_name}}</option>
                                @else
                                    <option>Select</option>
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mandal <span class="text-danger">*</span></label>
                                <select class="form-control pri-form mandal" name="mdl_id">
                                @if(isset($dat[0]->mdl_id))
                                <option value="{{$dat[0]->mdl_id}}">{{$dat[0]->mdl_name}}</option>                                    
                                @else
                                <option>Select</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!--div class="col-md-4">
                        <div class="form-group">
                            <label>Village <span class="text-danger">*</span></label>
                            <select class="form-control pri-form">
                                <option>Select</option>
                                    @isset($dat)
                                        <option value="">{{$dat[0]->amc}}</option>
                                    @endisset
                            </select>
                        </div>
                    </div-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Reference Trade (Last Trade Details/ Primary trade permit) <span class="text-danger">*</span></label>
                               @if(isset($dat[0]->t_id))
                                    <input type="hidden" name="id" value="S{{$dat[0]->id}}" class="form-control pri-form" readonly>
                                    <input type="" name="t_id" value="t{{$dat[0]->t_id}}" class="form-control pri-form" readonly>
                                @else
                                    <input type="" name="t_id" value="t{{$dat[0]->id}}" class="form-control pri-form" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Commodity <span class="text-danger">*</span></label>
                                <select class="form-control pri-form commodity" name="com_id">
                                    @if($dat[0] != '')
                                    <option value="{{ $dat[0]->com_id }}">{{ $dat[0]->com_name }}</option>
                                    @else
                                    <option>Select</option>
                                    @endif
                                </select>
                                <!-- <input type="" name="" class="form-control pri-form"> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Vehicle Number <span class="text-danger">*</span></label>
                                <input type="" name="veh_id" class="eh_id form-control pri-form"  value="@isset($dat[0]->veh_id){{$dat[0]->veh_id}}@endisset">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Quantity <span class="text-danger">*</span></label>
                                <input type="" name="a_weight" class="a_weight form-control pri-form" value="@isset($dat){{$dat[0]->a_weight}}@endisset">
                                <input type="hidden" name="weight" class="form-control pri-form" value="@if(isset($dat[0]->aqty)){{$dat[0]->aqty + $dat[0]->a_weight}}@else{{$dat[0]->a_weight}}@endif" readonly>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Trade Value (INR) <span class="text-danger">*</span></label>
                                <input type="" name="trade_val" class="trade_val form-control pri-form" value="@isset($dat){{($dat[0]->a_weight * $dat[0]->amt)}}@endisset">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="number" name="mobile" class="number form-control pri-form" value="@isset($dat[0]->mobile){{$dat[0]->mobile}}@endisset"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> Sales Invoice/Reciept </label>
                                <input type="" class="invoice form-control pri-form" name="incoice">
                            </div>
                        </div>
                        @if(isset($dt))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> Cancelled Quantity </label>
                                <input type="number" class="c_qty form-control pri-form">
                            </div>
                        </div>
                        <div class="col-md-4 c_r" style="display: none;">
                            <div class="form-group">
                                <label>Cancelation Reason <span class="text-danger">*</span></label>
                                <input type="text" class="c_reason form-control pri-form">
                                <!--select class="c_reason form-control pri-form">
                                    <option value="">Select</option>
                                    <option value="Natural Disaster">Natural Disaster</option>
                                    <option value="Product Damaged and Returned">Product Damaged and Returned</option>
                                </select-->
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="text-center">
                    @if(isset($dt))
                        @if(strtotime($dt[0]." ".$dt[1]) > time())
                        <input type="submit" value="Early Arrival" class="btn" name="submit">
                        <input type="submit" value="SOS" class="btn" name="submit">
                        <button id="cancelbtn" class="btn">Cancel Permit</button>    
                        <input type="submit" class="btn" value="Edit Permit">
                        @endif
                    @else
                        <input type="submit" class="btn" value="Create Permit">
                    @endif
                    @if(isset($dat[0]->name)) <a href="{{url('print-permit')}}/S{{ $dat[0]->id }}" name="" class="btn">Print Permit</a> @endif 
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
{{--@dd($dat)--}}
</html>