<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ProductController extends AppBaseController
{

    /**
     * @var ProductRepository
     */
    public $productRepository;

    /**
     * @param  ProductRepository  $productRepo
     */
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
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
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->toArray();

        return view('products.create',compact('categories'));
    }

    /**
     * @param  CreateProductRequest  $request
     *
     *
     * @return RedirectResponse
     */
    public function store(CreateProductRequest $request): RedirectResponse
    {
        $input = $request->all();
        $this->productRepository->store($input);
        Flash::success('Product created successfully.');

        return redirect()->route('products.index');
    }

    /**
     * @param  Product  $product
     *
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name','id')->toArray();
        $product->load('category');

        return view('products.edit', compact('product','categories'));
    }

    /**
     * @param  UpdateProductRequest  $request
     * @param  Product  $product
     *
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $input = $request->all();
        $this->productRepository->update($input, $product->id);
        Flash::success('Product updated   successfully.');

        return redirect()->route('products.index');
    }

    /**
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        $invoiceModels = [
            InvoiceItem::class,
        ];
        $result = canDelete($invoiceModels, 'product_id', $product->id);
        if ($result) {
            return $this->sendError('Product can\'t be deleted.');
        }
        $product->delete();

        return $this->sendSuccess('Product Deleted successfully.');
    }

    /**
     * @param  Product  $product
     *
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        $product->load('category');

        if (Auth::user()->tenant_id == $product->tenant_id) {
            return view('products.show', compact('product'));
        } else {
            Flash::error('Product Not Found.');

            return redirect()->back();
        }

    }
}
