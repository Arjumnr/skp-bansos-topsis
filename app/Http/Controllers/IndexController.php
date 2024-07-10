<?php

namespace App\Http\Controllers;

use App\Services\Contracts\CriteriaContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    protected $title = 'Dashboard' , $criteriaContract;
    
    public function __construct(CriteriaContract $criteriaContract)
    {
        $this->criteriaContract = $criteriaContract;
    }

    public function index(){
        $title = $this->title;
        $total_criteria = $this->criteriaContract->data()->count();
        return view('dashboard.index', compact('title' , 'total_criteria'));
    }

}
