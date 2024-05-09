<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Board\Teachers\StoreTeacherRequest;
use App\Http\Requests\Board\Teachers\UpdateTeacherRequest;

use App\Models\User;
use App\Enums\UserType;
use Auth;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('board.teachers.create' , compact('permissions') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = new User;
        $teacher->name = $request->name;
        $teacher->mobile = $request->mobile;
        if ($request->hasFile('image')) {
            $teacher->image = basename($request->file('image')->store('teachers'));
        }
        $teacher->added_by = Auth::id();
        $teacher->super_admin = 0;
        $teacher->notes = $request->notes;
        $teacher->type = UserType::TEACHER;
        $teacher->password = $request->password;
        $teacher->is_blocked = $request->filled('is_active') ? 0 : 1;
        $teacher->save();

        if ($request->filled('permissions')) {
            for ($i=0; $i < count($request->permissions) ; $i++) { 
                Permission::firstOrCreate(['name' => $request->permissions[$i]]);
            }
            $teacher->syncPermissions($request->permissions);
        }

        if (Auth::user()->can('teachers.index')) {
            return redirect(route('board.teachers.index'))->with('success' , 'تم إضافه الدكتور بنجاح');
        }
        return redirect(route('board.teachers.create'))->with('success' , 'تم إضافه الدكتور بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $teacher)
    {
        return view('board.teachers.show' , compact('teacher') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teacher)
    {
        $permissions = Permission::all()->groupBy('group_name');

        $teacher_permissions = $teacher->permissions()->pluck('name')->toArray();
        return view('board.teachers.edit' , compact('teacher' , 'permissions' , 'teacher_permissions' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, User $teacher)
    {
        $teacher->name = $request->name;
        $teacher->mobile = $request->mobile;
        if ($request->hasFile('image')) {
            $teacher->image = basename($request->file('image')->store('teachers'));
        }
        $teacher->notes = $request->notes;
        $teacher->is_blocked = $request->filled('is_active') ? 0 : 1;
        $teacher->save();

        if ($request->filled('permissions')) {
            for ($i=0; $i < count($request->permissions) ; $i++) { 
                Permission::firstOrCreate(['name' => $request->permissions[$i]]);
            }
            $teacher->syncPermissions($request->permissions);
        }

        if (Auth::user()->can('teachers.index')) {
            return redirect(route('board.teachers.index'))->with('success' , 'تم تعديل الدكتور بنجاح');
        }
        return redirect(route('board.teachers.create'))->with('success' , 'تم تعديل الدكتور بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
