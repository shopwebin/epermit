<?php

namespace App\Http\Controllers;
use App\Models\districts_model;
use App\Models\mandals_model;
use App\Models\state_model;
use App\Models\commodity_model;
use App\Models\premit_model;
use App\Models\tradelist_model;
use App\Models\quantity_model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class Trader_applyController extends Controller
{
    public function index(){
        $data['state'] = state_model::get_data();
        $data['commodity'] = commodity_model::get_data();
        $data['quantity'] = quantity_model::get_data();
        // DB::enableQueryLog();
        $data['mfee'] = DB::select('select * from mfee where from_date <= ? AND to_date >= ?', [date('Y-m-d H:m:s',time()),date('Y-m-d H:m:s',time())]);
        // dd(DB::getQueryLog());
        // var_dump($data['mfee']);
        return view('new-trader-creation', $data);
    }

    function view1(){
        $data['state'] = state_model::get_data();
        $data['commodity'] = commodity_model::get_data();
        // $data['districts'] = districts_model::get_data();
        // $data['mandals'] = mandals_model::get_data();
        $data['quantity'] = quantity_model::get_data();
        return $data;
    }

    public function permitCreating()
    {
        $data['state'] = state_model::get_data();
        $data['commodity'] = commodity_model::get_data();
        $data['quantity'] = quantity_model::get_data();
        return view('permit-creation', $data);
    }

    public function permitCreating1($td){
        $trade = new premit_model();
        $data['state'] = state_model::get_data();
        $data['commodity'] = commodity_model::get_data();
        $data['districts'] = districts_model::get_data();
        $data['mandals'] = mandals_model::get_data();
        $data['quantity'] = quantity_model::get_data();
        if ($td[0] == 'T') {
            $data['dat'] = $trade->new(substr($td, 1));
        }
        if ($td[0] == 'P') {
            $data['dat'] = $trade->primary(substr($td, 1));
            // var_dump($td);
            $data['dt'] = explode(' ', $data['dat'][0]->valid_to);
            $data['df'] = explode(' ', $data['dat'][0]->valid_from);
            // var_dump($data['dat']->all()[0]);
            $data['type'] = 'primary';
        }
        return view('primary-permit-creation', $data);
    }

    public function find_weight($id){
        // $query = DB::table('trade')->where('commodity_id',$id)->get(['sum(weight) as wht']);
        $query = DB::select('SELECT sum(`weight`) as wht from  `trade` WHERE `commodity_id` = ' . $id);
        return $query;
    }

    public function add_pre_permit(Request $request){
        $trade = new premit_model();
        $query = $trade->add($request);
        return redirect('print-permit/P'.(string)$query)->with('alert', 'Primary Premit number P' . $query . ' Created Successfully');
    }

    public function retail_sale(Request $request){
        $trade = new tradelist_model();
        $query = $trade->retail_sale($request);
        return redirect('print-permit/R'.(string)$query)->with('alert','Retail permit number R'.$query);
    }

    public function com_value($id){
        $a = DB::select('select * from commodity where com_id = ?', [$id])[0];
        // var_dump('kkk');
        return $a;
    }

    public function com_tc($id){
        var_dump("kkk");
        // $a = DB::select('SELECT * FROM `trade_com` WHERE `tc_id` = ? AND `com_id` = ?',[$tc,$id])[0];
        // return $a;
    }

    public function update_trade(Request $request)
    {
        $input = $request->all();
        $input['trade_id'] = substr($input['trade_id'],1);
        $a = DB::update('update trade set ad1 = ?,ad2 = ?, commodity_id = ?, trade_value=?,m_fee=?,a_weight=? where id = ?', [$input['ad1'],$input['ad2'],$input['com_id'],$input['trade_val'],$input['mfee'],$input['trade_id'],$input['a_weight']]);
        $b = DB::table('p_permit')->insertGetId([
            'c_id'=>$input['com_id'],
            'q_id'=>$input['q_id'],
            'b_qty'=>$input['b_qty'],
            'a_qty'=>$input['a_weight'],
            't_id'=>$input['trade_id'],
            'mfee'=>$input['mfee'],
            'trade_val'=>$input['trade_val'],
            'ad1'=>$input['ad1'],
            'ad2'=>$input['ad2'],
            'veh_no'=>$input['veh_no'],
            'mobile'=>$input['phone'],
            'from_date'=>$input['fd']." ".$input['ft'],
            'to_date'=>$input['td']." ".$input['ft']
        ]);
        return redirect('print-permit/PP'.$b)->with('alert',"Trade processed permit no.-PP".$b." Sucessfully");
    }

    public function print_permit($id)
    {
        $trade = new premit_model();
        $data = [];        
        if ($id[0] == 'P'){
            if($id[1] == 'P'){
                $data['dat'] = $trade->print_processing(substr($id,2))[0];
                // var_dump($data['dat']->to_date);
                $data['dat']->a_weight = $data['dat']->b_qty;
                $data['dat']->value = $data['dat']->trade_val;
                $data['dat']->veh_detail = $data['dat']->veh_no;
                $data['dat']->valid_from = $data['dat']->from_date;
                $data['dat']->valid_to = $data['dat']->to_date;
                $data['dt'] = explode(' ', $data['dat']->to_date);
                $data['df'] = explode(' ', $data['dat']->from_date);
                $data['type'] = 'Commodity Processing ';
            }
            else{
                $data['dat'] = $trade->primary1(substr($id, 1))[0];
                // var_dump($data['dat']);
                $data['dt'] = explode(' ', $data['dat']->valid_to);
                $data['df'] = explode(' ', $data['dat']->valid_from);
                $data['type'] = 'Primary';
            }
        }
        elseif ($id[0] == 'S'){
            $data['dat'] = $trade->secondary1(substr($id, 1))[0];
            // var_dump($data['dat']);
            $data['dat']->value = $data['dat']->amt * $data['dat']->a_weight;
            $data['dat']->veh_detail = $data['dat']->veh_id;
            $data['dat']->valid_to = $data['dat']->to_date;
            $data['dat']->valid_from = $data['dat']->from_date;
            $data['dt'] = explode(' ', $data['dat']->valid_to);
            $data['df'] = explode(' ', $data['dat']->from_date);
            $data['type'] = 'Secondary';
        }
        elseif ($id[0] == 'A'){
            $data['dat'] = $trade->aqua1(substr($id, 1))[0];
            // var_dump($data['dat']);
            $data['dat']->mobile = $data['dat']->phone;
            $data['dat']->a_weight = $data['dat']->qte;
            $data['dat']->veh_detail = $data['dat']->veh_no;
            $data['dat']->valid_from = $data['dat']->created;
            $data['type'] = 'Aqua Export';
        }
        elseif ($id[0] == 'R'){
            $data['dat'] = $trade->retail_print(substr($id, 1))[0];
            $data['dat']->valid_from = $data['dat']->created;
            $data['dat']->a_weight = $data['dat']->a_qty;
            $data['dat']->value = $data['dat']->trade_value;
            $data['type'] = 'Retail';
        }
        return view('secondary-permit',$data);
    }

    public function cancel_permit(Request $request){
        // echo 'kk';
        $trade = new premit_model();
        $data = [];
        $id = $request->all();
        if ($id['id'][0] == 'P'){
            $data['dat'] = $trade->primary1(substr($id['id'],1))[0];
            // var_dump($data);
            $data['dt'] = explode(' ', $data['dat']->valid_to);
            $data['df'] = explode(' ', $data['dat']->valid_from);
            $data['type'] = 'Primary';
            // DB::enableQueryLog();  
            // var_dump($data['dat']);
            if($data['dat']->c_status){                
                DB::update('update trade set a_weight = a_weight + ? where id = ?',[$id['c_qty'],$id['tid']]);
                $query = $trade->pcancel($id);
                $data['dat'] = $trade->primary1(substr($id['id'],1))[0];
            }
        }
        elseif ($id['id'][0] == 'S'){
            $data['dat'] = $trade->secondary1(substr($id['id'], 1))[0];
            $data['dat']->value = $data['dat']->amt * $data['dat']->a_weight;
            $data['dat']->veh_detail = $data['dat']->veh_id;
            $data['dat']->valid_to = $data['dat']->to_date;
            $data['dat']->valid_from = $data['dat']->from_date;
            $data['dt'] = explode(' ', $data['dat']->valid_to);
            $data['df'] = explode(' ', $data['dat']->from_date);
            if($data['dat']->c_status){
                DB::update('update trade set a_weight = a_weight + ? where id = ?',[$data['dat']->a_weight,$data['dat']->t_id]);
                $query = $trade->scancel(substr($id['id'], 1));
            }
            $data['type'] = 'Secondary';
        }
        // dd(DB::getQueryLog());
        return view('secondary-permit',$data);
    }

    public function add_sec_permit(Request $request)
    {
        $trade = new premit_model();
        $query = $trade->add2($request);
        return redirect('print-permit/S'.$query)->with('alert', 'Secoundary Permit number S' . $query . ' Created');
    }

    public function edit_sec_permit(Request $request){
        $trade = new premit_model();
        $query = $trade->edit2($request);
        return redirect()->back()->with('alert','Permit updated Successfully');
    }

    public function secondaryCreating1($td){
        $trade = new premit_model();
        $data['state'] = state_model::get_data();
        $data['commodity'] = commodity_model::get_data();
        $data['districts'] = districts_model::get_data();
        $data['mandals'] = mandals_model::get_data();
        $data['quantity'] = quantity_model::get_data();
        if ($td[0] == 'T') {
            $data['dat'] = $trade->new(substr($td, 1));
            // var_dump($data['dat']);
        }
        if ($td[0] == 'S') {
            $data['dat'] = $trade->secondary(substr($td, 1));
            $data['dt'] = explode(' ', $data['dat'][0]->to_date);
            $data['df'] = explode(' ', $data['dat'][0]->from_date);
            $data['type'] = 'secondary';
        }
        return view('secondary-permit-creation', $data);
    }

    public function edit_pre_permit($id, Request $request){
        $input = $request->all();
        $data = [];
        if(isset($input['submit'])){
            $submit = $input['submit'];
            unset($input['submit']);
            if($submit == 'SOS'){
                $input['c_status']=2;
            } elseif($submit == 'Early Arrival') {
                $input['c_status']=3;
            }
        }
        $input['valid_from'] = $input['fd'].' '.$input['ft'];
        $input['valid_to'] = $input['td'].' '.$input['tt'];
        $id = $input['id'];
        DB::update('update `trade` set `a_weight` = ? where `id` = ?',[$input['bal_qty'],$input['t_id']]);
        unset($input['bal_qty']);
        // unset($input['trade_id']);
        unset($input['_token']);
        unset($input['fd']);
        unset($input['ft']);
        unset($input['td']);
        unset($input['tt']);
        // DB::enableQueryLog();
        $trade1 = DB::table('permit')->where('id', $id)->update($input);
        // dd(DB::getQueryLog());
        if(isset($submit)){
            $trade = new premit_model();
            $data['dat'] = $trade->primary1($id)[0];
            $data['dt'] = explode(' ', $data['dat']->valid_to);
            $data['df'] = explode(' ', $data['dat']->valid_from);
            $data['type'] = 'Primary';
            return view('secondary-permit',$data);
        }else{
            return redirect('trade-list')->with('alert', 'Primary Premit updated Successfully');
        }
    }

    public function edit($id = null){
        $i = 1;
        if($id != null){
            $i = '`trade`.`id` = '.substr($id,1);
        }
        $data['state'] = state_model::get_data();
        $data['commodity'] = commodity_model::get_data();
        $data['districts'] = districts_model::get_data();
        $data['mandals'] = mandals_model::get_data();
        // $data['view'] = DB::select('select trade.*,commodity.*,quantity.qty_name,trader_apply.id as trader_id,trade_com.* from trade JOIN trade_com on trade_com.t_id = trade.id JOIN commodity on commodity.com_id = trade_com.com_id join quantity on quantity.id = trade_com.q_id Join trader_apply on trader_apply.id = trade.trader_id  where '.$i);
        $data['view'] = DB::select('select trade.*,trader_apply.id as trader_id from trade Join trader_apply on trader_apply.id = trade.trader_id  where '.$i);
        foreach($data['view'] as $i=>$d){
            $data['view'][$i]->tc = DB::select('select trade_com.*,commodity.*,quantity.qty_name from trade_com join quantity on quantity.id = trade_com.q_id join commodity on commodity.com_id = trade_com.com_id where trade_com.t_id = '.$d->id);
        }
        // $data['qty_amt'] = DB::select('select sum(`a_weight`) as a_qty from trade where commodity_id = '.$data['view'][0]->com_id." group by commodity_id ");
        $data['mfee'] = DB::select('select * from mfee where from_date <= ? && to_date >= ?', [date('Y-m-d H:m:s',time()),date('Y-m-d H:m:s',time())]);
        return view('edit-trade',$data);
    }

    public function pay($id){
        if($id = 'all'){
            DB::update('update trade set p_status = p_status+1 where p_status = 0 or p_status = 2');
            return redirect()->back()->with('alert',"Paid Successfully");
        }else{
        $a['p_status'] = 1;
        DB::table('trade')->where('id',$id)->update($a);
        // return redirect()->back()->with('alert',"Paid Successfully");
        return view('pay');
        /* 
            DB::enableQueryLog();
            $sql = DB::getQueryLog();
            $query = end($sql);
            var_dump($query);
            return $query; */
        }
    }

    public function add(Request $request){
        /*$this->validate($request,[
            'seller_name' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'mandal_id' => 'required',
            'commodity_id' => 'required',
            'quantity_id' => 'required',
            'weight' => 'required',
            'trade_value' => 'required',
            'm_fee' => 'required',
            'trade_type' => 'required'
            // var_dump($request->all());
            // return $this->show();
        ]);*/
        // $request->request->add(['a_weight' => $request->all()['weight']]);
        $trade = new tradelist_model();
        $query = $trade->add($request);
        if($query['paid']){
            return redirect('trade-list')->with('alert', 'Trade number T'.$query['id'].' added and Market fee paid Sucessfully.');
        }   else    {
            return redirect('trade-list')->with('alert', 'Trade number T'.$query['id'].' added but Market fee not Paid.');
        }
    }

    public function show()
    {
        $trade = new tradelist_model();
        $data['dat'] = $trade->show();
        // var_dump($data);
        return view('trade-list', $data);
    }

    public function convert(Request $request){
        $trade = new tradelist_model();
        $dat = $trade->convert($request);
        return redirect("trade-list")->with('alert','New trade id is T'.$dat->id)->with('dat',$dat);
    }

    public function aqua_export(Request $request){ 
        $trade = new tradelist_model();
        $trade->ae_update($request);
        $permit = new premit_model();
        $id = $permit->ae_update($request);
        return redirect('print-permit/A'.$id)->with('alert','Aqua Export Permit Created.Premit No. A'.$id);
    }

    public function find_trader($id){
        $trade = new tradelist_model();
        $temp = $trade->find_trader($id);
        return $temp;
    }

    public function trader_transfer(Request $request)
    {        
        $trade = new tradelist_model();
        $temp = $trade->transfer_trader($request);
        return redirect()->back()->with('alert','Transfer Sucessful with trade id as T'.$temp);
    }

    public function trade_history_date(Request $request){
        $trade = new tradelist_model();
        $temp = $trade->history($request);
        // var_dump($temp);
        return redirect('historical-trade')->with('trade',$temp);
    }

    public function payment(Request $request)
    {
        $input = $request->all();
        $data['dat'] = $input;
        return view('ccavenue',$data);
    }
}
