<?php

namespace App\Services;

use App\Models\Kusioner;
use App\Models\Warga;
use App\Services\BaseRepository;
use App\Services\Contracts\WargaContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class WargaService extends BaseRepository implements WargaContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Warga $warga)
    {
        $this->model = $warga->whereNotNull('id');
    }

    public function paginated(Request $request)
    {

        $search = [];
        $totalData = Warga::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $wargas = $this->model->orderBy('id', 'DESC')->paginate($limit);
        } else {
            $search = $request->input('search');

            $wargas = $this->model->where('nik', 'LIKE', "%{$search}%")
                ->orWhere('kepala_keluarga', 'LIKE', "%{$search}%")
                ->orWhere('RT', 'LIKE', "%{$search}%")
                ->orWhere('RW', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('nik', 'LIKE', "%{$search}%")
                ->orWhere('pernyataan', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($wargas)) {
            // providing a dummy id instead of database ids
            foreach ($wargas as $warga) {
                $nestedData['id'] = $warga->id;
                $nestedData['nik'] = $warga->nik;
                $nestedData['kepala_keluarga'] = $warga->kepala_keluarga;
                $nestedData['rt'] = $warga->rt;
                $nestedData['rw'] = $warga->rw;

                $data[] = $nestedData;
            }
        }
        // return response()->json($data);

        return [
            'total_page' => $wargas->lastPage(),
            'total_data' => $totalFiltered ?? 0,
            'code' => 200,
            'data' => $data,
        ];
    }

    public function store(array $request)
    {
            $warga =  $this->model->create([
                'nik' => $request['nik'],
                'kepala_keluarga' => $request['kepala_keluarga'],
                'rt' => $request['rt'],
                'rw' => $request['rw'],
            ]);

            // Check if data is created
            if (!$warga) {
                return response()->json(['message' => "Customer Gagal Dibuat", 'code' => 400], 400);
            }

            // Customer created
            return response()->json(['message' => "Customer Berhasil Dibuat", 'code' => 201], 201);
        
    }

    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        $dataNew['nik'] = $request['nik'];
        $dataNew['kepala_keluarga'] = $request['kepala_keluarga'];
        $dataNew['rt'] = $request['rt'];
        $dataNew['rw'] = $request['rw'];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Warga Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Warga Berhasil Diupdate", 'code' => 200], 200);
    }

    //count data in dashboard
    public function data(){
        return $this->model->newQuery();
    }


    public function findByCriteria(array $criteria): ?Model
    {
        return $this->model->where($criteria)->first();
    }

    public function deleteByWarga($id)
    {
        Kusioner::where('kepala_keluarga_id', $id)->delete();   
        return $this->model->where('id', $id)->delete();
    }

    
}
