<?php

namespace App\Services;

use App\Models\Options;
use App\Services\BaseRepository;
use App\Services\Contracts\OptionsContract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class OptionsService extends BaseRepository implements OptionsContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Options $options)
    {
        $this->model = $options->whereNotNull('id');
    }

    public function paginated(Request $request)
    {

        $search = [];
        $totalData = Options::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $options = $this->model->orderBy('id', 'DESC')->paginate($limit);
        } else {
            $search = $request->input('search');

            $options = $this->model->where('opsi', 'LIKE', "%{$search}%")
                ->orWhereHas('getKriteria', function ($query) use ($search) {
                    $query->where('pernyataan', 'like', "%{$search}%");
                })
                ->orWhere('bobot', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('opsi', 'LIKE', "%{$search}%")
                ->orWhere('bobot', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($options)) {
            // providing a dummy id instead of database ids
            foreach ($options as $customer) {
                $nestedData['id'] = $customer->id;
                $nestedData['opsi'] = $customer->opsi;
                $nestedData['kriteria_id'] = $customer->kriteria_id;
                $nestedData['bobot'] = $customer->bobot;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $options->lastPage(),
            'total_data' => $totalFiltered ?? 0,
            'code' => 200,
            'data' => $data,
        ];
    }

    public function store(array $request)
    {
            $opsi =  $this->model->create([
                'opsi' => $request['opsi'],
                'kriteria_id' => $request['kriteria_id'],
                'bobot' => $request['bobot'],
            ]);

            // Check if data is created
            if (!$opsi) {
                return response()->json(['message' => "Options Gagal Dibuat", 'code' => 400], 400);
            }

            // Options created
            return response()->json(['message' => "Options Berhasil Dibuat", 'code' => 201], 201);
        
    }

    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        $dataNew['opsi'] = $request['opsi'];
        $dataNew['kriteria_id'] = $request['kriteria_id'];
        $dataNew['bobot'] = $request['bobot'];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Options Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Options Berhasil Diupdate", 'code' => 200], 200);
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
