<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index(){
        return view('kerusakan.index');
    }
}
