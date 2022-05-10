<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    public $categoryRepository;

    /**
     * @param  CategoryRepository  $categoryRepo
     */
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('category.index');
    }

    /**
     * @param  CreateCategoryRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryRepository->store($input);

        return $this->sendResponse($category, 'Category saved successfully.');
    }

    /**
     * @param  Category  $category
     *
     * @return JsonResponse
     */
    public function edit(Category $category)
    {
        return $this->sendResponse($category, 'Category retrieved successfully.');
    }

    /**
     * @param  UpdateCategoryRequest  $request
     * @param $categoryId
     *
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, $categoryId)
    {
        $input = $request->all();
        $this->categoryRepository->update($input, $categoryId);

        return $this->sendSuccess('Category updated successfully.');
    }

    /**
     * @param  Category  $category
     *
     * @return JsonResponse
     */
    public function destroy(Category $category)
    {
        $productModels = [
            Product::class,
        ];
        $result = canDelete($productModels, 'category_id', $category->id);
        if ($result) {
            return $this->sendError('Category can\'t be deleted.');
        }
        $category->delete();

        return $this->sendSuccess('Category deleted successfully.');
    }
}
