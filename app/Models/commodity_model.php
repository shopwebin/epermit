<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class commodity_model extends Model {
    use HasFactory;

    public static function get_data(){
        // SELECT *,MAX(amt) as amt1 FROM `commodity` WHERE df <= CURRENT_DATE && dt >= CURRENT_DATE GROUP BY `com_name`;
        // $commodity = DB::table('commodity')->join('quantity','quantity.id','=','commodity.q_id')->groupBy('com_name')->where('dt','>=','CURRENT_DATE')->where('df','<=','CURRENT_DATE')->get('*','max(amt) as mamt');
        $commodity = DB::table('commodity')->join('quantity','quantity.id','=','commodity.q_id')->where('dt','>=',Carbon::today())->where('df','<=',Carbon::today())->get('*','max(amt) as mamt')->all();
        $com=array();
        foreach($commodity as $c){
            $f = 1;
            foreach($com as $key=>$c2){
                if($c->com_name == $c2->com_name){
                    if($c->amt > $c2->amt){     $com[$key] = $c;    }
                    $f=0;
                }
            }
            if($f){   $com[] = $c;    }
        }
        $commodity = $com;
        // var_dump($commodity);
        return $commodity;
    }

    public function add($request){
        DB::table('commodity')->insertGetId([
            'com_name' => strtoupper($request->input('com_name')),
            'com_description' => $request->input('com_description'),
            'amt' => $request->input('amt'),
            'dt' => $request->input('dt'),
            'df' => $request->input('df'),
            'q_id' => $request->input('q_id')
        ]);
        return 1;
    }
}
