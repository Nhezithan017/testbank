@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="container alert alert-danger">
						<p>Please fix the following errors</p>
            @foreach ($errors->all() as $error)
               <ul>
							 <li class="text-left">{{ $error }}</li>
							 </ul>
            @endforeach
        
    </div>
@endif
	<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 d-flex justify-content-center">
			<h1>New question for:{{$courses->course_name}}</h1>
		</div>
	</div>
	<br>
	
<form class="col-md-12" method="POST" action="">
		@csrf
		  <div class="form-group row">
		    <label for="question" class="col-sm-1 col-form-label">Question:</label>
		    <div class="col-sm-11">
				<input type="text" name="question" value="{{ old('question') }}" class="form-control" id="question" placeholder="Enter question text here.">
				</div>
		  </div>
			<div class="form-group row">
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1"> 
						<input type="radio" value="A"  name="answer">
						</span>
						<input type="text" class="form-control" name="A" value="{{ old('A') }}">
					</div>
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1">
						<input type="radio" value="C" name="answer">
						</span>
						<input type="text" class="form-control" name="C" value="{{ old('C') }}">
					</div>
				</div>
					 <div class="row mt-2">
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1">
						<input type="radio"  value="B"  name="answer">
						</span>
						<input type="text" class="form-control" name="B" value="{{ old('B') }}">
					</div>
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1">
						<input type="radio"  value="D" name="answer">
						</span>
						<input type="text" class="form-control" name="D" value="{{ old('D') }}">
					</div>
				</div>
		  <div class="form-group row mt-5">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary">Create</button>
		    </div>
		  </div>
</form>
	
</div>

@endsection