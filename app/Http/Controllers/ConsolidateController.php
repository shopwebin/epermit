<?php

namespace App\Http\Controllers;

use App\Models\tradelist_model;
use Illuminate\Http\Request;

class ConsolidateController extends Controller
{
    public function consolidate_payment(){
        $con = new tradelist_model();
        $data['dat'] = $con->cons_pay();
        return view('multi-commodity-consolidated-payments',$data);
    }

    public function group_trade()
    {
        $con = new tradelist_model();
        $data['dat'] = $con->show();
        $data['dat1'] = $con->show();
        $data['dat2'] = $con->show();
        return view('histrorical-trade-for-group-trades',$data);
    }
}
