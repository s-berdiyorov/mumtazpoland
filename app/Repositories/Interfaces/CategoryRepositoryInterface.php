<?php

namespace App\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface
{
    public function paginate();

    public function allForComboBox();

    public function find(int $id);

    public function store($credentials);

    public function update(int $id, $credentials);

    public function destroy(int $id);

}
