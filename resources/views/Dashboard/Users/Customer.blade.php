@extends('Dashboard.inc.header')
@section('content')
@section('title')
    Users Page 
@endsection

<div class="container">
  
    <div class="row">
        <div class="col-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col">Member Since</th>
               
               
                
                </tr>
            </thead>
            <tbody>
               @foreach ($customers as $row)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}} </td>
                    <td>{{\Carbon\Carbon::parse($row->create_at)->format('d - M - Y')}} </td>  
                    
                        
                        

                    </form>
                </tr>

                @endforeach

           
        </div>
    </div>
</div>







@endsection