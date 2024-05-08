<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;

use App\Http\Requests\Board\Departments\StoreDepartmentRequest;
use App\Http\Requests\Board\Departments\UpdateDepartmentRequest;

use Auth;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::select('id' , 'name' )->get();
        return view('board.departments.create' , compact('faculties') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = new Department;
        $department->name = $request->name;
        $department->user_id = Auth::id();
        $department->faculty_id = $request->faculty_id;
        $department->save();

        return redirect(route('board.departments.index'))->with('success' , 'تم اضافه القسم بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $department->load('faculty' , 'user' );
        return view('board.departments.show' , compact('department' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $faculties = Faculty::select('id' , 'name' )->get();
        return view('board.departments.edit' , compact('faculties'  , 'department' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->name = $request->name;
        $department->faculty_id = $request->faculty_id;
        $department->save();
        return redirect(route('board.departments.index'))->with('success' , 'تم تعديل القسم بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
