
@extends('Dashboard.inc.header')
@section('content')


 <!-- Recent Order Table -->
 <div class="card card-table-border-none recent-orders  " id="recent-orders">
    <div class="card-header justify-content-between ">
      <h2>Recent Orders</h2>
    </div>
    @if (session('message'))
    <div class="alert alert-success">
        <h2>{{session('message')}}</h2>
    </div>
@endif
@if (session('text'))
    <div class="alert alert-danger">
        <h2>{{session('text')}}</h2>
    </div>
@endif
toastr()->success($message)
    <div class="card-body pt-0 pb-0">
            
      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
        <thead>
          <tr>
            <th >#</th>
            <th >image</th>
            <th >Name</th>
            <th >Description</th>
            <th >Category</th>
            <th >S.Price</th>
            <th >M.Price</th>
            <th >L.Price</th>
            <th >Edit</th>
            <th >Delete</th>
           
            <th></th>
          </tr>
        </thead>
        <tbody>
            @if (count($meals) > 0)
            @foreach ($meals as $meal)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td><img src="{{Storage::url($meal->image)}}"  alt="" width="100" height="70"></td>
                <td>{{$meal->name}}</td>
                <td>{{$meal->description}}</td>
                <td>{{$meal->category}}</td>
                <td>{{$meal->small_meal_price}}</td>
                <td>{{$meal->medium_meal_price}}</td>
                <td>{{$meal->large_meal_price}}</td>
                <td><a href="{{ route('meals.edit', ['id'=>$meal->id]) }}"><i class="fa fa-edit">Edit</i><a></td>
                    <!--delete code-->
                    <td>
                      <a href="{{ route('meals.delete', ['id' => $meal->id]) }}"
                          class="btn btn-danger">Delete <i class="fa fa-delete"></i></a>
                  </td>

                {{-- <td>
                    
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$meal->id}}">
                            <i class="fa fa-trash">Delete</i>
                          </button>

                </td>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$meal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                        <form action="{{ route('meals.delete', ['id'=>$meal->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-body">
                                   <h1 class="text-center ">Are You Sure?</h1>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger"> Delete</button>
                                  </div>
                            </div>
                        </div>
                    </form>
                    
                </div> --}}
            
              </tr>
              @endforeach
            @else
            <div class="alert alert-danger text-center">
                <h2>No Meals To Show</h2>
            </div>
            @endif
         
        
        </tbody>
        
        {{$meals->links()}}
    </div>
 </div>


        
@endsection
