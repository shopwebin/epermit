<?php

namespace App\Http\Controllers;

use App\Models\commodity_model;
use App\Models\quantity_model;
use App\Models\mfee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    static function com(){
        $data['qty'] = quantity_model::get_data();
        $data['com'] = DB::table('commodity')->join('quantity','quantity.id','=','commodity.q_id')->orderByDesc('com_name')->orderByDesc('dt')->get();
        return view('commodity',$data);
    }
    
    public function com_add(Request $request){
        $com = new commodity_model();
        $query = $com->add($request);
        return redirect()->back()->with('alert','Commodity Added Sucessfully');        
    }
    
    public function com_edit($id){
        $data['dat'] = DB::table('commodity')->where('com_id',$id)->get();
        $data['qty'] = quantity_model::get_data();
        $data['com'] = DB::table('commodity')->join('quantity','quantity.id','=','commodity.q_id')->orderByDesc('com_name')->orderByDesc('dt')->get();
        return view('commodity',$data);
    }
    
    public function com_update(Request $request){
        $input = $request->all();
        $input['updated_at'] = date('Y-m-d h:m:s',time());
        unset($input['_token']);
        unset($input['submit']);
        DB::table('commodity')->where('com_id',$input['com_id'])->update($input);
        return redirect()->back()->with('alert',$input["com_name"].' updated Successfully');
    }
    
    public function com_del($id){
        DB::table('commodity')->where('com_id',$id)->delete();
        return redirect()->back()->with('alert','Commodity Deleted Successfully');
    }
    
    static function mfee(){
        $data['mfee'] = DB::select('select * from mfee where ?', [1]);
        return view('mfee',$data);
    }

    public function mfee_edit($id){
        $data['mfee'] = DB::select('select * from mfee where ?', [1]);
        $data['form'] = DB::select('select * from mfee where id = ?', [$id]);
        return view('mfee',$data);
    }

    public function mfee_delete($id){
        DB::delete('delete from mfee where id = ?', [$id]);
        return redirect()->back()->with('alert','Market Fee Deleted Sucessfully');
    }

    public function mfee_add(Request $request){
        $mfee = new mfee();
        $query = $mfee->add($request);
        return redirect()->back()->with('alert','Market fee Added Sucessfully');
    }

    public function mfee_update(Request $request){
        $mfee = new mfee();
        $query = $mfee->mfee_update($request);
        return redirect('market_fee')->with('alert','Updated Sucessfully');
    }
    static function qty(){
        $data['quantity'] = DB::select('select * from quantity where ?', [1]);
        return view('quantity',$data);
    }

    public function qty_edit($id){
        $data['quantity'] = DB::select('select * from quantity where ?', [1]);
        $data['form'] = DB::select('select * from quantity where id = ?', [$id]);
        return view('quantity',$data);
    }

    public function qty_delete($id){
        DB::delete('delete from quantity where id = ?', [$id]);
        return redirect()->back()->with('alert','Quantity Deleted Sucessfully');
    }

    public function qty_add(Request $request){
        $mfee = new quantity_model();
        $query = $mfee->add($request);
        return redirect()->back()->with('alert','Quantity Added Sucessfully');
    }

    public function qty_update(Request $request){
        $mfee = new quantity_model();
        $query = $mfee->qty_update($request);
        return redirect('quantity')->with('alert','Updated Sucessfully');
    }

    public function send_mail()
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        $data=['name'=>"temp","data"=>"tesating"];
        $user['to']='t50bh8vfsj@blondemorkin.com';
        // Mail::to('nidavew271@runchet.com')->send(new \App\Mail\MyTestMail($details));
        Mail::send('emails.myTestMail',$data,function($message) use ($user){
           $message->to($user['to']);
           $message->from('amcolms@gmail.com','amcolms@gmail.com');
           $message->subject("Hello Dev");
        });
    }

}