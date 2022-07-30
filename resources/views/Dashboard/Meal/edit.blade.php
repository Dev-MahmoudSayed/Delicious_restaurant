@extends('Dashboard.inc.header')
@section('content')


<div class="row">
	<div class="col-lg-8 m-auto">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom">
				<h2>Update Meal </h2>
			</div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
           <div class="card-body">

        <form action="{{route('meals.update', ['id'=>$meal->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            <div class="col-md-12 mb-3">
                <label>Name of Meal</label>
                <input type="text" value="{{$meal->name}}" class="form-control form-control-lg" name="name" placeholder="Name of Meal">
            </div><!--Name of Meal-->
            <div class="col-md-12 mb-3">
                <label>Description of Meal</label>
                <textarea name="description" class="form-control form-control-lg" rows="5" placeholder="description of Meal">{{$meal->description}}</textarea>
            </div><!--description of Meal-->

            <div class="col-md-12 mb-3">
                <label>  Meals Price(LE)</label>
                <input type="number" value="{{$meal->small_meal_price}}" name="small_meal_price"  placeholder="small mealprice">
                <input type="number" value="{{$meal->medium_meal_price}}" class="mx-3" name="medium_meal_price"  placeholder="medium meal price">
                <input type="number"  value="{{$meal->large_meal_price}}" name="large_meal_price"  placeholder="large meal price">
            </div><!--Price of Meal-->
            <div class="col-md-12 mb-3">
                <label> Meal Category</label>
                <select name="category"class="form-control form-control-lg" >
                    <option value="{{$meal->category}}">{{$meal->category}}</option>
                    <option value="pizza">pizza</option>
                    <option value="barger">barger</option>
                    <option value="paste">pasta</option>
                </select>
            </div><!--Category of Meal-->
            <div class="col-md-12 mb-3">
                <label>Meal image</label>
                <input type="file" class="form-control form-control-lg form-control-file" name="image" >
                <img  src="{{Storage::url($meal->image)}}"  width="200" alt="" >
            </div><!--image of Meal-->

            <div class="form-group text-center d-grid">
                <button type="submit" class="btn btn-lg btn-primary" > Save </button>
            </div>
            
        </form>
    </div>
</div>
</div>


@endsection