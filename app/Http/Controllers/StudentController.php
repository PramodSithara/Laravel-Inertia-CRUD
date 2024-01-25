<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        return Inertia::render('index',[
            'student'=>Student::all()->map(function($student){
                return [
                    'id'=>$student->id,
                    'name'=>$student->name,
                    'image'=>$student->image,
                    'age'=>$student->age,
                    'status'=>$student->status,
                ];
            })
        ]);
    }

    public function goto(){
        return redirect()->route('student.index');
    }

    public function create()
    {
        return Inertia::render('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'age' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('public/images', $imageName);

        Student::create([
            'name' => $request->input('name'),
            'image' => Storage::url($imagePath),
            'age' => $request->input('age'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('student.index')->with('message', 'Student Created Successfully');
    }

    public function edit(Student $student){
        return Inertia::render('edit', [
            'student' => $student,

        ]);
    }

    public function update(Request $request, Student $student){
        $validated=$request->validate([
            'name' => 'required|max:255',
            'age' => 'required|max:255',
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => 'required|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('student.index')->with('message','Student Edited Successfully');
    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('student.index')->with('message','Student Deleted Successfully');
    }

}
