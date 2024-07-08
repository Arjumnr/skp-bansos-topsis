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

    // public function data (Request $request){
    //     try{
    //         $data_criteria = $this->criteriaContract->data($request)->count();
    //         $data = [
    //             'criteria' => $data_criteria
    //         ];

    //         $view =  view('dashboard.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $request->input('length'))->render();
            
    //         return response()->json(['html' => $view, 'message' => 'Success!'], 200);

    //     } catch (\Exception $e) {
    //         return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    //     }
    // }
}
