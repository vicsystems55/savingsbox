<?php

namespace App\Http\Controllers;

use App\PaymentSchedule;

use App\UserCard;

use App\UserProfile;

use Carbon\Carbon;

use Auth;

use Illuminate\Http\Request;

class PaymentScheduleController extends Controller
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
    public function payment_schedule($custom_name)
    {
        //
        $my_schedule = PaymentSchedule::where('custom_name', $custom_name)->get();

       

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.payment_schedule', [
            'my_schedule' => $my_schedule
        ])->with($data);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_payment_schedule(Request $request)
    {
        //

        $this->validate($request, [

            'authorization_code' => 'required',
            'custom_name' => 'unique:payment_schedules'

 
        ]);

            

        $profile_data = UserProfile::where('user_id', Auth::user()->id)->first();

        // dd($profile_data);

        

        $start_date = new Carbon($request->start_date);

        $date = new Carbon($request->start_date);
        
        $end_date = new Carbon( Carbon::now()->format('Y') .':11:01 11:53:20');



        $diff_in_months = $end_date->diffInMonths($start_date);


        $diff_in_days = $end_date->diffInDays($start_date);


        $diff_in_weeks = $end_date->diffInWeeks($start_date);



        if ($request->frequency == 'Monthly') {
            # code...

            for ($i=0; $i <= $diff_in_months + 1  ; $i++) { 
                # code...
               
    
                $payment_schedule = PaymentSchedule::updateOrCreate(
                    [
                    'user_id' => Auth::user()->id,
                    'package_id' => '1',
                    'profile_id' => $profile_data->id,
                    'date' => $date,
                    'custom_name' => $request->custom_name,
                    'end_date' => $end_date,
                    'deduction_amount' => $request->deduction_amount,
                    'frequency' => $request->frequency,
                    'authorization_code' => $request->authorization_code,
                    'start_date' => $request->start_date,
                    
                ]);
    
                $date = $date->addMonths(1);
    
            }
        }

        if ($request->frequency == 'Weekly') {
            # code...

            for ($i=0; $i <= $diff_in_weeks + 1  ; $i++) { 
                # code...
               
    
                $payment_schedule = PaymentSchedule::updateOrCreate(
                    [
                    'user_id' => Auth::user()->id,
                    'package_id' => '1',
                    'profile_id' => $profile_data->id,
                    'date' => $date,
                    'custom_name' => $request->custom_name,
                    'end_date' => $end_date,
                    'deduction_amount' => '390',
                    'frequency' => $request->frequency,
                    'authorization_code' => $request->authorization_code,
                    'start_date' => $request->start_date,
                    
                ]);
    
                $date = $date->addWeeks(1);
    
            }
        }

        if ($request->frequency == 'Daily') {
            # code...
            for ($i=0; $i <= $diff_in_days + 1  ; $i++) { 
                # code...
               
    
                $payment_schedule = PaymentSchedule::updateOrCreate(
                    [
                    'user_id' => Auth::user()->id,
                    'package_id' => '1',
                    'profile_id' => $profile_data->id,
                    'date' => $date,
                    'custom_name' => $request->custom_name,
                    'end_date' => $end_date,
                    'deduction_amount' => '50',
                    'frequency' => $request->frequency,
                    'authorization_code' => $request->authorization_code,
                    'start_date' => $request->start_date,
                    
                ]);
    
                $date = $date->addDays(1);
    
            }
        }

     

        if ($request->frequency == 'Hourly') {
            # code...

            for ($i=0; $i <= 24  ; $i++) { 
                # code...
               
    
                $payment_schedule = PaymentSchedule::updateOrCreate(
                    [
                    'user_id' => Auth::user()->id,
                    'package_id' => '1',
                    'profile_id' => $profile_data->id,
                    'date' => $date,
                    'custom_name' => $request->custom_name,
                    'end_date' => $end_date,
                    'deduction_amount' => '50',
                    'frequency' => $request->frequency,
                    'authorization_code' => $request->authorization_code,
                    'start_date' => $request->start_date,
                    
                ]);
    
                $date = $date->addHours(1);
    
            }
        }






        // dd($diff_in_months + 1);

        


       


        return redirect('/user/payment_schedule/'.$payment_schedule->custom_name)->with('payment_schedule_msg', 'Payment Schedule Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentSchedule $paymentSchedule)
    {
        //
    }
}
