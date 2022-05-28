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
                    <form action="{{url('quantity')}}/update" method="post">
                        <input type="hidden" name="id" value="{{$form[0]->id}}">
                @else
                    <form action="{{url('quantity')}}/add" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Quantity Name <span class="text-danger">*</span></label>
                                    <input name="qty_name" class="quantity form-control pri-form" value="@isset($form){{$form[0]->qty_name}}@endisset" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Quantity Description<span class="text-danger">*</span></label>
                                    <input type="" class="fd form-control pri-form" name="qty_description" value="@isset($form){{explode(' ',$form[0]->qty_description)[0]}}@endisset" required>
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
                <h5 class="card-header"><span>Quantity List</span></h5>
                <div class="card-body" style="overflow: auto;">
                    <div class="row">
                        <style>
                            th,td { border: 2px solid black;    }
                        </style>
                        <table class="table theme-tbl table-bordered" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Unit</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($quantity))
                                @php $i = 0; @endphp
                                @foreach($quantity as $qty)
                                @php $i=$i+1; @endphp
                                <tr class="">
                                    <td class="">{{$i}}</td>
                                    <td class="">{{$qty->qty_name}}</td>
                                    <td class="">{{$qty->qty_description}}</td>
                                    <td class="">
                                     <a class="btn btn-info" href="{{url('quantity')}}/edit/{{$qty->id}}">Edit</a>   
                                     <a class="btn btn-info" href="{{url('quantity')}}/delete/{{$qty->id}}" onclick="return confirm('Are you Sure you want to delete?');" >Delete</a> </td>
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