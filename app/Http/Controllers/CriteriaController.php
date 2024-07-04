<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index(){
        return view ('criteria.index');
    }
}
