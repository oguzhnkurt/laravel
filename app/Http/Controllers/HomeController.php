<?php

namespace App\Http\Controllers;

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
        return view('home');
    }
    public function changelocale(){
        if(session()->get('locale') == 'tr'){
            session()->put('locale', 'en');
        }else{
            info('set tr');
            session()->put('locale', 'tr');

            return redirect()->back();
        }
    }
}
