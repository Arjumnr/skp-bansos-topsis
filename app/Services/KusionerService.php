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

    // public function paginated(Request $request)
    // {

    //     $search = [];
    //     $totalData = Kusioner::count();

    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');

    //     if (empty($request->input('search'))) {
    //         $kusioners = $this->model->orderBy('id', 'DESC')->paginate($limit);
    //     } else {
    //         $search = $request->input('search');

    //         // 'kepala_keluarga_id',
    //         // 'kriteria_id',
    //         // 'bobot_kriteria',
    //         // 'bobot_jawaban'
            

    //         $kusioners = $this->model->where('nama_kriteria', 'LIKE', "%{$search}%")
    //             ->orWhere('pernyataan', 'LIKE', "%{$search}%")
    //             ->orWhere('tipe', 'LIKE', "%{$search}%")
    //             ->orWhere('bobot', 'LIKE', "%{$search}%")
    //             ->paginate($limit);

    //         $totalFiltered = $this->model->where('nama_kriteria', 'LIKE', "%{$search}%")
    //             ->orWhere('pernyataan', 'LIKE', "%{$search}%")
    //             ->count();
    //     }

    //     $data = [];

    //     if (!empty($kusioners)) {
    //         // providing a dummy id instead of database ids
    //         foreach ($kusioners as $customer) {
    //             $nestedData['id'] = $customer->id;
    //             $nestedData['nama_kriteria'] = $customer->nama_kriteria;
    //             $nestedData['pernyataan'] = $customer->pernyataan;
    //             $nestedData['tipe'] = $customer->tipe;
    //             $nestedData['bobot'] = $customer->bobot;

    //             $data[] = $nestedData;
    //         }
    //     }

    //     return [
    //         'total_page' => $kusioners->lastPage(),
    //         'total_data' => $totalFiltered ?? 0,
    //         'code' => 200,
    //         'data' => $data,
    //     ];
    // }

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
        $bobot_jawaban = [];

        // Extract kriteria keys and build the kriteria_strings array
        foreach ($data as $key => $value) {
            if (preg_match('/kriteria_\d+/', $key)) {
                $kriteria_strings[] = $key;

                if (preg_match('/(\d+)/', $key, $matches)) {
                    $index = $matches[1];
                    // Add the corresponding value to bobot_jawaban array
                    $bobot_jawaban[] = $value;
                }
            }
        }

        // Initialize the array to store kriteria IDs
        $kriteria_id = [];
        // Extract the numeric part from the kriteria strings
        foreach ($kriteria_strings as $kriteria) {
            if (preg_match('/kriteria_(\d+)/', $kriteria, $matches)) {
                $kriteria_id[] = (int)$matches[1]; // Convert the extracted value to an integer and add to the array

                
            }
        }

        $bobot_kriteria = [];

        foreach ($kriteria_id as $id) {
            // Since $id might start from 1 and $dataKriteria indices start from 0, adjust accordingly
            $index = $id - 1; // Adjust index to match array indexing (if $id starts from 1)
        
            if (isset($dataKriteria[$index])) {
                $bobot = $dataKriteria[$index]->bobot;
                if ($bobot !== null) {
                    $bobot_kriteria[] = $bobot;
                }
            }
        }

        //gabung semua
        $datas = [
            'kepala_keluarga_id' => $kepala_keluarga_id,
            'kriteria_id' => $kriteria_id,
            'bobot_kriteria' => $bobot_kriteria,
            'bobot_jawaban' => $bobot_jawaban
        ];
            
        $datas = [];
        $count = count($kepala_keluarga_id); // Assuming all arrays are of the same length
        
        for ($i = 0; $i < $count; $i++) {
            $datas[] = [
                'kepala_keluarga_id' => $kepala_keluarga_id[$i],
                'kriteria_id' => $kriteria_id[$i],
                'bobot_kriteria' => $bobot_kriteria[$i],
                'bobot_jawaban' => $bobot_jawaban[$i],
            ];
        }
        
        // Now $datas should be structured correctly as a multidimensional array
        
        // Uncomment the following line to check $datas before storing
        // return response()->json($datas, 200);
        
        // Store data
        foreach ($datas as $data) {
            $kriteria = $this->model->create([
                'kepala_keluarga_id' => $data['kepala_keluarga_id'],
                'kriteria_id' => $data['kriteria_id'],
                'bobot_kriteria' => $data['bobot_kriteria'],
                'bobot_jawaban' => $data['bobot_jawaban']
            ]);
        }


        // Check if data is created
        if (!$kriteria) {
            return response()->json(['message' => "Kusioner Gagal Dibuat", 'code' => 400], 400);
        }

        // Kusioner created
        return response()->json(['message' => "Kusioner Berhasil Dibuat", 'code' => 201], 201);
        
    }

    // public function update(array $request, $id)
    // {
    //     $dataNew = [];
    //     $dataOld = $this->model->find($id);

    //     $dataNew['nama_kriteria'] = $request['nama_kriteria'];
    //     $dataNew['pernyataan'] = $request['pernyataan'];
    //     $dataNew['tipe'] = $request['tipe'];
    //     $dataNew['bobot'] = $request['bobot'];

    //     $update = $dataOld->update($dataNew);

    //     // Check if data is updated
    //     if (!$update) {
    //         return response()->json(['message' => "Kriteria Gagal Diupdate", 'code' => 400], 400);
    //     }

    //     return response()->json(['message' => "Kriteria Berhasil Diupdate", 'code' => 200], 200);
    // }

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
