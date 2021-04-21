<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = \App\Models\student::all();
        return view('students/index', ['student' => $student]);
        // return view('students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CARA INSET DATA YANG KE-1
        // $student = new Student;
        // $student->name = $request->name;
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;
        // $student->save();



        // CARA INSERT DATA YANG KE-2
        // student::create([
        //     'name' => $request->name,
        //     'nrp' => $request->nrp,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        // ]);



        // CARA INSERT DATA YANG KE-3
        $request->validate([
            'name' => 'required|max:45',
            'nrp' => 'required|size:9',
            'email' => 'required|email:rfc,dns',
            'jurusan' => 'required'
        ]);

        Student::create($request->all());
        return redirect('/students')->with('status', 'data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        $praktikum = \App\Models\praktikum::all();
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        // $student->delete($student);
        student::destroy($student->id);
        return redirect('/students')->with('status', 'this data succes in delete');
    }
}
