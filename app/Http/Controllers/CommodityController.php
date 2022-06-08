<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommodityController extends Controller
{
    static function find($id){
        $name = DB::table('commodity')->where('com_id',$id)->get();
        return $name;
    }
    public function com_val(Request $request)
    {
        $input = $request->all();
        // var_dump($input);
        // DB::enableQueryLog();
        $a = DB::table('commodity')->where('com_id',$input['com'])->get('com_name')[0]->com_name;
        $name = DB::table('commodity')->where('com_name',$a)->where('q_id',$input['qty'])->get('amt');
        // $name = var_dump(DB::getQueryLog());
        return $name;
    }
}
