<?php

namespace App\Http\Controllers;

use App\UserCard;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Paystack;

use Auth;

class UserCardController extends Controller
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
    public function add_card(Request $request)
    {
        //

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {

            dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }  
    

    }

    public function callback_card_add()
    {

        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);


        $user_card = UserCard::create([
            'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
            'last4' => $paymentDetails['data']['authorization']['last4'],
            'exp_month' => $paymentDetails['data']['authorization']['exp_month'],
            'exp_year' => $paymentDetails['data']['authorization']['exp_year'],
            'card_type' => $paymentDetails['data']['authorization']['card_type'],
            'bank' => $paymentDetails['data']['authorization']['bank'],
            'bin' => $paymentDetails['data']['authorization']['bin'],
            'user_id' => Auth::user()->id
        ]);
        
        
        return redirect('/user/my_profile')->with('card_msg', 'Card Added Successfully!!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function show(UserCard $userCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCard $userCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCard $userCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCard $userCard)
    {
        //
    }
}
