<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\Contracts\CriteriaContract;
use App\Services\Contracts\KusionerContract;
use Illuminate\Http\Request;

class KusionerController extends Controller
{
    protected $title = 'Kusioner' , $kusionerContract, $criteriaContract;
    
    public function __construct(
        KusionerContract $kusionerContract,
        CriteriaContract $criteriaContract
        )
    {
        $this->kusionerContract = $kusionerContract;
        $this->criteriaContract = $criteriaContract;
    }

    public function index(){
        $title = $this->title;
        // $total_criteria = $this->kusionerContract->data()->count();
        return view('kusioner.index', compact('title'));
    }

    public function dataForm(){
        try {
            $data = $this->kusionerContract->data();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $data = $request->all();
            

            // $bobot_jawaban = [];

            // return response()->json([
            //     'message' => 'success', 
            //     'data' => $data,
            //     'kriteri_string' => $kriteria_strings,
            //     'kepala_keluarga_id' => $data['kepala_keluarga_id'],
            //     'kriteria_id' => $kriteria_id,
            //     'bobot_kriteria' => $bobot_kriteria,
            //     'bobot_jawaban' => $bobot_jawaban
            //     // 'kriteria' => $dataKriteria
            // ],200);


            return $this->kusionerContract->store($data);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
