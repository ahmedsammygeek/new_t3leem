<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Faculties\StoreFacultyRequest;
use App\Http\Requests\Board\Faculties\UpdateFacultyRequest;
use App\Models\Faculty;
use Auth;

class FacultyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.faculties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        $faculty = new Faculty;
        $faculty->user_id = Auth::id();
        $faculty->name = $request->name;
        $faculty->save();


        return redirect(route('board.faculties.index'))->with('success' , 'تم اضافه الكليه بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        $faculty->load('user');
        return view('board.faculties.show' , compact('faculty') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view('board.faculties.edit' , compact('faculty') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {

        $faculty->name = $request->name;
        $faculty->save();
        return redirect(route('board.faculties.index'))->with('success' , 'تم تعديل الكليه بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
