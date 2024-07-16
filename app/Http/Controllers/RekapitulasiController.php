<?php

namespace App\Http\Controllers;

use App\Services\Contracts\RekapitulasiContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RekapitulasiController extends Controller
{
    protected $title = 'Rekapitulasi' , $rekapitulasiContract;
    public function __construct(RekapitulasiContract $rekapitulasiContract)
    {
        $this->rekapitulasiContract = $rekapitulasiContract;
    } 
    public function index()
    {
        $title = $this->title;
        return view('rekapitulasi.index', compact('title'));    
    }

    public function paginated(Request $request)
    {
      try {
        $datas = $this->rekapitulasiContract->paginated($request);
        $data = $datas['data'];
        $view = view('rekapitulasi.data', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();
        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }
  

    public function destroy($id)
    {
      try {
        $kriteria = $this->rekapitulasiContract->deleteIdAll($id);

        if ($kriteria == 0) {
          return response()->json(['message' => 'Warga not found!', 'code' => 404], 404);
        }


        return response()->json(['message' => 'Warga has been deleted!', 'code' => 200], 200);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }
}
