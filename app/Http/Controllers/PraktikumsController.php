<?php

namespace App\Http\Controllers;

use App\Models\praktikum;
use Illuminate\Http\Request;

class PraktikumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $praktikum = \App\Models\praktikum::all();
        return view('mahasiswa.index', compact('praktikum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required|max:55',
            'nilai_akhir' => 'required',
            'nilai_huruf' => 'required',
            'status' => 'required'
        ]);


        praktikum::create($request->all());
        return redirect('/mahasiswa')->with('status', 'data berhasil ditambah');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\praktikum  $praktikum
     * @return \Illuminate\Http\Response
     */
    public function show(praktikum $praktikum)
    {
        return view('mahasiswa.show', compact('praktikum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\praktikum  $praktikum
     * @return \Illuminate\Http\Response
     */
    public function edit(praktikum $praktikum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\praktikum  $praktikum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, praktikum $praktikum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\praktikum  $praktikum
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktikum $praktikum)
    {
        praktikum::destroy($praktikum->id);
        return redirect('/mahasiswa')->with('status', 'this data succes in delete');
    }
}
