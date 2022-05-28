<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mandals_model extends Model
{
    use HasFactory;
    
    public static function get_data(){
        $mandals = DB::table('mandals')->get();
        return $mandals;
    }
}
