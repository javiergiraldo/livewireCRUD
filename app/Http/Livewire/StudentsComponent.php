<?php

namespace App\Http\Livewire;

use App\Models\Students;
use Livewire\Component;

class StudentsComponent extends Component
{

    public $student_id, $name, $email, $phone;

    //input fields on update validation
    public function update($fields)
    {
        $this->validateOnly($fields, [
          'student_id'  => 'required|unique:students', //students = table name
          'name'        => 'required',
          'email'       => 'required|email',
          'phone'       => 'required|numeric',  
        ]);
    }

    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'student_id'  => 'required|unique:students', //students = table name
            'name'        => 'required',
            'email'       => 'required|email',
            'phone'       => 'required|numeric',  
          ]);

          //Add Student Data
          $student = new Students();
          $student->student_id = $this->student_id;
          $student->name = $this->name;
          $student->email = $this->email;
          $student->phone = $this->phone;

          $student->save();

          session()->flash('message', 'New student has been added succesfully');

          $this->student_id = '';
          $this->name = '';
          $this->email = '';
          $this->phone = '';

          //For hide modal after add student success
          $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {

        //Get all students
        $students = Students::all();

        return view('livewire.students-component')->layout('livewire.layouts.base');
    }
}
