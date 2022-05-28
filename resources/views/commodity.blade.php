@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="row">
        <div class="card  col-md-4">
            <h5 class="card-header">
                <span>Create Commodity</span>                
            </h5>
            <script>
                $(document).ready(function() {
                $('.form1').one('submit', function(e){
                    e.pervantDefault();
                    var t = $('.dt').val();
                    var f = $('.df').val();
                    var flag = 1;
                    if(t < f){
                        alert('kindly enter correct date');
                        flag= 0;
                    } else{
                        var name = upper($('.com_name').val());
                        /* var a = $com}};
                        a.each(function(index,value){
                            alert("$val->com_name}}"); */
                            @foreach($com as $value)                            
                            if(name == "{{$value->com_name}}"){
                            if(((t >= "{{$value->com_name}}")&&(t<="{{$value->com_name}}"))||((f >= "{{$value->com_name}}")&&(f<="{{$value->dt}}"))){
                                alert("date is already booked");
                                flag = 0
                            }}
                            @endforeach
                        // });
                        if(flag){
                            // $('.form1').submit();
                        }
                    }
                });
                });
            </script>
            @if(session()->has('alert'))
                <script>
                    alert("{{session()->get('alert')}}");
                </script>
            @php session()->forget('alert'); @endphp
            @endif
            @if(isset($dat))
                <form action="{{url('commodity/update')}}" class="form1" method="post">
                    {{-- @dd($dat) --}}
                    <input type="hidden" name="com_id" value="{{$dat[0]->com_id}}">
            @else
                <form action="{{url('commodity')}}/add" class="form1" method="post">
            @endif
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Commodity <span class="text-danger">*</span></label>
                                <input type="" name="com_name" class="com_name form-control pri-form" value="@isset($dat){{$dat[0]->com_name}}@endisset" required>
                            </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Commodity discription <span class="text-danger">*</span></label>
                                <input type="" name="com_description" class="form-control pri-form" value="@isset($dat){{$dat[0]->com_description}}@endisset">
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Price<span class="text-danger">*</span></label>
                                <input type="" name="amt" class="form-control pri-form" value="@isset($dat){{$dat[0]->amt}}@endisset" required>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Price valid from<span class="text-danger">*</span></label>
                                <input type="date" name="df" class="df form-control pri-form" value="@isset($dat){{$dat[0]->df}}@endisset" required>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Till Date <span class="text-danger">*</span></label>
                                <input type="date" name="dt" class="dt form-control pri-form" value="@isset($dat){{$dat[0]->dt}}@endisset" required>
                            </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quantity<span class="text-danger">*</span></label>
                                <select name="q_id" class="form-control pri-form" id="amc" required>
                                    <option value="">Select</option>
                                    @foreach($qty as $q)
                                        <option value="{{$q->id}}"  @if(isset($dat)&&($dat[0]->q_id == $q->id)){{"selected"}}@endif >{{$q->qty_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-info" name="submit" value="@if(isset($dat) ){{'Update'}}@else{{'Add'}}@endif" />
                    </div> 
                        <!--<div class="col-md-4">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control pri-form state" name="state" class="">
                                    <option>Select</option>
                                    {{--{{--@foreach($state as $stt)
                                    <option value="{{$stt->state_id}}">{{$stt->state_title}}</option>
                                    @endforeach--}}--}}
                                </select>
                            </div>
                        </div>
                    <div class="col-md-12">
                        <div class="form-check1">
                            <label class="pri-check">
                                <input type="checkbox"><i></i>
                                I declare that the information furnished above is true to best of my knoledge
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn" href="javascript:helpModal('#pay-mode-modal')">Pay Market fee</a>
                        <input type="submit" class="btn btn-info" value="Pay Market Fee Later" />
                        <button type="button" class="btn btn-cancel" onclick="window.history.back()">Cancel</button>
                    </div> -->
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
        <div class="card col-md-7" style="height: 85vh;">
            <h5 class="card-header">
                <span>Commodity List</span>                
            </h5>
            <div class="card-body" style="overflow: auto;">
                <div class="row">
                    <style> th,td{  border:2px solid black; }   </style>
                    <table class="table theme-tbl table-bordered" style="text-align:center;">
                        <thead>
                            <tr>
                            <th>Sl. No.</th>
                            <th>Commodity</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Valid From</th>
                            <th>Till Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; $cn='';  @endphp
                            @foreach($com as $c)
                                @if(($cn != $c->com_name) || ($i==0))
                                    @php $i++; 
                                    $cn = $c->com_name; @endphp
                            <tr data-toggle="collapse" data-target="#demo{{$i}}" class="accordion-toggle">
                                <td><button class="btn btn-default btn-xs">{{$i}}</button></td>
                                <td>{{ $c->com_name }}</td>
                                <td>{{ $c->com_description }}</td>
                                <td>{{ $c->qty_name }}</td>
                                <td>{{ $c->amt }}</td>
                                <td>{{ $c->df }}</td>
                                <td>{{ $c->dt }}</td>
                                <td>
                                     <a class="btn btn-info" href="{{url('commodity')}}/edit/{{$c->com_id}}">Edit</a>   
                                     <a class="btn btn-info" href="{{url('commodity')}}/delete/{{$c->com_id}}"
                                      onclick="return confirm('Are you Sure you want to delete {{ $c->com_name }} ?');" >Delete</a>   
                                </td>
                            </tr>
                            @else
                            <tr id="demo{{$i}}" class="hiddenRow accordian-body collapse">
                                <td></td>
                                <td>{{ $c->com_name }}</td>
                                <td>{{ $c->com_description }}</td>
                                <td>{{ $c->qty_name }}</td>
                                <td>{{ $c->amt }}</td>
                                <td>{{ $c->df }}</td>
                                <td>{{ $c->dt }}</td>
                                <td>
                                     <a class="btn btn-info" href="{{url('commodity')}}/edit/{{$c->com_id}}">Edit</a>   
                                     <a class="btn btn-info" href="{{url('commodity')}}/delete/{{$c->com_id}}" onclick="return confirm('Are you Sure you want to delete {{ $c->com_name }} ?');" >Delete</a>   
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@include("includes/footer");
</body>

</html>