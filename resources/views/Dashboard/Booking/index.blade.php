
@extends('Dashboard.inc.header')
@section('content')


<div class="container">
  
    <div class="row">
        <div class="col-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">No.people</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Accept</th>
                <th scope="col">Reject</th>
               
                
                </tr>
            </thead>
            <tbody>
               @foreach ($booking as $row)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}} </td>
                    <td>{{$row->phone}} </td>
                    <td>{{$row->date}} </td>
                    <td>{{$row->time}} </td>
                    <td>{{$row->people}} </td>
                    <td>{{$row->message}} </td>
                    <td>{{$row->status}}</td>
                   
                    <form action="{{ route('booking.status', ['id'=>$row->id]) }}" method="POST">
                        @csrf
                       
                        <td >
                            <input type="submit" name="status" value="accepted" class="btn btn-primary btn-sm">
                        </td>
                        <td >
                            <input type="submit" name="status" value="Rejected" class="btn btn-danger btn-sm">
                        </td>
                        
                        
                        

                    </form>
                </tr>

                @endforeach

           
        </div>
    </div>
</div>








@endsection