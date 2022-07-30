<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class RestaurantController extends Controller
{
    
    public function index(Request $request)
    {

        if(!$request->category)
        {
            $meals =Meal::latest()->get();
           
            return view('restaurant.home',compact('meals'));
        }
       

        $meals =Meal::where('category',$request->category)->get();
       
        return view('restaurant.home',compact('meals'));
        

       
    }
    public function cart()
    {
        $orders = Order::latest()->where('user_id',auth()->user()->id)->get();
        $booking = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('restaurant.cart',compact('orders','booking'));
    }
   
    public function booking(Request $request)
    {
        $booking= $request->validate([
            'name' => 'required|string|max:40|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:11',
            'date' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'people' => 'required|numeric',
            'message' => ' required|string|max:500',
           ]);
        
      Booking::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'date'=>$request->date,
        'time'=>$request->time,
        'phone'=>$request->phone,
        'people'=>$request->people,
        'message'=>$request->message,
        'user_id'=>$request->user_id,
      ]);
      return back()->with('message','Your booking request was sent. We will call back or show your cart to  confirm your reservation. Thank you! !');

    }

    
    public function create()
    {
        //
    }
    

    
    public function store(Request $request)
    {
        if($request->small_meal == 0 && $request->medium_meal == 0 && $request->large_meal == 0)
        {
            return back()->with('errormessage','Please Order meal require');
        }
        Order::create([
            'user_id'=>auth()->user()->id,
            'date'=>$request->date,
            'time'=>$request->time,
            'phone'=>$request->phone,

            'meal_id'=>$request->meal_id,

            'small_meal'=>$request->small_meal,
            'medium_meal'=>$request->medium_meal,
            'large_meal'=>$request->large_meal,

            'body'=>$request->body,
        ]);
        return back()->with('message','Your Order was Successfully !');

    }

    public function show($id)
    {
        $meal =Meal::find($id);
        return view('restaurant.show_meal',compact('meal'));
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
