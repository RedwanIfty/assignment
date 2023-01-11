<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $students=Student::paginate(10);
        return view('dashboard.show')->with('students',$students);
    }
    function delete($id){
        $st=Student::where('id',$id)->pluck('name')->first();
        $student=Student::where('id',$id)->delete();
        session()->flash('delMsg',$st.' delete successfully');
        return redirect()->route('dash');
    }
    public function update()
    {
        return view('dashboard.update');
    }
    function updateSubmit(Request $req,$id)
    {
        $this->validate($req,
        [
            "name"=>"required|max:20|min:3|regex:/^[a-z ,.'-]+$/i",
            "course"=>"required",
            "institute"=>"required",
            "fees"=>"required|numeric"    
        ]
    );
    $student=Student::where('id',$id)->first();
    $student->name=$req->name;
    $student->course=$req->course;
    $student->institute=$req->institute;
    $student->fees=$req->fees;
    $student->update();
    session()->flash('updateMsg','Successfully updated');
    return redirect()->route('dash');
    }
    public function addStudent()
    {
        return view('dashboard.update');
    }
    public function addStudentSubmit(Request $req)
    {
        $this->validate($req,
        [
            "name"=>"required|max:20|min:3|regex:/^[a-z ,.'-]+$/i",
            "course"=>"required",
            "institute"=>"required",
            "fees"=>"required|numeric"    
        ]
    );
    $student=new Student();
    $student->name=$req->name;
    $student->course=$req->course;
    $student->institute=$req->institute;
    $student->fees=$req->fees;
    $student->save();
    session()->flash('saveMsg','Student added successfully');
    return redirect()->route('dash');

    }
    public function search(Request $req)
    {
        $output="";
        $student=Student::where('name','LIKE','%'.$req->search.'%')->get();
        foreach($student as $st){
            $output.=
            '<tr>
            <td> '.$st->name.' </td>
            <td> '.$st->course.' </td>
            <td> '.$st->institute.' </td>
            <td> '.$st->fees.' </td>
            </tr>';
        }
        return response($output);
    }
}
