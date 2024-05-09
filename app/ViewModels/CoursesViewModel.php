<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Course;
class CoursesViewModel extends ViewModel
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function courses()
    {
        return Course::where('id' , 9 )->get();
    }


    public function lessons()
    {
        return Course::where('id' , 10 )->get();
    }
}
