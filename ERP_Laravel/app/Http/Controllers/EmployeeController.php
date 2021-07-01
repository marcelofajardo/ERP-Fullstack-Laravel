<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('type', 'employee')->get();

        //foreach ($employees as $employee) {
        //    unset($employee->adress, $employee->cif_nif, $employee->image);
        //}
        //return response()->json($employees, 201);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required|string|max:255',
            'cif_nif' => 'required|string|max:12',
            'type' => 'required',
            'image' => 'required|string|max:255',
            'password' => 'required|min:8',
            'dni' => 'required|string|min:8|unique:users',
            'phone' => 'required|string|unique:users',
            'salary' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            return redirect()->route('employees.create')->withErrors($validation)->withInput();
        } else {
            User::create($request->all());
            return redirect()->route('employees.index')->with('success', 'Employee created succesfully!');
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
        $employee = User::find($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = User::find($id);
        return view('employees.edit', compact('employee'));
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
        $employee = User::findOrFail($id);
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'cif_nif' => 'required|string|max:12',
            'type' => 'required',
            'image' => 'required|string|max:255',
            'password' => 'required|min:8',
            'dni' => 'required|string|min:8',
            'phone' => 'required|string',
            'salary' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            return redirect()->route('employees.edit', [$employee])->withErrors($validation)->withInput();
        } else {
            $employee->update($request->all());
            return redirect()->route('employees.index')->with("success", "Employee updated succesfully!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with("success", "Employee deleted succesfully!");
    }
}
