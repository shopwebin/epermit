<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class state_model extends Model
{
    use HasFactory;

    public static function get_data(){
        $state = DB::table('states')->get();
        return $state;
    }
}
