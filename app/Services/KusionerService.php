<?php

namespace App\Services;

use App\Models\Criteria;
use App\Models\Kusioner;
use App\Models\Warga;
use App\Services\BaseRepository;
use App\Services\Contracts\KusionerContract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class KusionerService extends BaseRepository implements KusionerContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Kusioner $kusioner)
    {
        $this->model = $kusioner->whereNotNull('id');
    }

    public function store(array $request)
    {

        $data = $request;
       

        $dataKriteria = Criteria::all();

        $kepala_keluarga_id = [];
        // looping 5 kalai
        for ($i = 0; $i < 5; $i++) {
            $kepala_keluarga_id[] = $request['kepala_keluarga_id'];
        }

           // Initialize the array to store kriteria strings
        $kriteria_strings = [];
        $option_id = [];

        // Extract kriteria keys and build the kriteria_strings array
        foreach ($data as $key => $value) {
            if (preg_match('/kriteria_\d+/', $key)) {
                $kriteria_strings[] = $key;

                if (preg_match('/(\d+)/', $key, $matches)) {
                    $index = $matches[1];
                    // Add the corresponding value to option_id array
                    $option_id[] = $value;
                }
            }
        }

        // return response()->json([
        //     'kepala_keluarga_id' => $kepala_keluarga_id,    
        //     'kriteria_strings' => $kriteria_strings,
        //     'option_id' => $option_id
        // ]); 

        // Initialize the array to store kriteria IDs
        $kriteria_id = [];
        // Extract the numeric part from the kriteria strings
        foreach ($kriteria_strings as $kriteria) {
            if (preg_match('/kriteria_(\d+)/', $kriteria, $matches)) {
                $kriteria_id[] = (int)$matches[1]; // Convert the extracted value to an integer and add to the array

                
            }
        }

        

        //gabung semua
        $datas = [
            'kepala_keluarga_id' => $kepala_keluarga_id,
            'kriteria_id' => $kriteria_id,
            'option_id' => $option_id
        ];

            
        $datas = [];
        $count = count($kepala_keluarga_id); // Assuming all arrays are of the same length
        
        for ($i = 0; $i < $count; $i++) {
            $datas[] = [
                'kepala_keluarga_id' => $kepala_keluarga_id[$i],
                'kriteria_id' => $kriteria_id[$i],
                'option_id' => $option_id[$i],
            ];
        }
        // return response()->json($datas, 200);

        
        // Now $datas should be structured correctly as a multidimensional array
        
        // Uncomment the following line to check $datas before storing
        // return response()->json($datas, 200);
        
        // Store data
        foreach ($datas as $data) {
            $kriteria = $this->model->create([
                'kepala_keluarga_id' => $data['kepala_keluarga_id'],
                'kriteria_id' => $data['kriteria_id'],
                'option_id' => $data['option_id']
            ]);
        }


        // Check if data is created
        if (!$kriteria) {
            return response()->json(['message' => "Kusioner Gagal Dibuat", 'code' => 400], 400);
        }

        // Kusioner created
        return response()->json(['message' => "Kusioner Berhasil Dibuat", 'code' => 201], 201);
        
    }


    //count data in dashboard
    public function data(){
        $dataWarga = Warga::all();
        $dataKriteria = Criteria::all();
        return [
            'dataWarga' => $dataWarga,
            'dataKriteria' => $dataKriteria,
        ];
    }


    // public function findByCriteria(array $kusioner): ?Model
    // {
    //     return $this->model->where($kusioner)->first();
    // }


    
}
