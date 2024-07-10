<?php

namespace App\Http\Controllers;

use App\Services\Contracts\WargaContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    protected $title = 'Warga' , $wargaContract;
    public function __construct(WargaContract $wargaContract)
    {
        $this->wargaContract = $wargaContract;
    } 
    public function index()
    {
        $title = $this->title;
        return view('warga.index', compact('title'));    
    }

    public function paginated(Request $request)
    {
      try {
        $datas = $this->wargaContract->paginated($request);
        $data = $datas['data'];
        $view = view('warga.data', compact('data'))->with('i', ($request->input('page', 1) -
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
          'nik' => 'required',
          'kepala_keluarga' => 'required',
          'rt' => 'required',
          'rw' => 'required',
        ]);

        //IF FAIL
        if ($validatedData->fails()){
          return response()->json(['message' => "Terjadi Kesalahan"], 500);
        }

        $data = $request->all();

        return $this->wargaContract->store($data);

      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function show($id)
    {
      try {
        $kriteria = $this->wargaContract->find($id);

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
          'nik' => 'required',
          'kepala_keluarga' => 'required',
          'rt' => 'required',
          'rw' => 'required',
        ]);

        // if fail
        if ($validatedData->fails()) {
          return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
        }

        $data = $request->all();

        return $this->wargaContract->update($data, $id);
        
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }

    public function destroy($id)
    {
      try {
        $kriteria = $this->wargaContract->delete($id);

        if ($kriteria == 0) {
          return response()->json(['message' => 'Warga not found!', 'code' => 404], 404);
        }


        return response()->json(['message' => 'Warga has been deleted!', 'code' => 200], 200);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }
}
