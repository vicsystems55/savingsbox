<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\ActivityLog;

use Auth;

class ChooseRoleController extends Controller
{
    public function index()
    {
        if (Auth::user()->role =='admin') {
            return redirect('/admin');
        }

        elseif (Auth::user()->role =='user') {

            // ActivityLog::create([
            //     'performed_by' => Auth::user()->id,
            //     'title' => 'User Authentication',
            //     'log' => 'Just Logged in from ' . request()->ip()
            // ]);
            return redirect('/user');
        }

        elseif (Auth::user()->role =='superadmin') {
            return redirect('/sadmin');
        }

        else{
            abort(403);
        }
    }
}
