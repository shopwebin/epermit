<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandalsController extends Controller
{
    static function find($id){
        $name = DB::table('mandals')->where('district_id',$id)->get();
        return $name;
    }
}
