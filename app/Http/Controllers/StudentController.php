<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students,email',
        ]);

        $student = new Student();

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;

        $student->save();

        return back()
            ->with('success', 'Student Added Successfully!');
    }

    /*
     * View student data
     */

    public function view(Request $request)
    {
        if ($request->ajax()){
            $id = $request->id;
            $info = Student::find($id);

            return response()->json($info);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->edit_id;
        $student = Student::find($id);

        $student->first_name = $request->edit_first_name;
        $student->last_name = $request->edit_last_name;
        $student->email = $request->edit_email;

        $student->save();

        return back()
            ->with('success', 'Student Updated Successfully!');

    }

    /*
     * View student data
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $student = Student::find($id);

        $response = $student->delete();

        if ($response)
            echo "Student Deleted Successfully!";
        else
            echo "There was a problem. Please try again later.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
