<?php

namespace App\Http\Controllers;

use App\BackLog;

use App\UserWallet;

use App\Notification;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Paystack;

use Auth;

class BackLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay_backlog(Request $request)
    {
        //


        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {

            dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }  
    }

    public function callback_pay_backlog()
    {
        # code...


        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);


        $backlog = BackLog::create([
            'user_id' => $paymentDetails['data']['metadata']['user_id'],
            'package_name' => $paymentDetails['data']['metadata']['package_name'],
            'custom_name' => $paymentDetails['data']['metadata']['custom_name'],
            'backlog_amount' => $paymentDetails['data']['metadata']['backlog_amount'],
            
        ]);


        $userwallet = UserWallet::create([
            'user_id' => $paymentDetails['data']['metadata']['user_id'],
            'amount' => $paymentDetails['data']['metadata']['backlog_amount'],
            'type' => 'credit',
            'description' => 'Backlog Payment',
            'custom_name' => $paymentDetails['data']['metadata']['custom_name'],
            'package_name' => $paymentDetails['data']['metadata']['package_name'],
            
        ]);

       $notifications = Notification::create([
                'user_id' => $paymentDetails['data']['metadata']['user_id'],
                'title' => 'December Jollification',
                'subject' => 'December Jollification Notification',
                'body' => 'Backlog for ' .$paymentDetails['data']['metadata']['custom_name'] .' of ' .$paymentDetails['data']['metadata']['backlog_amount'] .' has been paid successfully', 
               
            ]);


        
        
        return back()->with('backlog_msg', 'Backlog Payments Cleared!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BackLog  $backLog
     * @return \Illuminate\Http\Response
     */
    public function show(BackLog $backLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BackLog  $backLog
     * @return \Illuminate\Http\Response
     */
    public function edit(BackLog $backLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BackLog  $backLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackLog $backLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BackLog  $backLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackLog $backLog)
    {
        //
    }
}
