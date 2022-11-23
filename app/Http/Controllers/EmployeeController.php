<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return employee::all();
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
        $pekerja = new employee();

        $pekerja->nama = $request->nama;
        $pekerja->email = $request->email;
        $pekerja->age = $request->age;
        $pekerja->designation = $request->designation;
        $pekerja->save();
        return response()->json($pekerja);
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama',
            'email',
            'age',
            'designation',
        ]);

        $pekerja = employee::find($request->id);
        $input = [
            'nama' => $request->nama,
            'email' => $request->email,
            'age' => $request->age,
            'designation' => $request->designation,
        ];

        $pekerja->update($input);
        return response()->json($pekerja);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerja = employee::find($id);
        $pekerja->delete();

        return response()->json(null);
    }
}
