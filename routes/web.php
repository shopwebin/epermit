<?php

use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MandalsController;
use App\Http\Controllers\Trader_applyController;
use App\Http\Controllers\AmcController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\ConsolidateController;
use App\Mail\MyTestMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/new-trader-creation', [Trader_applyController::class,'index']);

Route::get('/edit-trade', [Trader_applyController::class,'edit']);

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/permit-creation',  [Trader_applyController::class,'permitCreating']);


Route::get('/historical-trade', function () {
    return view('historical-trade');
});

Route::get('/primary-permit-creation', function () {
    return view('primary-permit-creation');
});


Route::get('/secondary-permit-creation', function () {
    return view('secondary-permit-creation');
});

Route::get('/edit-trade-for-multicommodities', function () {
    return view('edit-trade-for-multicommodities');
});

/*Route::get('/printavle-permit', function () {
    return view('printavle-permit');
});*/

Route::get('/market_fee',[AdminController::class,'mfee']);

Route::get('/quantity',[AdminController::class,'qty']);

Route::get('/commodity',[AdminController::class,'com']);

Route::get('/multi-commodity-consolidated-payments',[ConsolidateController::class,'consolidate_payment']);

Route::get('/histrorical-trade-for-group-trades',[ConsolidateController::class,'group_trade']);

Route::get('/commodity/edit/{id}',[AdminController::class,'com_edit']);

Route::get('/commodity/delete/{id}',[AdminController::class,'com_del']);

Route::get('/district/{id}',[DistrictsController::class,'find']);

Route::get('/mandal/{id}', [MandalsController::class,'find']);

Route::get('/amc/{id}', [AmcController::class,'find']);

Route::get('/secondary-permit-creation/{id}', [Trader_applyController::class,'secondaryCreating1']);

Route::get('/commodity_weight/{id}', [Trader_applyController::class,'find_weight']);

Route::get('/trade-list', [Trader_applyController::class,'show']);

Route::get('/permit-creation/{id}',  [Trader_applyController::class,'permitCreating1']);

Route::get('/pay/{id}', [Trader_applyController::class,'pay']);

Route::get('/edit-trade/{id}',[Trader_applyController::class,'edit']);

Route::get('/trader/{id}',[Trader_applyController::class,'find_trader']);

Route::get('/print-permit/{id}',[Trader_applyController::class,'print_permit']);

// Route::get('/cancel-permit/{id}',[Trader_applyController::class,'cancel_permit']);

Route::get('/com_value/{id}',[Trader_applyController::class,'com_value']);

Route::get('/quantity/edit/{id}', [AdminController::class,'qty_edit']);

Route::get('/quantity/delete/{id}', [AdminController::class,'qty_delete']);

Route::get('/market_fee/edit/{id}', [AdminController::class,'mfee_edit']);

Route::get('/market_fee/delete/{id}', [AdminController::class,'mfee_delete']);

/*Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    $user['to']='97zg42wqil@popcornfly.com';
    Mail::to('97zg42wqil@popcornfly.com')->send(new \App\Mail\MyTestMail($details));
   /*Mail::send('mail',$details,function($message) use ($user){
       $message->to($user['to']);
       $message->subject('hello Details');
   });
    dd("Email is Sent.");
});*/
// Route::post('/send-mail',[AdminController::class,'send_mail']);

Route::get('/send-mail',[AdminController::class,'send_mail']);

/*Route::get('/send-mail',function(){
    // Mail::to('97zg42wqil@popcornfly.com')->send(new MyTestMail());
    // return new MyTestMail();
    Mail::to('97zg42wqil@popcornfly.com')->send(new WelcomeMail());
    return new WelcomeMail();
});*/

Route::post('/pay',[Trader_applyController::class,'payment']);

Route::post('/cancel-permit',[Trader_applyController::class,'cancel_permit']);

Route::post('/history_trade_date',[Trader_applyController::class,'trade_history_date']);

Route::post('/retail_sale',[Trader_applyController::class,'retail_sale']);

Route::post('/update_trade',[Trader_applyController::class,'update_trade']);

Route::post('/trader_transfer',[Trader_applyController::class,'trader_transfer']);

Route::post('/edit-trade/convert',[Trader_applyController::class,'convert']);

Route::post('/edit-trade/aqua_export',[Trader_applyController::class,'aqua_export']);

Route::post('/permit/primary/add', [Trader_applyController::class,'add_pre_permit']);

Route::post('/secondary/permit/add', [Trader_applyController::class,'add_sec_permit']);

Route::post('/secondary/permit/edit',[Trader_applyController::class,'edit_sec_permit']);

Route::post('/permit/primary/edit/{id}', [Trader_applyController::class,'edit_pre_permit']);

Route::post('/trade-list/add', [Trader_applyController::class,'add']);

Route::post('/trade-list', [Trader_applyController::class,'show']);

Route::post('/com_val',[CommodityController::class,'com_val']);

Route::post('/commodity/add',[AdminController::class,'com_add']);

Route::post('/commodity/update',[AdminController::class,'com_update']);

Route::post('/quantity/add', [AdminController::class,'qty_add']);

Route::post('/quantity/update', [AdminController::class,'qty_update']);

Route::post('/market_fee/add', [AdminController::class,'mfee_add']);

Route::post('/market_fee/update', [AdminController::class,'mfee_update']);

// Route::get('/trade', [Trader_applyController::class,'show']);
