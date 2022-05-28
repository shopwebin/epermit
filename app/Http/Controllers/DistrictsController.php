<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictsController extends Controller
{
    static function find($id){
        $name = DB::table('districts')->where('state_id',$id)->get();
        return $name;
    }
}
