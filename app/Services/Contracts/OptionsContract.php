<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface OptionsContract
{
        public function paginated(Request $request);

        public function data();

        public function findByCriteria(array $criteria): ?Model;

        public function update(array $data, $id);



        //function from BaseService
        public function all();
        public function find($id);
        public function delete($id);
        public function store(array $request);

}
