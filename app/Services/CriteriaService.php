<?php

namespace App\Services;

use App\Models\Blok;
use App\Models\Criteria;
use App\Models\Customer;
use App\Services\BaseRepository;
use App\Services\Contracts\CavlingContract;
use App\Services\Contracts\CriteriaContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $criterias = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $criterias = $this->model->where('nama_kriteria', 'LIKE', "%{$search}%")
                ->orWhere('pernyataan', 'LIKE', "%{$search}%")
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

    public function data()
    {
        return $this->model->newQuery();
    }

    public function findByCriteria(array $criteria): ?Model
    {
        return $this->model->where($criteria)->first();
    }


    public function update(array $request, $id)
    {
        return;
    }
}
