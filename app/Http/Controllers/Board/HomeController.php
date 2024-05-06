<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
class HomeController extends Controller
{
    public function index()
    {

        // dd(Auth::user()->isSuperAdmin());
        return view('board.index');
    }


    public function test() {

        Auth::logout();

        // dd(Hash::make(90909090));
        // return redirect(route('board.home'))->with('success' , 'dsdsdsdsd' );
    }
}
