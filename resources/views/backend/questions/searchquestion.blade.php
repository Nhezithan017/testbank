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
		<div>
				<h1>Create new Question</h1>
			</div>
	<form method="" action="">
	<div class="row">
		  <div class="form-group col-sm-3">
		    <label for="department" class="col-form-label">Department</label>
					 <select class="form-control" name="dept_name" id="department">
						 	@foreach ($department_name as $dept_name)
					 <option value="{{$dept_name}}">{{$dept_name}} </option>
							 @endforeach
					 </select>
		  </div>	
			<div class="form-group col-sm-3">
		    <label for="course_name" class="col-form-label">Course name</label>
				<input type="text" class="form-control" name="course_name" id="" value="{{ old('course_name') }}" aria-describedby="helpId" placeholder="">
				</div>
			<div class="form-group col-sm-2">
		    <label for="trimester" class="col-form-label">Trimester</label>
					 <select class="form-control" name="trimester" id="trimester">
						 	@foreach ($trimester as $trim)
					 <option value="{{$trim}}">{{$trim}} </option>
							 @endforeach
					 </select>
				 </div>
			
			<div class="form-group col-sm-2">
		    <label for="period" class="col-form-label">Period</label>
					 <select class="form-control" name="period" id="period">
						 	@foreach ($period as $pr)
					 <option value="{{$pr}}">{{$pr}} </option>
							 @endforeach
					 </select>
				 </div>

		  <div class="form-group col-sm-2 mx-auto">
		      <button type="submit" class="btn btn-primary ">Search</button>
			</div>
</form>			
	</div>
</div>
<div class="container">
	<div class="row">
		<table class="table table-striped table-inverse co-sm-12">
			<thead class="thead-inverse bg-dark text-light">
				<tr>
					<th>Department</th>
					<th>Course</th>
					<th>Trimester</th>
					<th>Period</th>
				</tr>
				</thead>
				<tbody>
					@foreach($courses as $course)
					{{-- <tr>
						<td scope="row">{{ $course->dept_name }}</td>
						<td>{{ $course->course_name }}</td>
						<td>{{ $course->trimester }}</td>
						<td>{{ $course->period }}</td>
							<div class="dropdown open">
									<button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
											aria-expanded="false">
											<i class="fas fa-question"> </i>
											</button>
									<div class="dropdown-menu" aria-labelledby="triggerId">
									<a href="/search/question/{{ $courseId }}/{{$course->id}}"  class="dropdown-item">
												Multiple Choices
											</a>		
										<button class="dropdown-item " href="#">True/False</button>
									</div>
								</div>
						</td>
					</tr> --}}
					@foreach($course->questions as $question)
					<tr>
					<td>{{ $question->question}}</td>
					</tr>
					@endforeach
					@endforeach
				</tbody>
		</table>
	</div>
</div>
@endsection

