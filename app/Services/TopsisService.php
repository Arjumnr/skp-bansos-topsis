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
        // $page = $request->input('page', 1);

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
        // $totalData =intval($totalData / 5) +1 ;

        // return response()->json($totalData);
        $kusioners = $query->orderBy('id', 'DESC')->paginate($limit);

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
        

        return [
            'total_page' => $kusioners->lastPage(),
            'total_data' => $totalData,
            'code' => 200,
            'data' => $data,
        ];
    }


    public function paginated_keputusan_ternormalisasi(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('length', 10);

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

        // return response()->json($totalData);

        $kusioners = $query->orderBy('id', 'DESC')->paginate($limit);

        $result = [];
        $sumSquares = [
            'bobot_pp' => 0,
            'bobot_jak' => 0,
            'bobot_p' => 0,
            'bobot_jl' => 0,
            'bobot_jd' => 0
        ];

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
                            $result[$kepala_keluarga]['bobot_jd'] = $bobot;
                            $sumSquares['bobot_jd'] += $bobot ** 2;
                            break;
                        case 'Jenis Lantai':
                            $result[$kepala_keluarga]['bobot_jl'] = $bobot;
                            $sumSquares['bobot_jl'] += $bobot ** 2;
                            break;
                        case 'Pekerjaan':
                            $result[$kepala_keluarga]['bobot_p'] = $bobot;
                            $sumSquares['bobot_p'] += $bobot ** 2;
                            break;
                        case 'Jumlah Anggota Keluarga':
                            $result[$kepala_keluarga]['bobot_jak'] = $bobot;
                            $sumSquares['bobot_jak'] += $bobot ** 2;
                            break;
                        case 'Penghasilan Perbulan':
                            $result[$kepala_keluarga]['bobot_pp'] = $bobot;
                            $sumSquares['bobot_pp'] += $bobot ** 2;
                            break;
                        // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
                    }
                }
            }
        }

        // return response()->json($result);

        // Normalize the data
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($sumSquares as $key => $sumSquare) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] =  round($result[$kepala_keluarga][$key] / sqrt($sumSquare), 3);
                }
            }
        }

        $data = array_values($result);

        return [
            'total_page' => $kusioners->lastPage(),
            'total_data' => $totalData,
            'code' => 200,
            'data' => $data,
        ];

    }


    public function paginated_matriks_ternormalisasi_terbobot(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('length');

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

        // return $limit;

        $kusioners = $query->orderBy('id', 'DESC')->paginate($limit);

        $result = [];

        $sumSquares = [
            'bobot_pp' => 0,
            'bobot_jak' => 0,
            'bobot_p' => 0,
            'bobot_jl' => 0,
            'bobot_jd' => 0
        ];

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
                            $result[$kepala_keluarga]['bobot_jd'] = $bobot;
                            $sumSquares['bobot_jd'] += $bobot ** 2;
                            break;
                        case 'Jenis Lantai':
                            $result[$kepala_keluarga]['bobot_jl'] = $bobot;
                            $sumSquares['bobot_jl'] += $bobot ** 2;
                            break;
                        case 'Pekerjaan':
                            $result[$kepala_keluarga]['bobot_p'] = $bobot;
                            $sumSquares['bobot_p'] += $bobot ** 2;
                            break;
                        case 'Jumlah Anggota Keluarga':
                            $result[$kepala_keluarga]['bobot_jak'] = $bobot;
                            $sumSquares['bobot_jak'] += $bobot ** 2;
                            break;
                        case 'Penghasilan Perbulan':
                            $result[$kepala_keluarga]['bobot_pp'] = $bobot;
                            $sumSquares['bobot_pp'] += $bobot ** 2;
                            break;
                        // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
                    }
                }
            }
        }

        // Normalize the data
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($sumSquares as $key => $sumSquare) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] =  round($result[$kepala_keluarga][$key] / sqrt($sumSquare), 3);
                }
            }
        }

        $bobotKriteria = [
            'bobot_pp' => 5,
            'bobot_jak' => 4,
            'bobot_p' => 4,
            'bobot_jl' => 4,
            'bobot_jd' => 5
        ];
        // return $result;

        
        // //matriks ternormalisasi terbobot = hasil normalisasi x bobot kriteria
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($bobotKriteria as $key => $bobot) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] =  round($result[$kepala_keluarga][$key] * $bobot, 3);
                }
            }
        }


        $data = array_values($result);

        return [
            'total_page' => $kusioners->lastPage(),
            'total_data' => $totalData,
            'code' => 200,
            'data' => $data,
        ];

    }

    // public function paginated_solusi_ideal(Request $request)
    // {
    //     $search = $request->input('search', '');
    //     $limit = $request->input('length', 10);

    //     $query = Kusioner::select(
    //             'kepala_keluarga_id',
    //             DB::raw('MIN(id) as id'),
    //             DB::raw('GROUP_CONCAT(kriteria_id) as kriteria_ids'),
    //             DB::raw('GROUP_CONCAT(option_id) as option_ids')
    //         )
    //         ->with('getWarga', 'getKriteria', 'getOptions')
    //         ->groupBy('kepala_keluarga_id');

    //     if (!empty($search)) {
    //         $query->where('kepala_keluarga_id', 'LIKE', "%{$search}%")
    //             ->orWhereHas('getWarga', function ($query) use ($search) {
    //                 $query->where('kepala_keluarga', 'like', "%{$search}%");
    //             })
    //             ->orWhereHas('getKriteria', function ($query) use ($search) {
    //                 $query->where('pernyataan', 'like', "%{$search}%");
    //             })
    //             ->orWhereHas('getOptions', function ($query) use ($search) {
    //                 $query->where('opsi', 'like', "%{$search}%");
    //             });
    //     }

    //     $totalData = $query->get()->count();

    //     // return response()->json($totalData);

    //     $kusioners = $query->orderBy('id', 'DESC')->paginate($limit);

    //     $result = [];

    //     $sumSquares = [
    //         'bobot_pp' => 0,
    //         'bobot_jak' => 0,
    //         'bobot_p' => 0,
    //         'bobot_jl' => 0,
    //         'bobot_jd' => 0
    //     ];

    //     foreach ($kusioners as $kusioner) {
    //         $kepala_keluarga = $kusioner->getWarga->kepala_keluarga ?? null;
    //         $kriteria_ids = explode(',', $kusioner->kriteria_ids);
    //         $option_ids = explode(',', $kusioner->option_ids);

    //         foreach ($kriteria_ids as $index => $kriteria_id) {
    //             $kriteria = Criteria::find($kriteria_id)->pernyataan ?? null;
    //             $option = Options::find($option_ids[$index])->opsi ?? null;
    //             $bobot = Options::find($option_ids[$index])->bobot ?? null;

    //             if ($kepala_keluarga && $kriteria) {
    //                 if (!isset($result[$kepala_keluarga])) {
    //                     $result[$kepala_keluarga] = ['kepala_keluarga' => $kepala_keluarga];
    //                 }

    //                 switch ($kriteria) {
    //                     case 'Jenis Dinding':
    //                         $result[$kepala_keluarga]['bobot_jd'] = $bobot;
    //                         $sumSquares['bobot_jd'] += $bobot ** 2;
    //                         break;
    //                     case 'Jenis Lantai':
    //                         $result[$kepala_keluarga]['bobot_jl'] = $bobot;
    //                         $sumSquares['bobot_jl'] += $bobot ** 2;
    //                         break;
    //                     case 'Pekerjaan':
    //                         $result[$kepala_keluarga]['bobot_p'] = $bobot;
    //                         $sumSquares['bobot_p'] += $bobot ** 2;
    //                         break;
    //                     case 'Jumlah Anggota Keluarga':
    //                         $result[$kepala_keluarga]['bobot_jak'] = $bobot;
    //                         $sumSquares['bobot_jak'] += $bobot ** 2;
    //                         break;
    //                     case 'Penghasilan Perbulan':
    //                         $result[$kepala_keluarga]['bobot_pp'] = $bobot;
    //                         $sumSquares['bobot_pp'] += $bobot ** 2;
    //                         break;
    //                     // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
    //                 }
    //             }
    //         }
    //     }

    //     // Normalize the data
    //     foreach ($result as $kepala_keluarga => $data) {
    //         foreach ($sumSquares as $key => $sumSquare) {
    //             if (isset($result[$kepala_keluarga][$key])) {
    //                 $result[$kepala_keluarga][$key] =  round($result[$kepala_keluarga][$key] / sqrt($sumSquare), 3);
    //             }
    //         }
    //     }

    //     $bobotKriteria = [
    //         'bobot_pp' => 5,
    //         'bobot_jak' => 4,
    //         'bobot_p' => 4,
    //         'bobot_jl' => 4,
    //         'bobot_jd' => 5
    //     ];
    //     // return $result;

        
    //     // //matriks ternormalisasi terbobot = hasil normalisasi x bobot kriteria
    //     foreach ($result as $kepala_keluarga => $data) {
    //         foreach ($bobotKriteria as $key => $bobot) {
    //             if (isset($result[$kepala_keluarga][$key])) {
    //                 $result[$kepala_keluarga][$key] =  round($result[$kepala_keluarga][$key] * $bobot, 3);
    //             }
    //         }
    //     }


    //     //menentukan solusi ideal positif dan negatif dengan data yang berisi array kriteria, positif dan negatif / kriteria 
    //     $kriteria = [];
    //     $dataKriteria = Criteria::all();
    //     // mengambil pernyataan kriteria
    //     foreach ($dataKriteria as $key => $data) {
    //         $kriteria[$data->id] = $data->pernyataan;
    //     }

    //     //mengambil data tertinggi dari tiap kriteria
    //     // Menentukan solusi ideal positif dan negatif
    //     $kriteria = [];
    //     $dataKriteria = Criteria::all();
    //     foreach ($dataKriteria as $data) {
    //         $kriteria[$data->id] = $data->pernyataan;
    //     }

    //     $positif = [];
    //     $negatif = [];
    //     foreach ($result as $kepala_keluarga => $data) {
    //         foreach ($bobotKriteria as $key => $bobot) {
    //             if (isset($result[$kepala_keluarga][$key])) {
    //                 if (!isset($positif[$key]) || $result[$kepala_keluarga][$key] > $positif[$key]) {
    //                     $positif[$key] = $result[$kepala_keluarga][$key];
    //                 }
    //                 if (!isset($negatif[$key]) || $result[$kepala_keluarga][$key] < $negatif[$key]) {
    //                     $negatif[$key] = $result[$kepala_keluarga][$key];
    //                 }
    //             }
    //         }
    //     }

    //     // Menyatukan kriteria, positif, dan negatif
    //     $finalResult = [];
    //     foreach ($kriteria as $key => $value) {
    //         $finalResult[] = [
    //             'kriteria' => $value,
    //             'positif' => $positif[$key] ?? null,
    //             'negatif' => $negatif[$key] ?? null,
    //         ];
    //     }
    //     return $finalResult;
        


    //     $data = array_values($result);
    //     $totalFiltered = count($data);

    //     return [
    //         'total_page' => intval($totalData /5) + 1,
    //         'total_data' => $totalData,
    //         'code' => 200,
    //         'data' => $data,
    //     ];

    // }

    
    public function paginated_solusi_ideal(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('length', 10);

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

        $kusioners = $query->orderBy('id', 'DESC')->paginate($limit);

        $result = [];

        $sumSquares = [
            'bobot_pp' => 0,
            'bobot_jak' => 0,
            'bobot_p' => 0,
            'bobot_jl' => 0,
            'bobot_jd' => 0
        ];

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
                            $result[$kepala_keluarga]['bobot_jd'] = $bobot;
                            $sumSquares['bobot_jd'] += $bobot ** 2;
                            break;
                        case 'Jenis Lantai':
                            $result[$kepala_keluarga]['bobot_jl'] = $bobot;
                            $sumSquares['bobot_jl'] += $bobot ** 2;
                            break;
                        case 'Pekerjaan':
                            $result[$kepala_keluarga]['bobot_p'] = $bobot;
                            $sumSquares['bobot_p'] += $bobot ** 2;
                            break;
                        case 'Jumlah Anggota Keluarga':
                            $result[$kepala_keluarga]['bobot_jak'] = $bobot;
                            $sumSquares['bobot_jak'] += $bobot ** 2;
                            break;
                        case 'Penghasilan Perbulan':
                            $result[$kepala_keluarga]['bobot_pp'] = $bobot;
                            $sumSquares['bobot_pp'] += $bobot ** 2;
                            break;
                        // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
                    }
                }
            }
        }

        // Normalize the data
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($sumSquares as $key => $sumSquare) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] = round($result[$kepala_keluarga][$key] / sqrt($sumSquare), 3);
                }
            }
        }

        $bobotKriteria = [
            'bobot_pp' => 5,
            'bobot_jak' => 4,
            'bobot_p' => 4,
            'bobot_jl' => 4,
            'bobot_jd' => 5
        ];

        // Matriks ternormalisasi terbobot = hasil normalisasi x bobot kriteria
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($bobotKriteria as $key => $bobot) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] = round($result[$kepala_keluarga][$key] * $bobot, 3);
                }
            }
        }

        // Menentukan solusi ideal positif dan negatif
        $kriteria = [];
        $dataKriteria = Criteria::all();
        foreach ($dataKriteria as $data) {
            $kriteria[$data->id] = $data->pernyataan;
        }

        $positif = [];
        $negatif = [];
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($bobotKriteria as $key => $bobot) {
                if (isset($data[$key])) {
                    if (!isset($positif[$key]) || $data[$key] > $positif[$key]) {
                        $positif[$key] = $data[$key];
                    }
                    if (!isset($negatif[$key]) || $data[$key] < $negatif[$key]) {
                        $negatif[$key] = $data[$key];
                    }
                }
            }
        }

        // Menyatukan kriteria, positif, dan negatif
        $result = [];
        $i = 1;
        foreach ($bobotKriteria as $key => $bobot) {
            $result[] = [
                'kriteria' => $kriteria[$i++],
                'positif' => $positif[$key] ?? null,
                'negatif' => $negatif[$key] ?? null,
            ];
        }
        // return $result;

        $data = array_values($result);
        $totalData = count($data);

        return [
            'total_page' => intval($totalData /5),
            'total_data' => $totalData,
            'code' => 200,
            'data' => $data,
        ];
    }
    
    // public function paginated_jarak_solusi_ideal(Request $request)
    // {
    //     $search = $request->input('search', '');
    //     $limit = $request->input('length', 10);

    //     $query = Kusioner::select(
    //             'kepala_keluarga_id',
    //             DB::raw('MIN(id) as id'),
    //             DB::raw('GROUP_CONCAT(kriteria_id) as kriteria_ids'),
    //             DB::raw('GROUP_CONCAT(option_id) as option_ids')
    //         )
    //         ->with('getWarga', 'getKriteria', 'getOptions')
    //         ->groupBy('kepala_keluarga_id');

    //     if (!empty($search)) {
    //         $query->where('kepala_keluarga_id', 'LIKE', "%{$search}%")
    //             ->orWhereHas('getWarga', function ($query) use ($search) {
    //                 $query->where('kepala_keluarga', 'like', "%{$search}%");
    //             })
    //             ->orWhereHas('getKriteria', function ($query) use ($search) {
    //                 $query->where('pernyataan', 'like', "%{$search}%");
    //             })
    //             ->orWhereHas('getOptions', function ($query) use ($search) {
    //                 $query->where('opsi', 'like', "%{$search}%");
    //             });
    //     }

    //     $totalData = $query->get()->count();

    //     $kusioners = $query->orderBy('id', 'DESC')->paginate($limit);

    //     $result = [];

    //     $sumSquares = [
    //         'bobot_pp' => 0,
    //         'bobot_jak' => 0,
    //         'bobot_p' => 0,
    //         'bobot_jl' => 0,
    //         'bobot_jd' => 0
    //     ];

    //     foreach ($kusioners as $kusioner) {
    //         $kepala_keluarga = $kusioner->getWarga->kepala_keluarga ?? null;
    //         $kriteria_ids = explode(',', $kusioner->kriteria_ids);
    //         $option_ids = explode(',', $kusioner->option_ids);

    //         foreach ($kriteria_ids as $index => $kriteria_id) {
    //             $kriteria = Criteria::find($kriteria_id)->pernyataan ?? null;
    //             $option = Options::find($option_ids[$index])->opsi ?? null;
    //             $bobot = Options::find($option_ids[$index])->bobot ?? null;

    //             if ($kepala_keluarga && $kriteria) {
    //                 if (!isset($result[$kepala_keluarga])) {
    //                     $result[$kepala_keluarga] = ['kepala_keluarga' => $kepala_keluarga];
    //                 }

    //                 switch ($kriteria) {
    //                     case 'Jenis Dinding':
    //                         $result[$kepala_keluarga]['bobot_jd'] = $bobot;
    //                         $sumSquares['bobot_jd'] += $bobot ** 2;
    //                         break;
    //                     case 'Jenis Lantai':
    //                         $result[$kepala_keluarga]['bobot_jl'] = $bobot;
    //                         $sumSquares['bobot_jl'] += $bobot ** 2;
    //                         break;
    //                     case 'Pekerjaan':
    //                         $result[$kepala_keluarga]['bobot_p'] = $bobot;
    //                         $sumSquares['bobot_p'] += $bobot ** 2;
    //                         break;
    //                     case 'Jumlah Anggota Keluarga':
    //                         $result[$kepala_keluarga]['bobot_jak'] = $bobot;
    //                         $sumSquares['bobot_jak'] += $bobot ** 2;
    //                         break;
    //                     case 'Penghasilan Perbulan':
    //                         $result[$kepala_keluarga]['bobot_pp'] = $bobot;
    //                         $sumSquares['bobot_pp'] += $bobot ** 2;
    //                         break;
    //                     // Tambahkan case untuk kriteria lainnya sesuai kebutuhan
    //                 }
    //             }
    //         }
    //     }

    //     // Normalize the data
    //     foreach ($result as $kepala_keluarga => $data) {
    //         foreach ($sumSquares as $key => $sumSquare) {
    //             if (isset($result[$kepala_keluarga][$key])) {
    //                 $result[$kepala_keluarga][$key] = round($result[$kepala_keluarga][$key] / sqrt($sumSquare), 3);
    //             }
    //         }
    //     }

    //     $bobotKriteria = [
    //         'bobot_pp' => 5,
    //         'bobot_jak' => 4,
    //         'bobot_p' => 4,
    //         'bobot_jl' => 4,
    //         'bobot_jd' => 5
    //     ];

    //     // Matriks ternormalisasi terbobot = hasil normalisasi x bobot kriteria
    //     foreach ($result as $kepala_keluarga => $data) {
    //         foreach ($bobotKriteria as $key => $bobot) {
    //             if (isset($result[$kepala_keluarga][$key])) {
    //                 $result[$kepala_keluarga][$key] = round($result[$kepala_keluarga][$key] * $bobot, 3);
    //             }
    //         }
    //     }

    //     // Menentukan solusi ideal positif dan negatif
    //     $kriteria = [];
    //     $dataKriteria = Criteria::all();
    //     foreach ($dataKriteria as $data) {
    //         $kriteria[$data->id] = $data->pernyataan;
    //     }

    //     $positif = [];
    //     $negatif = [];
    //     foreach ($result as $kepala_keluarga => $data) {
    //         foreach ($bobotKriteria as $key => $bobot) {
    //             if (isset($data[$key])) {
    //                 if (!isset($positif[$key]) || $data[$key] > $positif[$key]) {
    //                     $positif[$key] = $data[$key];
    //                 }
    //                 if (!isset($negatif[$key]) || $data[$key] < $negatif[$key]) {
    //                     $negatif[$key] = $data[$key];
    //                 }
    //             }
    //         }
    //     }

    //     // Hitung jarak ke solusi ideal positif dan negatif
    //     foreach ($result as $kepala_keluarga => $data) {
    //         $result[$kepala_keluarga]['D_plus'] = 0;
    //         $result[$kepala_keluarga]['D_minus'] = 0;

    //         foreach ($bobotKriteria as $key => $bobot) {
    //             if (isset($data[$key])) {
    //                 $result[$kepala_keluarga]['D_plus'] += ($data[$key] - $positif[$key]) ** 2;
    //                 $result[$kepala_keluarga]['D_minus'] += ($data[$key] - $negatif[$key]) ** 2;
    //             }
    //         }

    //         $result[$kepala_keluarga]['D_plus'] = round(sqrt($result[$kepala_keluarga]['D_plus']), 3);
    //         $result[$kepala_keluarga]['D_minus'] = round(sqrt($result[$kepala_keluarga]['D_minus']), 3);

    //         // Hitung nilai preferensi
    //         $result[$kepala_keluarga]['C_i'] = round($result[$kepala_keluarga]['D_minus'] / ($result[$kepala_keluarga]['D_plus'] + $result[$kepala_keluarga]['D_minus']), 3);
    //     }

    //     //add ranking to result
    

    //     $sortedResults = collect($result)->sortByDesc('C_i')->values()->all();

    
    //     return [
    //         'total_page' => $kusioners->lastPage(),
    //         'total_data' => $totalData,
    //         'code' => 200,
    //         'data' => $sortedResults,

    //     ];

        
    // }

    public function paginated_jarak_solusi_ideal(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('length', 10);

        // Initial query to fetch required data
        $query = Kusioner::select(
                'kepala_keluarga_id',
                DB::raw('MIN(id) as id'),
                DB::raw('GROUP_CONCAT(kriteria_id) as kriteria_ids'),
                DB::raw('GROUP_CONCAT(option_id) as option_ids')
            )
            ->with('getWarga', 'getKriteria', 'getOptions')
            ->groupBy('kepala_keluarga_id');

        // Apply search filters if provided
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
        $kusioners = $query->orderBy('id', 'DESC')->get(); // Fetch all data

        $result = [];
        $sumSquares = [
            'bobot_pp' => 0,
            'bobot_jak' => 0,
            'bobot_p' => 0,
            'bobot_jl' => 0,
            'bobot_jd' => 0
        ];

        // Process each kusioner and calculate sum of squares for normalization
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
                            $result[$kepala_keluarga]['bobot_jd'] = $bobot;
                            $sumSquares['bobot_jd'] += $bobot ** 2;
                            break;
                        case 'Jenis Lantai':
                            $result[$kepala_keluarga]['bobot_jl'] = $bobot;
                            $sumSquares['bobot_jl'] += $bobot ** 2;
                            break;
                        case 'Pekerjaan':
                            $result[$kepala_keluarga]['bobot_p'] = $bobot;
                            $sumSquares['bobot_p'] += $bobot ** 2;
                            break;
                        case 'Jumlah Anggota Keluarga':
                            $result[$kepala_keluarga]['bobot_jak'] = $bobot;
                            $sumSquares['bobot_jak'] += $bobot ** 2;
                            break;
                        case 'Penghasilan Perbulan':
                            $result[$kepala_keluarga]['bobot_pp'] = $bobot;
                            $sumSquares['bobot_pp'] += $bobot ** 2;
                            break;
                        // Add cases for other criteria as needed
                    }
                }
            }
        }

        // Normalize the data
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($sumSquares as $key => $sumSquare) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] = round($result[$kepala_keluarga][$key] / sqrt($sumSquare), 3);
                }
            }
        }

        // Criteria weights
        $bobotKriteria = [
            'bobot_pp' => 5,
            'bobot_jak' => 4,
            'bobot_p' => 4,
            'bobot_jl' => 4,
            'bobot_jd' => 5
        ];

        // Apply weights to the normalized data
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($bobotKriteria as $key => $bobot) {
                if (isset($result[$kepala_keluarga][$key])) {
                    $result[$kepala_keluarga][$key] = round($result[$kepala_keluarga][$key] * $bobot, 3);
                }
            }
        }

        // Determine the ideal positive and negative solutions
        $positif = [];
        $negatif = [];
        foreach ($result as $kepala_keluarga => $data) {
            foreach ($bobotKriteria as $key => $bobot) {
                if (isset($data[$key])) {
                    if (!isset($positif[$key]) || $data[$key] > $positif[$key]) {
                        $positif[$key] = $data[$key];
                    }
                    if (!isset($negatif[$key]) || $data[$key] < $negatif[$key]) {
                        $negatif[$key] = $data[$key];
                    }
                }
            }
        }

        // Calculate the distances to the ideal positive and negative solutions
        foreach ($result as $kepala_keluarga => $data) {
            $result[$kepala_keluarga]['D_plus'] = 0;
            $result[$kepala_keluarga]['D_minus'] = 0;

            foreach ($bobotKriteria as $key => $bobot) {
                if (isset($data[$key])) {
                    $result[$kepala_keluarga]['D_plus'] += ($data[$key] - $positif[$key]) ** 2;
                    $result[$kepala_keluarga]['D_minus'] += ($data[$key] - $negatif[$key]) ** 2;
                }
            }

            $result[$kepala_keluarga]['D_plus'] = round(sqrt($result[$kepala_keluarga]['D_plus']), 3);
            $result[$kepala_keluarga]['D_minus'] = round(sqrt($result[$kepala_keluarga]['D_minus']), 3);

            // Calculate the preference value
            $result[$kepala_keluarga]['C_i'] = round($result[$kepala_keluarga]['D_minus'] / ($result[$kepala_keluarga]['D_plus'] + $result[$kepala_keluarga]['D_minus']), 3);
        }

        // Sort results by the preference value (C_i) in descending order
        $sortedResults = collect($result)->sortByDesc('C_i')->values()->all();

        // Add ranking based on sorted C_i values
        foreach ($sortedResults as $index => $item) {
            $sortedResults[$index]['rank'] = $index + 1;
        }

        // Paginate the sorted and ranked results
        $page = $request->input('page', 1);
        $paginatedResults = array_slice($sortedResults, ($page - 1) * $limit, $limit);

        return [
            'total_page' => ceil($totalData / $limit),
            'total_data' => $totalData,
            'code' => 200,
            'data' => $paginatedResults,
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
