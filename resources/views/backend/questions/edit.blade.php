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
			<h1>{{$questions->question}}</h1>
		</div>
	</div>
	<br>
	
	<form class="col-md-12" method="POST" action="">
			@csrf
			@method('PATCH')
				<div class="form-group row">
					<label for="question" class="col-sm-1 col-form-label">Question:</label>
					<div class="col-sm-11">
					<input type="text" name="question" class="form-control" id="question" value="{{$questions->question}}" required>
					</div>
				</div>
				<div class="form-group row">
						<div class="input-group col-md-6 col-sm-12">
							<span class="input-group-addon col-sm-1"> 
							<input type="radio" value="A"  name="answer" {{ $questions->answer == 'A' ? 'checked' : ''}}>
							</span>
						<input type="text" class="form-control" value="{{$questions->A}}"name="A">
						</div>
						<div class="input-group col-md-6 col-sm-12">
							<span class="input-group-addon col-sm-1">
							<input type="radio" value="C" name="answer" {{ $questions->answer == 'C' ? 'checked' : ''}}>
							</span>
							<input type="text" class="form-control" value="{{$questions->C}}" name="C">
						</div>
					</div>
						 <div class="row mt-2">
						<div class="input-group col-md-6 col-sm-12">
							<span class="input-group-addon col-sm-1">
							<input type="radio"  value="B"  name="answer" {{ $questions->answer == 'B' ? 'checked' : ''}}>
							</span>
							<input type="text" class="form-control" value="{{$questions->B}}" name="B">
						</div>
						<div class="input-group col-md-6 col-sm-12">
							<span class="input-group-addon col-sm-1">
							<input type="radio"  value="D" name="answer" {{ $questions->answer == 'D' ? 'checked' : ''}}>
							</span>
							<input type="text" class="form-control" value="{{$questions->D}}" name="D">
						</div>
					</div>
				<div class="form-group row mt-5">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</div>
	</form>
	
</div>
@endsection