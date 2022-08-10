<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentComponent extends Component
{
    public $name, $student_id, $phone, $email;
    public $student_edit_id;
    public $student_delete_id;
    public $searchTerm;

    // protected $rules = [
    //     'name' => 'required',
    //     'student_id' => 'required|numeric',
    //     'email' => 'required|email'
    // ];

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'student_id' => 'required|unique:students,student_id,'.$this->student_edit_id.'', //Validation with ignoring own data
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
    }

    protected function rules()
    {
        return [
        'name' => 'required',
        'student_id' => 'required|unique:students',
        'phone' => 'required|numeric',
        'email' => 'required|email'
        ];
    }

    function render()
    {
        $students = Student::where('name', 'like', '%'.$this->searchTerm. '%')->orWhere('email', 'like', '%'.$this->searchTerm. '%')->get();
        return view('livewire.student-component', compact('students'))->layout('livewire.layouts.base');
    }

    function store()
    {
        $validatedData = $this->validate();
        Student::create($validatedData + [
            'phone' => $this->phone
        ]);
        session()->flash('message', 'Students store sucessfully');
        $this->resetInputs();
        $this->emit('closeModal');
    }

    function show($id)
    {
        $student = Student::find($id);
        $this->name = $student->name;
        $this->student_id = $student->student_id;
        $this->phone = $student->phone;
        $this->email = $student->email;

        $this->emit('showModal');
    }

    function edit($id)
    {
        $student = Student::find($id);
        $this->student_edit_id = $student->id;
        $this->name = $student->name;
        $this->student_id = $student->student_id;
        $this->phone = $student->phone;
        $this->email = $student->email;
        $this->emit('showUpdateModal');
    }

    function update() {

        $validatedData = $this->validate([
            'student_id' => 'required|unique:students,student_id,'.$this->student_edit_id.'',
        ]);

        if ($this->student_edit_id)
        {
            $student = Student::find($this->student_edit_id);
            $student->update($validatedData + [
                'phone' => $this->phone
            ]);
           session()->flash('message', 'Students updated sucessfully');
           $this->resetInputs();
           $this->emit('closeModal');
        }
    }

    function deleteConfirmation($id)
    {
        $this->student_delete_id = $id;
    }

    function delete()
    {
        if ($this->student_delete_id)
        {
            $student = Student::find($this->student_delete_id);
            $student->delete();
            session()->flash('message', 'Students deleted sucessfully');
            $this->resetInputs();
            $this->emit('closeModal');
        }
    }

    function cancel()
    {
        $this->resetInputs();
        $this->resetErrorBag();
    }

    function resetInputs()
    {
        $this->student_edit_id = "";
        $this->student_delete_id = "";
        $this->name = "";
        $this->student_id = "";
        $this->phone = "";
        $this->email = "";
    }


}
