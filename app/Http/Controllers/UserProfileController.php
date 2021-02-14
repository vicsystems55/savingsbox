<?php

namespace App\Http\Controllers;

use App\UserProfile;

use Auth;

use Paystack;

use Illuminate\Http\Request;

class UserProfileController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    public function bank_info(Request $request)
    {
        //

        $this->validate($request, [

            'account_name' => 'required',
          
            
        ]);

       

        try {
         

            $data = [
                "type" => "nuban",
                "name" => $request->account_name,
                "description" => "Phoenix User",
                "account_number" => $request->account_no,
                
                "bank_code" => $request->bank_code,
                "currency" => "NGN"
            ];
    
            $createRecipient = Paystack::createRecipient($data);

            // dd($createRecipient);


        } catch (\Throwable $th) {
           
            $createRecipient['recipient_code'] = null;

            return back()->with('bank_msg', 'Check Bank Details');

        }

        UserProfile::updateOrCreate([
            'user_id' => Auth::user()->id,
        ],[
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'auth_code' => $createRecipient['recipient_code'],
            'account_number' => $request->account_no
        ]);

        

        // dd($createRecipient['recipient_code']);

        return back()->with('bank_msg', 'Bank Details Updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
