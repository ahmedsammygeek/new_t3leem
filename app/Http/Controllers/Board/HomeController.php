<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
class HomeController extends Controller
{
    public function index()
    {

        // dd(Auth::user()->isSuperAdmin());
        return view('board.index');
    }


    public function test() {

        dd('test here your code');
        // Auth::logout();
        // dd(Hash::make(90909090));
        // return redirect(route('board.home'))->with('success' , 'dsdsdsdsd' );
    }
}
