<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface RekapitulasiContract
{
        public function paginated(Request $request);

        public function data();

        public function deleteIdAll($id);



        //function from BaseService
        public function find($id);
        public function delete($id);
        public function store(array $request);

}
