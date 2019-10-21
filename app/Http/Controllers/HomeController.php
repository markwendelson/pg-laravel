<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->with('comments')
                    ->where('id',auth()->user()->id)
                    ->get();
        $users = User::where('id','<>',auth()->user()->id)->get();
        return view('home', compact('user', 'users'));
    }

    public function user(Request $request)
    {
        if(auth()->user()->id == $request->id)
        {
            return redirect('home');
        }

        $user = User::with('comments')
                    ->where('id',$request->id)
                    ->get();
        return view('user', compact('user'));

    }

}
