<?php

namespace App\Http\Controllers;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
      

        if(auth()->user()->is_admin ==1)
        {
            return view('Dashboard.home');
        }
        else
        {
         $orders = Order::latest()->where('user_id',auth()->user()->id)->get();
    
        return redirect()->route('Restaurant');
        }
    }

}
