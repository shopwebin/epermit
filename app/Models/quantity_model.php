<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class quantity_model extends Model
{
    use HasFactory;

    public static function get_data(){
        $quantity = DB::table('quantity')->get();
        return $quantity;
    }

    public function add($request){
        DB::table('quantity')->insertGetId([
            'qty_name' => $request->input('qty_name'),
            'qty_description' => $request->input('qty_description')
        ]);
        return 1;
    }

    public function qty_update($request){
        DB::update('update quantity set qty_name = ?,qty_description = ? where id = ?', [$request->input('qty_name'),$request->input('qty_name'),$request->input('id')]);
        return 1;
    }

}
