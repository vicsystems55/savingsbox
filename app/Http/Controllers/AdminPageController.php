<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminPageController extends Controller
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
    
    public function members()
    {
        //

        $members = User::get();

         // $category_name = '';
         $data = [
            'category_name' => 'members',
            'page_name' => 'multi-column_ordering',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',

        ];
        // $pageName = 'multi-column_ordering';
        return view('admin.members',[
            'members' => $members
        ])->with($data);
    }

    public function reliance_packages()
    {
        # code...

        $data = [
            'category_name' => 'reliance_packages',
            'page_name' => 'reliance_packages',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.reliance_packages')->with($data);
    }

    public function single_member($id)
    {
        # code...

        //

        $single_member = User::where('id', $id)->first();

         // $category_name = '';
         $data = [
            'category_name' => 'single_member',
            'page_name' => 'account_settings',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',

        ];
        // $pageName = 'account_settings';
        return view('admin.single_member',[
            'single_member' => $single_member
        ])->with($data);
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
