@component('mail::message')
# ICCT COLLEGES INC.


Department: {{ $courses->dept_name }} <br/>
Course: {{ $courses->course_name }}


<ul>
    <li>
      you have  {{ $courses->questions->count() }} questions.
    </li>

</ul>


@component('mail::button', ['url' => url('/course')])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
