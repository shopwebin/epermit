<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(isset($dat->c_status))@if($dat->c_status == 2){{$type}} Emergency @elseif($dat->c_status == 3) Early Arrival of {{$type}} @elseif($dat->c_status == 0) Cancellation of {{$type}} @endif @else {{$type}} @endif Permit</title>
    <style>
        body{font-family: Arial, Helvetica, sans-serif; font-size: 16px;}
        .table{width: 100%;}
        @media print{
            input{
                border-width:0px;
                border:none;
                outline:none;
            }
        }
    </style>
</head>
<body>
    
    <div style="max-width: 1000px; margin: 30px auto; box-shadow: 1px 1px 30px #0003; padding: 20px;">
        <table border="0" cellpadding="0" cellspacing="0" class="table">
            <tr style="font-size: 12px;">
                <td></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="4" style="padding: 10px;">
                    <table border="0" cellpadding="4" cellspacing="0" class="table">
                        <tr>
                            <a href="{{url('trade-list')}}"><td style="width: 25%;"><img src="{{url('images')}}/Secondary-Permit_06.png" alt="logo" style="width: 170px;" /></td></a>
                            <td style="text-align: center;width: 50%; font-size: 18px;">
                                The Andhra Pradesh Agricultural<br />
                                (Agri Produce & Livestock)<br />
                                Market Rules,1969<br />
                                Form-12<br />
                                [Rule 74 - A]<br />
                                E- Transport Permit For Transportation
                                of Notified Agricultural Produce
                            </td>
                            <td><img src="{{url('images')}}/qrcode.png" alt="qrcode" style="width: 220px;" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 25%;">License Number:</td>
                <td style="width: 25%;">{{$dat->lic_no}}</td>
                <td style="width: 25%;">Date and Time:</td>
                <td style="width: 25%;">@php $mytime = Carbon\Carbon::now();
                    echo $mytime->toDateTimeString(); @endphp</td>
            </tr>
            <tr>
                <td>Permit Number:</td>
                <td>{{$type[0]}}{{$dat->id}}</td>
                <td>Sale/Invoice No:</td>
                <td>@if(!empty($dat->invoice)){{$dat->invoice}}@else
                    <input type="text" name="invoice">@endif
                </td>
            </tr>
            <tr>
                <td>Permit Type:</td>
                <td>@if(isset($dat->c_status) &&  ($dat->c_status != 1))
                    @if($dat->c_status == 2){{$type}} Emergency 
                    @elseif($dat->c_status == 3) Early Arrival of {{$type}} 
                    @elseif($dat->c_status == 0) Cancellation of {{$type}} @endif 
                    @else {{$type}} @endif Permit</td>
                <td></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td style="padding: 3px 0;">Firm Name:</td>
                <td style="padding: 3px 0;" colspan="3">{{$dat->firmname}}</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">Address:</td>
                <td style="padding: 3px 0;" colspan="3">{{$dat->firmaddress}}</td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td style="padding: 3px 0;">Seller Name:</td>
                <td style="padding: 3px 0;" colspan="3">{{$dat->tname}}</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">Purchase Address:</td>
                <td style="padding: 3px 0;" colspan="3">{{$dat->address}}</td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td style="padding: 3px 0;">Consignee Name:</td>
                <td style="padding: 3px 0;" colspan="3">{{$dat->name}}</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">Address:</td>
                <td style="padding: 3px 0;" colspan="3">{{$dat->ad1}},{{$dat->ad2}}</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">Mobile no:</td>
                <td style="padding: 3px 0;" colspan="3">@if(isset($dat->mobile)){{$dat->mobile}}@else
            <input type="number">@endif</td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <!--tr>
                <td colspan="4">24,150.00</td>
            </tr-->
            <tr>
                <td>Commodity:</td>
                <td>{{$dat->com_name}}</td>
                <td>Quantity:</td>
                <td>{{$dat->a_weight}}.00</td>
            </tr>
            <tr>
                <td>Sale value (INR):</td>
                <td>{{$dat->value}}.00</td>
                <td>Quantity Type:</td>
                <td>{{$dat->qty_name}}</td>
            </tr>
            <tr>
                <td>Transport Vehicle:</td>
                <td>{{$dat->veh_detail}}</td>
                @if(isset($dat->c_qty) && ($dat->c_qty > 0))
                <td>Cancelled Quantity:</td>
                <td>{{$dat->c_qty}}.00</td>
                @else
                <td></td>
                <td></td>
                @endif
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td colspan="4">Duration of the permit in force from {{$dat->valid_from}} PM @if(isset($dat->valid_to)) to {{$dat->valid_to}}. @endif {{--@if(isset($dat->c_reason)) Due to {{$dat->c_reason}} @endif --}}</td>
            </tr>
            {{-- @if(isset($dat->c_reason)) <tr><td colspan="4"> Cancellation reason: {{$dat->c_reason}} </td></tr> @endif --}}
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td colspan="4">I declare that the information furnished above is true to the best of my knowledge & belief.</td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td colspan="4" style="text-align: right; padding-top: 50px;">Signature of Trader/Exporter</td>
            </tr>
            <tr>
                <!-- <td colspan="4" style="font-size: 12px; padding-top: 50px;">https://myap.e-pragati.in/prweb/sso1/uaWvF7nvxy_mi7mEeoM6lA%5B%5B*/!STANDARD?pyActivity=%40baseclass.pzTransformAndRun&pzTra</td> -->
            </tr>
        </table>
    </div>
</body>
</html>