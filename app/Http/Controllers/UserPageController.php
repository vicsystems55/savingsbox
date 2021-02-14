<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserProfile;

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

        return view('users.dashboard')->with($data);
    }


    public function notifications()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.notifications')->with($data);
    }


    public function reliance_packages()
    {
        //

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
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
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('users.single_package')->with($data);
    }

    public function subscription_setup()
    {

        $user_cards = UserCard::where('user_id', Auth::user()->id)->latest()->get();

        $data = [
            'category_name' => 'forms',
            'page_name' => 'date_range_picker',
            'has_scrollspy' => 1,
            'scrollspy_offset' => 100,

        ];
        // $pageName = 'date_range_picker';
        return view('users.subscription_setup',[
            'user_cards' => $user_cards
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
