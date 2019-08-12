@extends('layouts.app')

@section('content')

<department-editor>
	<div slot="name" v-cloak>
		
	</div>
</department-editor>

@endsection
{{-- <br>

<div class="container">
	<div class="row">
		<div class="col-sm-4 mx-auto">
			<a href="/create/course" class="btn btn-primary btn-lg  btn-block" role="button" aria-pressed="true">Create new Department</a>
		</div>
	</div>
</div>
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
		<table class="table table-striped table-inverse co-sm-12">
			<thead class="thead-inverse bg-dark text-light">
				<tr>
					<th>Department</th>
					<th>Sy - Start</th>
					<th>Sy - End</th>
					<th>Course</th>
					<th>Trimester</th>
					<th>Period</th>
					<th>Created at</th>
				</tr>
				</thead>
				<tbody>
					@foreach($courses as $course)
					<tr>
						<td scope="row">{{ $course->dept_name }}</td>
						<td> 
                                @php
                                    $year = date('Y', strtotime($course->sy_start));
                                @endphp
                                {{$year }}
                            </td>
                            <td> 
                                    @php
                                        $year = date('Y', strtotime($course->sy_end));
                                    @endphp
                                    {{ $year }}
                                </td>
						<td>{{ $course->course_name }}</td>
						<td>{{ $course->trimester }}</td>
						<td>{{ $course->period }}</td>
						<td>{{ $course->created_at->diffForHumans() }}</td>
						<td>
							<a  href="{{ url('tests/pdfexport/' . $course->id) }}" target="_blank" name="delete" class="btn btn-outline-danger btn-block"><i class="fa fa-download"></i></a>
						</td>
						<td><a href="/edit/course/{{$course->id}}" class="btn btn-outline-warning btn-block" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td>
						<td>
							<form method="POST" action="/course/delete/{{ $course->id }}"  onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS TEST?')">
								@method('DELETE')
									@csrf
									<button type="submit" name="delete" class="btn btn-outline-danger btn-block"><i class="far fa-trash-alt"></i></button>
							</form>
						</td>
						<td>
							<div class="dropdown open">
									<button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
											aria-expanded="false">
											<i class="fas fa-question"> </i>
											</button>
									<div class="dropdown-menu" aria-labelledby="triggerId">
											<a href="/question/{{$course->id}}"  class="dropdown-item" role="button" aria-pressed="true">
												Multiple Choice
											</a>		
										<button class="dropdown-item " href="#">True/False</button>
									</div>
								</div>
						</td>
					</tr>
					@endforeach
				</tbody>
		</table>
	</div>
</div> --}}


