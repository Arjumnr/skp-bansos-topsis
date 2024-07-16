<?php

namespace App\Http\Controllers;

use App\Services\Contracts\OptionsContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOption\Option;

class OptionsController extends Controller
{
    protected $title = 'Options' , $optionsContract;
    public function __construct(OptionsContract $optionsContract)
    {
        $this->optionsContract = $optionsContract;
    } 
    public function index()
    {
        $title = $this->title;
        return view('options.index', compact('title'));    
    }

    public function paginated(Request $request)
    {
      try {

        $datas = $this->optionsContract->paginated($request);
        $data = $datas['data'];
        $view = view('options.data', compact('data'))->with('i', ($request->input('page', 1) -
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
          'opsi' => 'required',
          'kriteria_id' => 'required',
          'bobot' => 'required',
        ]);

        //IF FAIL
        if ($validatedData->fails()){
          return response()->json(['message' => "Terjadi Kesalahan"], 500);
        }

        $data = $request->all();

        return $this->optionsContract->store($data);

      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
      }
    }

    public function show($id)
    {
      try {
        $opstions = $this->optionsContract->find($id);

        return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $opstions], 200); 
      } catch (\Exception $e) {
        return response()->json(['message' => "Options Tidak Ditemukan"], 500);
      }
    }

    public function update(Request $request, $id)
    {
      try {
        // Validate the value...
        $validatedData = Validator::make($request->all(), [
          'opsi' => 'required',
          'kriteria_id' => 'required',
          'bobot' => 'required',
        ]);

        // if fail
        if ($validatedData->fails()) {
          return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
        }

        $data = $request->all();

        return $this->optionsContract->update($data, $id);
        
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }

    public function destroy($id)
    {
      try {
        $opstions = $this->optionsContract->delete($id);

        if ($opstions == 0) {
          return response()->json(['message' => 'Options not found!', 'code' => 404], 404);
        }


        return response()->json(['message' => 'Options has been deleted!', 'code' => 200], 200);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    }
}
