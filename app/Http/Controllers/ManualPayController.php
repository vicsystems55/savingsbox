<?php

namespace App\Http\Controllers;

use App\ManualPay;

use Illuminate\Http\Request;

use App\BackLog;

use App\UserWallet;

use App\Notification;

use App\PaymentSchedule;



use Illuminate\Support\Facades\Redirect;

use Paystack;

use Auth;

class ManualPayController extends Controller
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
    public function manual_pay(Request $request)
    {
        //

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {

            dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }  
    }

    public function callback_manual_pay(Request $request)
    {
        //

        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);

        PaymentSchedule::where('id', $paymentDetails['data']['metadata']['schedule_id'] )->update([
            'status' => 'processed',
            'deducted_amount' => $paymentDetails['data']['metadata']['amount']
        ]);


        $userwallet = UserWallet::create([
            'user_id' => $paymentDetails['data']['metadata']['user_id'],
            'amount' => $paymentDetails['data']['metadata']['amount'],
            'type' => 'credit',
            'description' => 'Manual Payment',
            'custom_name' => $paymentDetails['data']['metadata']['custom_name'],
            'package_name' => $paymentDetails['data']['metadata']['package_name'],
            
        ]);

       $notifications = Notification::create([
                'user_id' => $paymentDetails['data']['metadata']['user_id'],
                'title' => 'Manual Payment',
                'subject' => 'December Jollification Notification',
                'body' => 'Payment for ' .$paymentDetails['data']['metadata']['custom_name'] .' of ' .$paymentDetails['data']['metadata']['amount'] .' has been paid successfully', 
               
            ]);


        
        
        return redirect('/user/payment_schedule/'.$paymentDetails['data']['metadata']['custom_name'])->with('manual_pay_msg', 'Payments was successful!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManualPay  $manualPay
     * @return \Illuminate\Http\Response
     */
    public function show(ManualPay $manualPay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManualPay  $manualPay
     * @return \Illuminate\Http\Response
     */
    public function edit(ManualPay $manualPay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManualPay  $manualPay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManualPay $manualPay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManualPay  $manualPay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManualPay $manualPay)
    {
        //
    }
}
