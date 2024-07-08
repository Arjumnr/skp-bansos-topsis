<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface CriteriaContract
{
        public function paginated(Request $request);
        public function data();

        public function findByCriteria(array $criteria): ?Model;

        public function update(array $data, $id);

}
