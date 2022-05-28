<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmcController extends Controller
{
    static function find($id){
        $name = DB::table('amc')->where('district_id',$id)->get();
        return $name;
    }
}
