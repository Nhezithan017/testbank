<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataContent extends ReadOnlyBase
{
    protected $department_name = ['College of Computer Studies', 
    'College of Engineering', 
    'College of Business and Accountancy'];

    protected $trimester = ['1st Trimester', 
    '2nd Trimester', 
    '3rd Trimester'];

    protected $period = ['Prelim', 
    'Midterm', 
    'Final'];
    protected $user_type = ['admin', 
    'dean', 
    'faculty'];
}