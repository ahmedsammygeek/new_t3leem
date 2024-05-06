<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Admins\StoreAdminRequest;
use App\Http\Requests\Board\Admins\UpdateAdminRequest;
use App\Models\User;
use App\Enums\UserType;
use Auth;
use Spatie\Permission\Models\Permission;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('board.admins.create' , compact('permissions') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = new User;
        $admin->name = $request->name;
        $admin->mobile = $request->mobile;
        if ($request->hasFile('image')) {
            $admin->image = basename($request->file('image')->store('admins'));
        }
        $admin->added_by = Auth::id();
        $admin->super_admin = $request->filled('is_super_admin') ? 1 : 0;
        $admin->notes = $request->notes;
        $admin->type = UserType::ADMIN;
        $admin->password = $request->password;
        $admin->is_blocked = $request->filled('is_active') ? 0 : 1;
        $admin->save();


        if ($request->filled('is_super_admin')) {
            $permissions = Permission::all();
            $admin->syncPermissions($permissions);
        } else {
            if ($request->filled('permissions')) {
                for ($i=0; $i < count($request->permissions) ; $i++) { 
                    Permission::firstOrCreate(['name' => $request->permissions[$i]]);
                }
                $admin->syncPermissions($request->permissions);
            }
        }

        if (Auth::user()->can('admins.index')) {
            return redirect(route('board.admins.index'))->with('success' , 'تم إضافه المشرف بنجاح');
        }
        return redirect(route('board.admins.create'))->with('success' , 'تم إضافه المشرف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        $admin->load('addedBy' , 'deletedBy');
        return view('board.admins.show' , compact('admin') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        $admin_permissions = $admin->permissions()->pluck('name')->toArray();
        $permissions = Permission::all()->groupBy('group_name');
        return view('board.admins.edit' , compact('admin' , 'permissions' , 'admin_permissions' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $admin)
    {
        $admin->name = $request->name;
        $admin->mobile = $request->mobile;
        if ($request->hasFile('image')) {
            $admin->image = basename($request->file('image')->store('admins'));
        }
        $admin->super_admin = $request->filled('is_super_admin') ? 1 : 0;
        $admin->notes = $request->notes;
        $admin->is_blocked = $request->filled('is_active') ? 0 : 1;
        $admin->save();


        if ($request->filled('is_super_admin')) {
            $permissions = Permission::all();
            $admin->syncPermissions($permissions);
        } else {
            if ($request->filled('permissions')) {
                $admin->syncPermissions($request->permissions);
            }
        }

        if (Auth::user()->can('admins.index')) {
            return redirect(route('board.admins.index'))->with('success' , 'تم إضافه المشرف بنجاح');
        }
        return redirect(route('board.admins.edit' , $admin ))->with('success' , 'تم إضافه المشرف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
