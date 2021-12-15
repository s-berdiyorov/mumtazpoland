<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class CategoryController extends BaseController
{
    const ROUTE = 'categories';

    private CategoryRepositoryInterface $repository;

    /**
     * @param CategoryRepositoryInterface $repository
     */
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $categories = $this->repository->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('admin.categories.create');
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        $result = $this->repository->store($credentials);

        return $this->redirectWithAlert($result, self::ROUTE, 'create');
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        $category = $this->repository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param int $id
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function update(int $id, CategoryRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        $result = $this->repository->update($id, $credentials);

        return $this->redirectWithAlert($result, self::ROUTE, 'update', 'info');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $result = $this->repository->destroy($id);

        return $this->redirectWithAlert($result, self::ROUTE, 'delete', 'warning');
    }
}
