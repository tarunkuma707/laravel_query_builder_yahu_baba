<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$employees  = Employee::get();
        //return $employees->roles;
        
        // // foreach($employees->roles as $role){
        // //     echo $role->role_name."<br>";
        // // }
        // foreach($employees as $employee){
        //     echo $employee->name."<br>";
        //     echo $employee->email."<br>";
        //     foreach($employee->roles as $role){
        //         echo $role->role_name." / ";
        //     }
        //     echo "<hr>";
        // }
        $employees  = Employee::with("company")->with("phoneNumber")->get();
        //return $employees;
        foreach($employees as $employee){
            echo "<h3>".$employee->name." | ".$employee->email." | ".$employee->company->company_name." | ".$employee->phoneNumber->number."</h4>";
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employee   =   Employee::find(1);
        //$employee->roles()->attach([1,3]);
        $employee->roles()->sync(3);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
