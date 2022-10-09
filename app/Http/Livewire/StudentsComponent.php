<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StudentsComponent extends Component
{

    public $student_id;

    public function storeStudentData()
    {

    }

    public function render()
    {
        return view('livewire.students-component')->layout('livewire.layouts.base');
    }
}
