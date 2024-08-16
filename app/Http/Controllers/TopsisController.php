<?php

namespace App\Http\Controllers;

use App\Services\Contracts\TopsisContract;
use Illuminate\Http\Request;

class TopsisController extends Controller
{
    protected $title = 'Topsis' , $topsisContract;
    public function __construct(TopsisContract $topsisContract)
    {
        $this->topsisContract = $topsisContract;
    } 
    public function index()
    {
        $title = $this->title;
        return view('topsis.index', compact('title'));    
    }

    public function paginated_data_penerima(Request $request)
    {
      try {
        // Mendapatkan data dari $this->topsisContract->paginated_data_penerima($request)
        $datas = $this->topsisContract->paginated_data_penerima($request);
        // return response()->json($datas, 200);
        $data = $datas['data'];
        
        $view = view('topsis.data', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();

        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      
      } catch (\Exception $e) {
          return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function paginated_keputusan_ternormalisasi(Request $request)
    {
      try {
        // Mendapatkan data dari $this->topsisContract->paginated_data_penerima($request)
        $datas = $this->topsisContract->paginated_keputusan_ternormalisasi($request);
        // return response()->json($datas, 200);
        $data = $datas['data'];
        
        $view = view('topsis.data2', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();

        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      
      } catch (\Exception $e) {
          return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function paginated_matriks_ternormalisasi_terbobot(Request $request)
    {
      try {
        // Mendapatkan data dari $this->topsisContract->paginated_data_penerima($request)
        $datas = $this->topsisContract->paginated_matriks_ternormalisasi_terbobot($request);
        // return response()->json($datas, 200);
        $data = $datas['data'];
        
        $view = view('topsis.data3', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();

        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      
      } catch (\Exception $e) {
          return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function paginated_solusi_ideal(Request $request)
    {
      try {
        $datas = $this->topsisContract->paginated_solusi_ideal($request);
        // return response()->json($datas, 200);
        $data = $datas['data'];
        
        $view = view('topsis.data4', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();

        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      
      } catch (\Exception $e) {
          return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function paginated_jarak_solusi_ideal(Request $request)
    {
      try {
        // Mendapatkan data dari $this->topsisContract->paginated_data_penerima($request)
        $datas = $this->topsisContract->paginated_jarak_solusi_ideal($request);
        // return response()->json($datas, 200);  
        
        $data = $datas['data'];
      
        $view = view('topsis.data5', compact('data'))->with('i', ($request->input('page', 1) -
          1) * $request->input('length'))->render();

        return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
      
      } catch (\Exception $e) {
          return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }
}
