<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\House; 

use Auth; 

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); 
        if ($user) {
            if ($user->isAdmin()){
                return redirect('/admin/dashboard'); 
            } 
        } else {
            $houses = House::all();

            return view('dashboard')->with('houses', $houses); 
        } 
    }
}
