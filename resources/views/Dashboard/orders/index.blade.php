@extends('Dashboard.inc.header')
@section('content')




<div class="col-md-10">
    <div class="card">
        
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Phone/Email</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Meal</th>
                    <th scope="col">S.Meal</th>
                    <th scope="col">M.Meal</th>
                    <th scope="col">L.Meal</th>
                    <th scope="col">Total($)</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Accept</th>
                    <th scope="col">Reject</th>
                    <th scope="col">Complete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                                    
                    <tr>
                    <td scope="col">{{$order->user->name}}</td>
                    <td scope="col">{{$order->user->email}}<br><i class="fa fa-phone"></i>{{$order->phone}}</td>
                    <td scope="col">{{$order->date}}/{{$order->time}}</td>
                    <td scope="col">{{$order->Meal->name}}</td>
                    <td scope="col">{{$order->small_meal}}</td>
                    <td scope="col">{{$order->medium_meal}}</td>
                    <td scope="col">{{$order->large_meal}}</td>
                    <td scope="col">
                        ${{
                        $order->Meal->small_meal_price * $order->small_meal
                        +
                        $order->Meal->medium_meal_price * $order->medium_meal
                        +
                        $order->Meal->large_meal_price * $order->large_meal
                        }}

                    </td>
                    <td scope="col">{{$order->body}}</td>
                    <td scope="col">{{$order->status}}</td>
                    <form action="{{ route('order.status', ['id'=>$order->id]) }}" method="POST">
                        @csrf
                       
                        <td >
                            <input type="submit" name="status" value="accepted" class="btn btn-primary btn-sm">
                        </td>
                        <td >
                            <input type="submit" name="status" value="Rejected" class="btn btn-danger btn-sm">
                        </td>
                        <td >
                            <input type="submit" name="status" value="Complete" class="btn btn-success btn-sm">
                        </td>
                        
                        

                    </form>
                    



                    </tr>

                    @endforeach
                </tbody></table>
        </div>
    </div>
</div>









@endsection