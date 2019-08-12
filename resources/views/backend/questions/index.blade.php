@extends('layouts.app')

@section('content')
<br>

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
		<div class="my-auto ml-auto">
			<a href="/course">
				<i class="fas fa-arrow-circle-left fa-2x"></i>
			</a>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-8 offset-md-2 d-flex justify-content-center">
			<h1>Courses for {{ $courseName }}</h1>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 mx-auto">
				<a href="/create/question/{{$courses->id}}" class="btn btn-primary btn-lg  btn-block" role="button" aria-pressed="true">Add new questions</a>
				<a href="/search/{{$courses->id}}" class="btn btn-primary btn-lg  btn-block" role="button" aria-pressed="true">import questions</a>
			</div>
		</div>
	</div>
	<div class="container">
			@foreach($questions as $question)
		<div class="row">
			<div class="col-sm-10">
				<p>{{$question->question}}</p>
			</div>  
			<div class="col-sm-1">
					<a href="/edit/question/{{$question->id}}" class="btn btn-outline-warning btn-block" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a>
			</div> 
			<div class="col-sm-1">
					<form method="POST" action="/delete/question/{{$question->id}}"  onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS TEST?')">
						@method('DELETE')
						   @csrf
						   <button type="submit" name="delete" class="btn btn-outline-danger btn-block"><i class="far fa-trash-alt"></i></button>
						   </form>
				</div> 
		</div>
		<div class="row">
			<div class="input-group col-md-6 col-sm-12">
			  <span class="input-group-addon col-sm-1"> 
			  <input type="radio" value="A"  {{ $question->answer == 'A' ? 'checked' : ''}} disabled>
				</span>
				a.
			  {{ $question->A }}
			</div>
			<div class="input-group col-md-6 col-sm-12">
			  <span class="input-group-addon col-sm-1">
				<input type="radio" value="C" {{ $question->answer == 'C' ? 'checked' : ''}} disabled>
				</span>
				c.
			  {{ $question->C }}
			</div>
		</div>
		   <div class="row mt-2">
			<div class="input-group col-md-6 col-sm-12">
			  <span class="input-group-addon col-sm-1">
				<input type="radio"  value="B"  {{ $question->answer == 'B' ? 'checked' : ''}} disabled>
				</span>
				b.
			  {{ $question->B }}
			</div>
			<div class="input-group col-md-6 col-sm-12">
			  <span class="input-group-addon col-sm-1">
				<input type="radio"  value="D"  {{ $question->answer == 'D' ? 'checked' : ''}} disabled>
				</span>
				d.
			  {{ $question->D }}
			</div>
		</div>
		  <hr>
	@endforeach
	{{-- <question :questions="{{ $questions }}" :course_id="{{ $courses_id }}"></question> --}}
	
</div>
@endsection