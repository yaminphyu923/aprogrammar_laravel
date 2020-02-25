<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Receipes;

class ReceipeController extends Controller
{
    public function index()
    {
    	$data = Receipes::all();
    	return view('home',compact('data'));
    }
}
