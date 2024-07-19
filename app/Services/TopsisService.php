<?php

namespace App\Services;

use App\Models\Criteria;
use App\Models\Kusioner;
use App\Models\Options;
use App\Services\BaseRepository;
use App\Services\Contracts\RekapitulasiContract;
use App\Services\Contracts\TopsisContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopsisService extends BaseRepository implements TopsisContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Kusioner $kusioner)
    {
        $this->model = $kusioner->whereNotNull('id');
    }

    // public function paginated_data_penerima(Request $request)
    // {
    //     $search = [];
    //     $totalData = Kusioner::count();

    //     // $totalFiltered = $totalData;

    //     $limit = $request->input('length');


    //     if (empty($request->input('search'))) {
    //         $kusioners = $this->model->with('getWarga', 'getKriteria', 'getOptions')->orderBy('id', 'DESC')->paginate($limit);
    //         // $kusioners = $this->model->with('getWarga', 'getKriteria', 'getOptions')->orderBy('id', 'DESC');
    //         // return response()->json($kusioners);
    //     } else {
    //         $search = $request->input('search');

    //         $kusioners = $this->model->where('kepala_keluarga_id', 'LIKE', "%{$search}%")
    //             ->orWhereHas('getWarga', function ($query) use ($search) {
    //                 $query->where('kepala_keluarga', 'like', "%{$search}%");
    //             })
    //             ->orWhereHas('getKriteria', function ($query) use ($search) {
    //                 $query->where('pernyataan', 'like', "%{$search}%");
    //             })
    //             ->orWhereHas('getOptions', function ($query) use ($search) {
    //                 $query->where('opsi', 'like', "%{$search}%");
    //             })
    //             ->paginate($limit);

    //         // $totalFiltered = $this->model->where('id', 'LIKE', "%{$search}%")
    //         //     ->orWhere('kepala_keluarga_id', 'LIKE', "%{$search}%")
    //         //     ->count();
    //     }

    //     // $totalData = $kusioners->groupBy('kepala_keluarga_id')->count();
    //     // return response()->json($totalData);

    //     $data = [];


    //     if (!empty($kusioners)) {
    //         $result = [];
        
    //         foreach ($kusioners as $kusioner) {
    //             $kepala_keluarga = $kusioner->getWarga->kepala_keluarga ?? null;
    //             $kriteria = $kusioner->getKriteria->pernyataan ?? null;
    //             $option = $kusioner->getOptions->opsi ?? null;
    //             $bobot = $kusioner->getOptions->bobot ?? null; // Asumsikan ada properti `bobot` dalam `getOptions`
        
    //             if ($kepala_keluarga && $kriteria) {
    //                 if (!isset($result[$kepala_keluarga])) {
    //                     $result[$kepala_keluarga] = ['kepala_keluarga' => $kepala_keluarga];
    //                 }
        
    //                 switch ($kriteria) {
    //                     case 'Jumlah Dinding':
    //                         $result[$kepala_keluarga]['jumlah_dinding'] = $option;
    //                         $result[$kepala_keluarga]['bobot_jd'] = $bobot;
    //                         break;
    //                     case 'Jenis Lantai':
    //                         $result[$kepala_keluarga]['jenis_lantai'] = $option;
    //                         $result[$kepala_keluarga]['bobot_jl'] = $bobot;
    //                         break;
    //                     case 'Pekerjaan':
    //                         $result[$kepala_keluarga]['pekerjaan'] = $option;
    //                         $result[$kepala_keluarga]['bobot_p'] = $bobot;
    //                         break;
    //                     case 'Jumlah Anggota Keluarga':
    //                         $result[$kepala_keluarga]['jumlah_anggota_keluarga'] = $option;
    //                         $result[$kepala_keluarga]['bobot_jak'] = $bobot;
    //                         break;
    //                     case 'Penghasilan Perbulan':
    //                         $result[$kepala_keluarga]['penghasilan_perbulan'] = $option;
    //                         $result[$kepala_keluarga]['bobot_pp'] = $bobot;
    //                         break;
    //                     // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
    //                 }
    //             }
    //         }

    //         $totalFiltered = count($result);
    //         // return response()->json([
    //         //     'total_filtered' => $totalFiltered 
    //         //    ,
    //         // ]);
            
    //         $data = array_values($result);
    //         //delete "result"
            

    //         return [
    //             'total_page' => $kusioners->lastPage(),
    //             'total_data' => $totalFiltered ,
    //             'code' => 200,
    //             'data' => $data,
    //         ];
    //     } else {
    //         return response()->json([
    //             'total_page' => 1,
    //             'total_data' => 0,
    //             'code' => 200,
    //             'data' => []
    //         ]);
    //     }
        

    // }
    
    public function paginated_data_penerima(Request $request)
{
    $search = $request->input('search', '');
    $limit = $request->input('length', 10);
    $page = $request->input('page', 1);

    $query = Kusioner::select(
            'kepala_keluarga_id',
            DB::raw('MIN(id) as id'),
            DB::raw('GROUP_CONCAT(kriteria_id) as kriteria_ids'),
            DB::raw('GROUP_CONCAT(option_id) as option_ids')
        )
        ->with('getWarga', 'getKriteria', 'getOptions')
        ->groupBy('kepala_keluarga_id');

    if (!empty($search)) {
        $query->where('kepala_keluarga_id', 'LIKE', "%{$search}%")
            ->orWhereHas('getWarga', function ($query) use ($search) {
                $query->where('kepala_keluarga', 'like', "%{$search}%");
            })
            ->orWhereHas('getKriteria', function ($query) use ($search) {
                $query->where('pernyataan', 'like', "%{$search}%");
            })
            ->orWhereHas('getOptions', function ($query) use ($search) {
                $query->where('opsi', 'like', "%{$search}%");
            });
    }

    $totalData = $query->get()->count();

    $kusioners = $query->orderBy('id', 'DESC')->paginate($limit, ['*'], 'page', $page);

    $result = [];

    foreach ($kusioners as $kusioner) {
        $kepala_keluarga = $kusioner->getWarga->kepala_keluarga ?? null;
        $kriteria_ids = explode(',', $kusioner->kriteria_ids);
        $option_ids = explode(',', $kusioner->option_ids);

        foreach ($kriteria_ids as $index => $kriteria_id) {
            $kriteria = Criteria::find($kriteria_id)->pernyataan ?? null;
            $option = Options::find($option_ids[$index])->opsi ?? null;
            $bobot = Options::find($option_ids[$index])->bobot ?? null;

            if ($kepala_keluarga && $kriteria) {
                if (!isset($result[$kepala_keluarga])) {
                    $result[$kepala_keluarga] = ['kepala_keluarga' => $kepala_keluarga];
                }

                switch ($kriteria) {
                    case 'Jenis Dinding':
                        $result[$kepala_keluarga]['jenis_dinding'] = $option;
                        $result[$kepala_keluarga]['bobot_jd'] = $bobot;
                        break;
                    case 'Jenis Lantai':
                        $result[$kepala_keluarga]['jenis_lantai'] = $option;
                        $result[$kepala_keluarga]['bobot_jl'] = $bobot;
                        break;
                    case 'Pekerjaan':
                        $result[$kepala_keluarga]['pekerjaan'] = $option;
                        $result[$kepala_keluarga]['bobot_p'] = $bobot;
                        break;
                    case 'Jumlah Anggota Keluarga':
                        $result[$kepala_keluarga]['jumlah_anggota_keluarga'] = $option;
                        $result[$kepala_keluarga]['bobot_jak'] = $bobot;
                        break;
                    case 'Penghasilan Perbulan':
                        $result[$kepala_keluarga]['penghasilan_perbulan'] = $option;
                        $result[$kepala_keluarga]['bobot_pp'] = $bobot;
                        break;
                    // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
                }
            }
        }
    }

    $data = array_values($result);
    $totalFiltered = count($data);

    // Paginate the structured data manually if needed
    $pagedData = array_slice($data, ($page - 1) * $limit, $limit);

    return [
        'total_page' => ceil($totalFiltered / $limit),
        'total_data' => $totalData,
        'code' => 200,
        'data' => $pagedData,
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
