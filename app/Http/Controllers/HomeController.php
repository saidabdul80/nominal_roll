<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

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
        User::where(["rank_id"=>0])->delete();
        return view('home');
    }
    public function addUser()
    {        
        return view('add');
    }

    public function dismissal()
    {        
        //$dismissals = User::where("dismissal_state",1)->get();
        return view('dismissal');
    }

    public function transfer()
    {        
        return view('transfer');
    }

    public function deathList()
    {        
        return view('deathlist');
    }
    public function phoneBook()
    {        
        return view('phone');
    }
    

}
