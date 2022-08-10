<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentComponent extends Component
{
    public $name;

    function storeStudentData() {
        $this->validate([
            'name' => 'required',
            'student_id' => 'required',
        ]);

        return session()->flast('Students store sucessfully');
    }

    public function render()
    {
        $students = Student::all();
        return view('livewire.student-component', compact('students'))->layout('livewire.layouts.base');
    }
}
