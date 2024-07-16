<?php

namespace App\Services;

use App\Models\Kusioner;
use App\Services\BaseRepository;
use App\Services\Contracts\RekapitulasiContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class RekapitulasiService extends BaseRepository implements RekapitulasiContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Kusioner $kusioner)
    {
        $this->model = $kusioner->whereNotNull('id');
    }

    public function paginated(Request $request)
    {

        $search = [];
        $totalData = Kusioner::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $kusioners = $this->model->with('getWarga', 'getKriteria')->orderBy('id', 'DESC')->paginate($limit);
        } else {
            $search = $request->input('search');

            $kusioners = $this->model->where('bobot_jawaban', 'LIKE', "%{$search}%")
                ->orWhereHas('getWarga', function ($query) use ($search) {
                    $query->where('kepala_keluarga', 'like', "%{$search}%");
                })
                ->orWhereHas('getKriteria', function ($query) use ($search) {
                    $query->where('pernyataan', 'like', "%{$search}%");
                })
                ->paginate($limit);

            $totalFiltered = $this->model->where('bobot_jawaban', 'LIKE', "%{$search}%")
                ->orWhere('kepala_keluarga_id', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($kusioners)) {
            // providing a dummy id instead of database ids
            foreach ($kusioners as $kusioner) {
                $nestedData['id'] = $kusioner->id;
                $nestedData['kepala_keluarga_id'] = $kusioner->kepala_keluarga_id;
                $nestedData['kriteria_id'] = $kusioner->getKriteria->pernyataan;
                $nestedData['bobot_kriteria'] = $kusioner->bobot_kriteria;
                $nestedData['bobot_jawaban'] = $kusioner->bobot_jawaban;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $kusioners->lastPage(),
            'total_data' => $totalFiltered ?? 0,
            'code' => 200,
            'data' => $data,
        ];
    }

 
    

    //count data in dashboard
    public function data(){
        return $this->model->newQuery();
    }


    public function deleteIdAll($id){
        return $this->model->where('kepala_keluarga_id', $id)->delete();
        
    }


    
}
