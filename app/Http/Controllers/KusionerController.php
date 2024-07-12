<?php

namespace App\Http\Controllers;

use App\Services\Contracts\KusionerContract;
use Illuminate\Http\Request;

class KusionerController extends Controller
{
    protected $title = 'Kusioner' , $kusionerContract;
    
    public function __construct(KusionerContract $kusionerContract)
    {
        $this->kusionerContract = $kusionerContract;
    }

    public function index(){
        $title = $this->title;
        // $total_criteria = $this->kusionerContract->data()->count();
        return view('kusioner.index', compact('title' ));
    }

    public function dataForm(){
        try {
            $data = $this->kusionerContract->data();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
