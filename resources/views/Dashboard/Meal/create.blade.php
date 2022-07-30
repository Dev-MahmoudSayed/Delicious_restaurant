@extends('Dashboard.inc.header')
@section('content')


<div class="row">
	<div class="col-lg-8 m-auto">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom">
				<h2>Add New Meal </h2>
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
				<form action="{{ route('meals.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-row">
						
							<div class="col-md-12 mb-3">
                                <label class="text-dark">Name of Meal</label>
                                <input type="text" class="form-control form-control-lg" name="name" placeholder="Name of Meal">
                            </div><!--Name of Meal-->

                        <div class="col-md-12 mb-3">
                            <label  class="text-dark">Description of Meal</label>
                            <textarea name="description" class="form-control form-control-lg" rows="5" placeholder="description of Meal"></textarea>
                        </div><!--description of Meal-->
    
                        <div class="form-inline mb-3">
                            <label  class="text-dark">  Meals Price(LE)</label>
                            <input type="number"  name="small_meal_price"  placeholder="small mealprice">
                            <input type="number" class="mx-3" name="medium_meal_price"  placeholder="medium meal price">
                            <input type="number"  name="large_meal_price"  placeholder="large meal price">
                        </div><!--Price of Meal-->
                        <div class="col-md-12 mb-3">
                            <label  class="text-dark"> Meal Category</label>
                            <select name="category"class="form-control form-control-lg" >
                                <option></option>
                                <option value="pizza">pizza</option>
                                <option value="barger">barger</option>
                                <option value="pasta">pasta</option>
                            </select>
                        </div><!--Category of Meal-->
                        <div class="col-md-12 mb-3">
                            <label  class="text-dark">Meal image</label>
                            <input type="file" class="form-control form-control-lg form-control-file" name="image" >
                        </div><!--image of Meal-->

					<div class="form-group text-center d-grid col-md-12 mb-3">
                        <button type="submit" class="btn btn-lg btn-success" > Save </button>
                    </div>
				</form>
			</div>
		</div>
	</div>

	



@endsection