<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Universities\StoreUniversityRequest;
use App\Http\Requests\Board\Universities\UpdateUniversityRequest;

use App\Models\University;
use Auth;
class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.universities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        $university = new University;
        $university->name = $request->name;
        $university->user_id = Auth::id();
        $university->save();

        return redirect(route('board.universities.index'))->with('success' , 'تم اضافه الجامعه بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        return view('board.universities.show' , compact('university') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        return view('board.universities.edit' , compact('university') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityRequest $request,University $university)
    {
        $university->name = $request->name;
        $university->save();

        return redirect(route('board.universities.index'))->with('success' , 'تم تعديل بيانات الجامعه بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
