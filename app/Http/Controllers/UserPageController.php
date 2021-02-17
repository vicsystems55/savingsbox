<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserProfile;

use App\PaymentSchedule;

use App\Notification;

use App\UserWallet;

use App\UserCard;

use Auth;

class UserPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
            $my_wallet_cr = UserWallet::where('user_id', Auth::user()->id)->where('type','credit')->sum('amount');

            $my_wallet_db = UserWallet::where('user_id', Auth::user()->id)->where('type','debit')->sum('amount');

            $my_wallet_bal = $my_wallet_cr - $my_wallet_db;

            $my_subscriptions = PaymentSchedule::with('packages')->where('user_id', Auth::user()->id)->latest()->get()->unique('custom_name');

            // $payment_custom = PaymentSchedule::where('custom_name', $payment_schedule[0]->custom_name)->latest()->get();

            // dd($my_subscriptions);

        return view('users.dashboard',[
            'my_subscriptions' => $my_subscriptions,
            'my_wallet_bal' =>  $my_wallet_bal
        ])->with($data);
    }

    public function my_subscriptions()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

            $my_subscriptions = PaymentSchedule::with('packages')->where('user_id', Auth::user()->id)->latest()->get()->unique('custom_name');

            // $payment_custom = PaymentSchedule::where('custom_name', $payment_schedule[0]->custom_name)->latest()->get();

            // dd($my_subscriptions);

        return view('users.my_subscriptions',[
            'my_subscriptions' => $my_subscriptions
        ])->with($data);
    }

    public function single_subscriptions($custom_name)
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

            $single_subscription = PaymentSchedule::with('packages')->where('user_id', Auth::user()->id)->where('custom_name', $custom_name)->get();

            // $payment_custom = PaymentSchedule::where('custom_name', $payment_schedule[0]->custom_name)->latest()->get();

            // dd($my_subscriptions);

        return view('users.single_subscription',[
            'single_subscription' => $single_subscription
        ])->with($data);
    }


    public function notifications()
    {
        //

        $my_notifications = Notification::where('user_id', Auth::user()->id)->get();

        $data = [
            'category_name' => 'components',
            'page_name' => 'list_group',
            'has_scrollspy' => 1,
            'scrollspy_offset' => 100,

        ];

        return view('users.notifications', [
            'notifications' => $my_notifications
        ])->with($data);
    }


    public function reliance_packages()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'Reliance_Packages',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.reliance_packages')->with($data);
    }

    public function single_package()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'Single_Package',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.single_package')->with($data);
    }

    public function subscription_setup($plan)
    {

        if ($plan == 'plan_a') {
            # code...

            $plan_name = "PLAN A";
            $deduction_amount = '1550';
        }

        if ($plan == 'plan_b') {
            # code...
            $plan_name = "PLAN B";
            $deduction_amount = '3100';
        }

        if ($plan == 'plan_c') {
            # code...
            $plan_name = "PLAN C";
            $deduction_amount = '6200';
        }

        if ($plan == 'plan_d') {
            # code...

            $plan_name = "PLAN D";
            $deduction_amount = '15500';
        }

        if ($plan == 'plan_e') {
            # code...
            $plan_name = "PLAN E";
            $deduction_amount = '31000';
        }

      

        $user_cards = UserCard::where('user_id', Auth::user()->id)->latest()->get();

        $data = [
            'category_name' => 'forms',
            'page_name' => 'date_range_picker',
            'has_scrollspy' => 1,
            'scrollspy_offset' => 100,

        ];
        // $pageName = 'date_range_picker';
        return view('users.subscription_setup',[
            'user_cards' => $user_cards,
            'plan_name' => $plan_name,
            'deduction_amount' => $deduction_amount
        ])->with($data);
    }

    public function settings()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.settings')->with($data);
    }

    public function my_profile()
    {
        //

        $user_data = UserProfile::where('user_id', Auth::user()->id)->first();

        $user_cards = UserCard::where('user_id', Auth::user()->id)->get();

         // $category_name = '';
         $data = [
            'category_name' => 'users',
            'page_name' => 'account_settings',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',

        ];
        // $pageName = 'account_settings';
        return view('users.my_profile', [
            'user_data' => $user_data,
            'user_cards' => $user_cards
        ])->with($data);
    }


    public function support()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.support')->with($data);
    }


    public function single_support()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.single_support')->with($data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
