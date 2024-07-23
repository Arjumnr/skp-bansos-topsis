<?php

namespace App\Http\Controllers;

use App\Services\Contracts\CriteriaContract;
use App\Services\Contracts\RekapitulasiContract;
use App\Services\Contracts\WargaContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    protected $title = 'Dashboard' , $criteriaContract, $wargaContract, $rekapitulasiContract;
    
    public function __construct(CriteriaContract $criteriaContract, WargaContract $wargaContract, RekapitulasiContract $rekapitulasiContract)
    {
        $this->criteriaContract = $criteriaContract;
        $this->wargaContract = $wargaContract;
        $this->rekapitulasiContract = $rekapitulasiContract;
    }

    public function index(){
        $title = $this->title;
        $total_criteria = $this->criteriaContract->data()->count();
        $total_warga = $this->wargaContract->data()->count();
        $total_rekapitulasi = $this->rekapitulasiContract->data()->count();
        return view('dashboard.index', compact('title' , 'total_criteria' , 'total_warga' , 'total_rekapitulasi'));
    }

}
