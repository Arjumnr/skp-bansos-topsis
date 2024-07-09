<?php

namespace App\Http\Controllers;

use App\Services\Contracts\CriteriaContract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    protected $title = 'Kriteria' , $criteriaContract;
    public function __construct(CriteriaContract $criteriaContract)
    {
        $this->criteriaContract = $criteriaContract;
    } 
    public function index()
    {
        $title = $this->title;
        return view('criteria.index', compact('title'));    
    }

    public function paginated(Request $request)
    {
      try {
        $datas = $this->criteriaContract->paginated($request);
        $data = $datas['data'];
        $view = view('criteria.data', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();
        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }
  
    public function store(Request $request)
    {
      try{
        //VALIDATE THE VALUE
        $validatedData = Validator::make($request->all(), [
          'nama_kriteria' => 'required',
          'pernyataan' => 'required',
        ]);

        //IF FAIL
        if ($validatedData->fails()){
          return response()->json(['message' => "Terjadi Kesalahan"], 500);
        }

        $data = $request->all();

        return $this->criteriaContract->store($data);

      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function show($id)
    {
      try {
        $kriteria = $this->criteriaContract->find($id);

        return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $kriteria], 200); // ['data' => $kriteria
      } catch (\Exception $e) {
        return response()->json(['message' => "kriteria Tidak Ditemukan"], 500);
      }
    }

    public function update(Request $request, $id)
    {
      try {
        // Validate the value...
        $validatedData = Validator::make($request->all(), [
          'nama_kriteria' => 'required',
          'pernyataan' => 'required',
        ]);

        // if fail
        if ($validatedData->fails()) {
          return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
        }

        $data = $request->all();

        return $this->criteriaContract->update($data, $id);
        
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }

    public function destroy($id)
    {
      try {
        $kriteria = $this->criteriaContract->delete($id);

        if ($kriteria == 0) {
          return response()->json(['message' => 'kriteria not found!', 'code' => 404], 404);
        }


        return response()->json(['message' => 'kriteria has been deleted!', 'code' => 200], 200);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }
    
}
