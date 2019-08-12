@extends('layouts.app')

@section('content')
@if ($flash=session('message'))
<div class="container">
	<div class="alert alert-success" role="alert" id = "Delete">
	    {{ $flash }}
	</div>
</div>

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script type="text/javascript">
$("#Delete").fadeOut(4000)
</script>    
@endif
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 d-flex justify-content-center">
			<h1>New question for:{{$courses->course_name}}</h1>
		</div>
	</div>
	@foreach($questions as $question)
<form class="col-md-12" method="POST" action="/search/question/{{$courseId}}">
    @csrf
		  <div class="form-group row ">
           
                <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" onChange="this.form.submit()">
                        </label>
                    </div>
                  
		    <div class="col-sm-11">
				<input type="text" name="question" value="{{ $question->question }}" class="form-control" id="question" placeholder="Enter question text here.">
				</div>
		  </div>
			<div class="form-group row">
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1"> 
						<input type="radio" value="A"   {{ $question->answer == 'A' ? 'checked' : ''}}>
						<input type="hidden" value="{{$question->answer}}" name="answer">
						</span>
						<input type="text" class="form-control" name="A" value="{{ $question->A }}">
					</div>
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1">
						<input type="radio" value="C"  {{ $question->answer == 'C' ? 'checked' : ''}}>
						</span>
						<input type="text" class="form-control" name="C" value="{{ $question->C }}">
					</div>
				</div>
					 <div class="row mt-2">
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1">
						<input type="radio"  value="B"  {{ $question->answer == 'B' ? 'checked' : ''}}>
						</span>
						<input type="text" class="form-control" name="B" value="{{ $question->B }}">
					</div>
					<div class="input-group col-md-6 col-sm-12">
						<span class="input-group-addon col-sm-1">	
						<input type="radio"  value="D"  {{ $question->answer == 'D' ? 'checked' : ''}}>
						</span>
						<input type="text" class="form-control" name="D" value="{{ $question->D }}">
                    </div>
				</div>
</form>
@endforeach
</div>
@endsection