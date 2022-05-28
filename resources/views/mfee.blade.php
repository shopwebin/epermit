@include("includes/header");
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="card col-md-4">
                <h5 class="card-header">
                    <span>Create Market Fee</span>
                </h5>
                @if(isset($form))
                    <form action="{{url('market_fee')}}/update" method="post">
                        <input type="hidden" name="id" value="{{$form[0]->id}}">
                @else
                    <form action="{{url('market_fee')}}/add" method="post">
                @endif
                    @csrf
                    {{-- @dd($form) --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Market Fee Percentage <span class="text-danger">*</span></label>
                                    <input name="percent" class="mfee form-control pri-form" value="@isset($form){{$form[0]->percent}}@endisset" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">From Date<span class="text-danger">*</span></label>
                                    <input type="date" class="fd form-control pri-form" name="from_date" value="@isset($form){{explode(' ',$form[0]->from_date)[0]}}@endisset" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>To Date<span class="text-danger">*</span></label>
                                    <input type="date" class="td form-control pri-form" name="to_date" value="@isset($form){{explode(' ',$form[0]->to_date)[0]}}@endisset" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info" value="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="card col-md-5">
                <h5 class="card-header"><span>Market Fee List</span></h5>
                <div class="card-body" style="overflow: auto;">
                    <div class="row">
                        <style>
                            th,td { border: 2px solid black;    }
                        </style>
                        <table class="table theme-tbl table-bordered" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Percentage</th>
                                    <th>From date</th>
                                    <th>To Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($mfee))
                                @php $i = 0; @endphp
                                @foreach($mfee as $mf)
                                @php $i=$i+1; @endphp
                                <tr class="">
                                    <td class="">{{$i}}</td>
                                    <td class="">{{$mf->percent}}</td>
                                    <td class="">{{explode(' ',$mf->from_date)[0]}}</td>
                                    <td class="">{{explode(' ',$mf->to_date)[0]}}</td>
                                    <td class="">
                                     <a class="btn btn-info" href="{{url('market_fee')}}/edit/{{$mf->id}}">Edit</a>   
                                     <a class="btn btn-info" href="{{url('market_fee')}}/delete/{{$mf->id}}" onclick="return confirm('Are you Sure you want to delete?');" >Delete</a> </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
</div>
@if(session()->has('alert'))
<script>
    alert("{{session()->get('alert')}}");
</script>
@php session()->forget('alert'); @endphp
@endif
@include("includes/footer");
</body>
{{-- @dd($form) --}}
</html>