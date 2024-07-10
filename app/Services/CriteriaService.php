<?php

namespace App\Services;

use App\Models\Criteria;
use App\Services\BaseRepository;
use App\Services\Contracts\CriteriaContract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class CriteriaService extends BaseRepository implements CriteriaContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Criteria $criteria)
    {
        $this->model = $criteria->whereNotNull('id');
    }

    public function paginated(Request $request)
    {

        $search = [];
        $totalData = Criteria::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $criterias = $this->model->orderBy('id', 'DESC')->paginate($limit);
        } else {
            $search = $request->input('search');

            $criterias = $this->model->where('nama_kriteria', 'LIKE', "%{$search}%")
                ->orWhere('pernyataan', 'LIKE', "%{$search}%")
                ->orWhere('tipe', 'LIKE', "%{$search}%")
                ->orWhere('bobot', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('nama_kriteria', 'LIKE', "%{$search}%")
                ->orWhere('pernyataan', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($criterias)) {
            // providing a dummy id instead of database ids
            foreach ($criterias as $customer) {
                $nestedData['id'] = $customer->id;
                $nestedData['nama_kriteria'] = $customer->nama_kriteria;
                $nestedData['pernyataan'] = $customer->pernyataan;
                $nestedData['tipe'] = $customer->tipe;
                $nestedData['bobot'] = $customer->bobot;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $criterias->lastPage(),
            'total_data' => $totalFiltered ?? 0,
            'code' => 200,
            'data' => $data,
        ];
    }

    public function store(array $request)
    {
            $kriteria =  $this->model->create([
                'nama_kriteria' => $request['nama_kriteria'],
                'pernyataan' => $request['pernyataan'],
                'tipe' => $request['tipe'],
                'bobot' => $request['bobot'],
            ]);

            // Check if data is created
            if (!$kriteria) {
                return response()->json(['message' => "Customer Gagal Dibuat", 'code' => 400], 400);
            }

            // Customer created
            return response()->json(['message' => "Customer Berhasil Dibuat", 'code' => 201], 201);
        
    }

    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        $dataNew['nama_kriteria'] = $request['nama_kriteria'];
        $dataNew['pernyataan'] = $request['pernyataan'];
        $dataNew['tipe'] = $request['tipe'];
        $dataNew['bobot'] = $request['bobot'];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Kriteria Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Kriteria Berhasil Diupdate", 'code' => 200], 200);
    }

    //count data in dashboard
    public function data(){
        return $this->model->newQuery();
    }


    public function findByCriteria(array $criteria): ?Model
    {
        return $this->model->where($criteria)->first();
    }


    
}
