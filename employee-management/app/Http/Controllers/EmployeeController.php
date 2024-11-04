<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view(
            'list',
            ['employees' => $employees]
        );
    }


    public function create()
    {
        $employee = new Employee();
        return view(
            'form',
            [
                'employee' => $employee,
                'action' => 'Create',
                'actionUrl' => 'store'
            ]
        );
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer'
        ]);

        Employee::create($validationData);

        return redirect('/')->with('success', 'User created successfully');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('form', [
            'employee' => $employee,
            'actions' => 'Update',
            'actionsUrl' => 'update' . $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validationData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer'
        ]);

        $employee = Employee::findOrFail($id);

        $employee->name = $validationData['name'];
        $employee->age = $validationData['age'];
        $employee->save();

        return view('/')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/')->with('success', 'User deleted successfully');
    }
}
