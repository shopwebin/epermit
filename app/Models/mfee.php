<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mfee extends Model
{
    use HasFactory;

    public function add($request)
    {
        DB::table('mfee')->insertGetId([
            'percent' => $request->input('percent'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date')
        ]);
        return 1;
    }
    public function mfee_update($request)
    {
        DB::update('update mfee set percent = ?,from_date = ?,to_date = ? where id = ?', [$request->input('percent'),$request->input('from_date'),$request->input('to_date'),$request->input('id')]);
        return 1;
    }
}
