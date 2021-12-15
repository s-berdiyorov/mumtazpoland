<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    private Category $model;

    /**
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function allForComboBox(): Collection
    {
        return $this->model::query()
            ->select([
                'id',
                'title'
            ])->get();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->model::query()->paginate();
    }

    /**
     * @param int $id
     * @return Model|Collection|Builder|array|null
     */
    public function find(int $id): Model|Collection|Builder|array|null
    {
        return $this->model::query()->find($id);
    }

    /**
     * @param $credentials
     * @return Builder|Model
     */
    public function store($credentials): Model|Builder
    {
        return $this->model::query()->create($credentials);
    }

    /**
     * @param int $id
     * @param $credentials
     * @return bool|int
     */
    public function update(int $id, $credentials): bool|int
    {
        $model = $this->find($id);
        return $model->update($credentials);
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function destroy(int $id): bool|null
    {
        $model = $this->find($id);
        return $model->delete();
    }
}
