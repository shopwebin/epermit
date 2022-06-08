<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

class tradelist_model extends Model
{
    use HasFactory;
    public static function add($request){
        $query['paid'] = $request->input('p_status');
        $query['id'] = DB::table('trade')->insertGetId([
            'seller_name' => $request->input('seller_name'),
            'state_id' => $request->input('state'),
            'district_id' => $request->input('district'),
            'mandal_id' => $request->input('mandal'),
            'commodity_id' => $request->input('commodity'),
            'quantity_id' => $request->input('quantity'),
            'weight' => $request->input('weight'),
            'a_weight' => $request->input('a_weight'),
            'trade_value' => $request->input('trade_value'),
            'm_fee' => $request->input('m_fee'),
            'amc_id' => $request->input('amc'),
            'p_status' => $query['paid'],
            'trade_type' => $request->input('trade_type'),
            'trader_id' => 4,
        ]);
        return $query;
    }

    public function transfer_trader($request)
    {
        $trade = DB::table('trade')->insertGetId([
            'seller_name' => $request->input('name'),
            'ad1' => $request->input('ad1'),
            'ad2' => $request->input('ad2'),
            'state_id' => $request->input('state_id'),
            'district_id' => $request->input('dis_id') ,
            'mandal_id' => $request->input('mdl_id') ,
            'commodity_id' => $request->input('commodity_id') ,
            'quantity_id' => $request->input('quantity_id') ,
            'weight' => $request->input('qtt'),
            'a_weight' =>   $request->input('qtt'),
            'trade_type'=> $request->input('trade_type'),
            'trade_value' => $request->input('trade_value'),
            'm_fee' => ($request->input('trade_value')/50),
            'amc_id' => $request->input('amc_id'),
            'p_status' => $request->input('p_status'),
            'trader_id' => $request->input('trader_id'),
        ]);
        return $trade;
    }

    public function convert($request){
        $id = $request->input('id');
        $dat = DB::select('select * from trade where id = '.$id)[0];
        // var_dump($dat);
        $w = $request->input('a_weight');
        $tv = ($w*$dat->trade_value)/$dat->weight;
        $intdat = DB::table('trade')->insertGetId([
            'seller_name' => $dat->seller_name ,
            'state_id' => $dat->state_id ,
            'district_id' => $dat->district_id ,
            'mandal_id' => $dat->mandal_id ,
            'commodity_id' => $dat->commodity_id ,
            'quantity_id' => $dat->quantity_id ,
            'weight' => $w,
            'a_weight' =>   $w,
            'trade_type'=> $request->input('trade_type'),
            'trade_value' => $tv,
            'm_fee' => ($tv/50),
            'amc_id' => $dat->amc_id,
            'p_status' => $dat->p_status,
            'trader_id' => 4,
        ]);
        DB::update('update trade set a_weight = a_weight-'.$w.', weight = weight-'.$w.',trade_value=trade_value - '.$tv.',m_fee = m_fee - '.($tv/50).' where id = ? and trader_id = 4', [$id]);
        DB::delete('DELETE FROM `trade` WHERE `weight` = 0');
        return  DB::select('select * from trade where id = '.$intdat)[0];
    }

    public function retail_sale($request){
        $id = DB::table('retail')->insertGetId([
            'name' => $request->input('name'),
            'rad1' => $request->input('rad1'),
            'rad2' => $request->input('rad2'),
            'a_qty' => $request->input('a_weight'),
            'ad1' => $request->input('ad1'),
            'ad2' => $request->input('ad2'),
            'st_id' => $request->input('state_id'),
            'dis_id' => $request->input('dis_id'),
            'mdl_id' => $request->input('mdl_id'),
            'amc_id' => $request->input('amc_id'),
            'invoice' => $request->input('invoice'),
            'trade_id' => $request->input('trade_id'),
            'trade_value' => $request->input('trade_value'),
            'com_name' => $request->input('com_name'),
            'mobile' => $request->input('mobile'),
            'veh_detail' => $request->input('veh_detail'),
            'trader_id' => 4,
        ]);
        DB::update('update trade set a_weight = a_weight - ? where id = ?', [$request->input('a_weight'),$request->input('trade_id')]);
        return $id;
    }

    public function ae_update($request){
        return DB::update('update trade set ad1 = ?,ad2 = ?  where id = ?', [$request->input('ad1'),$request->input('ad2'),$request->input('id')]);
    }

    public static function show(){
        // DB::enableQueryLog();
        $dat = DB::select('SELECT `trade`.*,`quantity`.`qty_name` as `qty`,`commodity`.`com_name` as `cty` ,`amc`.`name` as `amc` FROM `trade` JOIN `amc` on `amc`.`id` = `trade`.`amc_id` JOIN `commodity` on `commodity`.`com_id` = `commodity_id` JOIN `quantity` on `quantity`.`id` = `quantity_id` Order By trade.id DESC');
        $i=0;
        foreach($dat as $d){
            $id = $d->id;            
            $dat[$i]->sec = DB::table('spermit')->where('t_id',$id)->where('c_status',1)->get('id')->all();
            $i++;
        }
        // dd(DB::getQueryLog());
        return $dat;
    }

    public static function find_trader($id){
        $list = DB::table('trader_apply')->where('mobile','like','%'.$id.'%')->orWhere('alternate_mobile','like','%'.$id.'%')->orWhere('lic_no','like','%'.$id.'%')->get('*')->all();
        return $list;
    }

    public function history($request){
        // $dat = DB::table('trade')->join('amc','amc.id','=','trade.amc_id')->join('commodity','commodity.com_id','=','trade.commodity_id')->join('quantity','quantity.id','=','quantity_id')->where('trade.created_at','>=',$request->input('fd'))->where('trade.created_at','<=',$request->input('td'))->get('trade.*,amc.name as amc1,commodity.*,quantity.qty_name')->all();
        
        $dat = DB::select('select trade.*,amc.name as amc1,commodity.*,quantity.qty_name from trade inner join amc on amc.id = trade.amc_id inner join commodity on commodity.com_id = trade.commodity_id inner join quantity on quantity.id = quantity_id where trade.created_at >= ? and trade.created_at <= ? and trader_id = 4 order by trade.created_at asc', [date('Y-m-d',strtotime($request->input('fd'))),date('Y-m-d',strtotime($request->input('td')))]);
        return $dat;
    }

    public function cons_pay(){
        $dat = DB::select('select trade.*,commodity.com_name,quantity.qty_name,amc.name as amc_name from trade join amc on amc.id = trade.amc_id join commodity on commodity.com_id = trade.commodity_id join quantity on quantity.id = trade.quantity_id WHERE 1');
        // $dat = DB::select('select trade.*,commodity.com_name,quantity.qty_name,amc.name as amc_name from trade join amc on amc.id = trade.amc_id join commodity on commodity.com_id = trade.commodity_id join quantity on quantity.id = trade.quantity_id WHERE trade.p_status%2=0');
        return $dat;
    }
}
