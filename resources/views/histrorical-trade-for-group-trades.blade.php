@include("includes/header");
<style>
    td {
    max-width: 10vw;
}
</style>
<div class="container-fluid bdy dashboard">
    <div class="py-5 section">
        <div class="card">
            <h5 class="card-header">
                <span>Histrorical Trade for Group trades</span>
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                    <btn onclick="" title="History"><i class="priya-history"></i></btn>
                </div>
            </h5>
            <div class="card-body">
                <div class="form-check1">
                    <label class="pri-radio">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_1" class="commodity_wether_cls" value="amc-div"><i></i>
                        Group by AMC
                    </label>
                    <label class="pri-radio ml-4">
                        <input type="radio" name="commodity_wether[1]" id="commodity_wether_1_2" class="commodity_wether_cls" value="commodity-div"><i></i>
                        Group by Commodity
                    </label>
                </div>

                <div class="amc-div box" style="display: none;">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Market</th>
                                    <th>Trade Id</th>
                                    <th>Trade Type</th>
                                    <th>Commodity</th>
                                    <th>Date</th>
                                    <th>Available Quantity</th>
                                    <th>Units</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $dat3 = [];
                                $sad = [];
                                foreach($dat1 as $i1=>$d1){
                                    $f = 1;
                                    $d11 = explode(" ",$d1->created_at);
                                    $d1->created_at = $d11[0];
                                    foreach($dat3 as $i=>$dt){
                                        if(($dt->amc == $d1->amc)){
                                            $sad[$i][] = $d1;
                                            $a = $d1;
                                            $dt->trade_value += $d1->trade_value;
                                            $dt->m_fee += $d1->m_fee;
                                            $dt->id = $a->id.",T".$dt->id;
                                            $dt->trade_type = $dt->trade_type.",".$d1->trade_type;
                                            $dt->cty = $dt->cty.",".$d1->cty;
                                            $dt->created_at .= ",".$d1->created_at;
                                            $dt->a_weight += $d1->a_weight;
                                            $dt->trade_value += $d1->trade_value;
                                            $dat3[$i] = $dt;
                                            $f = 0;                                            
                                        }
                                    }
                                    if($f){
                                        $dat3[] = $d1;
                                        $sad[][0] = $d1;
                                        $sd1[] = $i1;
                                    }
                                }
                                //var_dump($dat);
                                @endphp
                                @foreach($dat3 as $i=>$dt2)
                                <tr data-toggle="collapse" data-target="#demo1{{$i}}" class="accordion-toggle">
                                    <td><button class="btn btn-default btn-xs">{{$dt2->amc}}</td>
                                    <td>T{{$dt2->id}}</td>
                                    <td>{{$dt2->trade_type}}</td>
                                    <td>{{$dt2->cty}}</td>
                                    <td>{{$dt2->created_at}}</td>
                                    <td>{{$dt2->a_weight}}</td>
                                    <td>{{$dt2->qty}}</td>
                                    <td>Rs {{$dt2->trade_value}}</td>
                                </tr>
                                @foreach($sad[$i] as $j=>$sd)
                                @php
                                if(is_string($sd->id)){
                                    $sd = $dat[$sd1[$i]];
                                }
                                @endphp
                                <tr id="demo1{{$i}}" class="hiddenRow accordian-body collapse">
                                    <td></td>
                                    <td>T{{$sd->id}}</td>
                                    <td>{{$sd->trade_type}}</td>
                                    <td>{{$sd->cty}}</td>
                                    <td>{{$sd->created_at}}</td>
                                    <td>{{$sd->a_weight}}</td>
                                    <td>{{$sd->qty}}</td>
                                    <td>Rs {{$sd->trade_value}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <!--input type="button" name="" class="btn" value="Pay Fee">
                        <input type="button" name="" class="btn" value="Create Permit">
                        <input type="button" name="" class="btn" value="Edit Permit"-->
                    </div>
                </div>

                <div class="commodity-div box" style="display: none;">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Commodity</th>
                                    <th>Trade Id</th>
                                    <th>Market</th>
                                    <th>Trade Type</th>
                                    <th>Purchase Quantity</th>
                                    <th>Date</th>
                                    <th>Available Quantity</th>
                                    <th>Units</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $dat4 = [];
                                $sad = [];
                                $sd1 = [];
                                foreach($dat2 as $i1=>$d1){
                                    $f = 1;
                                    foreach($dat4 as $i=>$dt){
                                    $d11 = explode(" ",$d1->created_at);
                                    $d1->created_at = $d11[0];
                                        if($dt->cty == $d1->cty){
                                            $sad[$i][] = $d1;
                                            $dt->trade_value += $d1->trade_value;
                                            $dt->m_fee += $d1->m_fee;
                                            $dt->id = $d1->id.",T".$dt->id;
                                            $dt->trade_type = $dt->trade_type.",".$d1->trade_type;
                                            $dt->amc = $dt->amc.",".$d1->amc;
                                            $dt->created_at .= ",".$d1->created_at;
                                            $dt->a_weight += $d1->a_weight;
                                            $dt->weight += $d1->weight;
                                            $dt->trade_value += $d1->trade_value;
                                            $dat4[$i] = $dt;
                                            $f = 0;
                                        }
                                    }
                                    if($f){
                                        $dat4[] = $d1;
                                        $sad[][0] = $d1;
                                        $sd1[] = $i1;
                                    }
                                }
                                @endphp
                                @foreach($dat4 as $i=>$d)
                                <tr  data-toggle="collapse" data-target="#demo{{$i}}" class="accordion-toggle">
                                    <td><button class="btn btn-default btn-xs" style="max-width:9vw;">{{$d->cty}}</button></td>
                                    <td>T{{$d->id}}</td>
                                    <td>{{$d->amc}}</td>
                                    <td>{{$d->trade_type}}</td>
                                    <td>{{$d->weight}}</td>
                                    <td>{{$d->created_at}}</td>
                                    <td>{{$d->a_weight}}</td>
                                    <td>{{$d->qty}}</td>
                                    <td>{{$d->trade_value}}</td>
                                </tr>
                                @foreach($sad[$i] as $j=>$sd)
                                @php
                                if(is_string($sd->id)){
                                    $sd = $dat[$sd1[$i]];
                                } // var_dump($sd1);
                                @endphp
                                <tr id="demo{{$i}}" class="hiddenRow accordian-body collapse">
                                    <td></td>
                                    <td>T{{$sd->id}}</td>
                                    <td>{{$sd->amc}}</td>
                                    <td>{{$sd->trade_type}}</td>
                                    <td>{{$sd->weight}}</td>
                                    <td>{{$sd->created_at}}</td>
                                    <td>{{$sd->a_weight}}</td>
                                    <td>{{$sd->qty}}</td>
                                    <td>{{$sd->trade_value}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <!--input type="button" name="" class="btn" value="Pay Fee">
                        <input type="button" name="" class="btn" value="Create Permit">
                        <input type="button" name="" class="btn" value="Edit Permit"-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include("includes/footer");
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>
</body>

</html>