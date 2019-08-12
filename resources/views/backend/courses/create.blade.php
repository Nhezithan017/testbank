@extends('layouts.app')

@section('content')
<br>
@if ($errors->any())
    <div class="container alert alert-danger">
        
            @foreach ($errors->all() as $error)
                <p class="text-center">{{ $error }}</p>
            @endforeach
        
    </div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 d-flex justify-content-center">
			<h1>Create new Courses</h1>
		</div>
	</div>
	
	<br>
	
	<form class="col-md-8 offset-md-2 " method="POST" action="/create/course">
		@csrf
		  <div class="form-group row">
		    <label for="department" class="col-sm-2 col-form-label">Department:</label>
		    <div class="col-sm-10">
		     <div class="form-group">
					 <select class="form-control" name="dept_name" id="department">
						 	@foreach ($department_name as $dept_name)
					 <option value="{{$dept_name}}">{{$dept_name}} </option>
							 @endforeach
					 </select>
				 </div>
		    </div>
		  </div>	
		 
		  <div class="form-group row">
			    <label for="trimester" class="col-sm-2 col-form-label">School Year:</label>
			    <div class="col-5">
			    <div class="form-group">
						<label for="">Start date:</label>
						<input type="date"
							class="form-control" name="sy_start" id="" aria-describedby="helpId" placeholder="">
					</div>
				</div>
					<div class="col-5">
					<div class="form-group">
						<label for="">End date:</label>
						<input type="date"
							class="form-control" name="sy_end" id="" aria-describedby="helpId" placeholder="">
					</div>
			    </div>
			</div>

			<div class="form-group row">
		    <label for="course_name" class="col-sm-2 col-form-label">Course name:</label>
		    <div class="col-sm-10">
					<div class="form-group">
						<input type="text"
							class="form-control" name="course_name" id="" value="{{ old('course_name') }}" aria-describedby="helpId" placeholder="">
					</div>
		    </div>
			</div>

			<div class="form-group row">
		    <label for="trimester" class="col-sm-2 col-form-label">Trimester :</label>
		    <div class="col-sm-10">
		     <div class="form-group">
					 <select class="form-control" name="trimester" id="trimester">
						 	@foreach ($trimester as $trim)
					 <option value="{{$trim}}">{{$trim}} </option>
							 @endforeach
					 </select>
				 </div>
		    </div>
			</div>
			
			<div class="form-group row">
		    <label for="period" class="col-sm-2 col-form-label">Period :</label>
		    <div class="col-sm-10">
		     <div class="form-group">
					 <select class="form-control" name="period" id="period">
						 	@foreach ($period as $pr)
					 <option value="{{$pr}}">{{$pr}} </option>
							 @endforeach
					 </select>
				 </div>
		    </div>
			</div>

		  <div class="form-group row">
		    <div class="col-sm-2 offset-sm-2">
		      <button type="submit" class="btn btn-primary">Create</button>
		    </div>
			</div>
			
</form>
	
</div>

@endsection

