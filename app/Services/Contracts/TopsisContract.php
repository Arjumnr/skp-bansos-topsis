<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface TopsisContract
{
        public function paginated_data_penerima(Request $request);
        
        public function paginated_keputusan_ternormalisasi(Request $request);

        public function paginated_matriks_ternormalisasi_terbobot(Request $request);

        public function paginated_solusi_ideal(Request $request);

        public function paginated_jarak_solusi_ideal(Request $request);

        public function data();

        public function deleteIdAll($id);



        //function from BaseService
        public function find($id);
        public function delete($id);
        public function store(array $request);

}
