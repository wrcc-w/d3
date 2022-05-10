<?php

namespace App\Repositories;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class ProductRepository
 */
class ProductRepository extends BaseRepository
{

    /**
     * @var string[] 
     */
    public $fieldSearchable = [
        'name',
        'code',
        'price',
        'category.name'
    ];

    /**
     *
     * @return array|string[]
     */
    public function getFieldsSearchable(): array
    {
       return $this->fieldSearchable;
    }

    /**
     *
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function store($input): bool
    {
        try {
            DB::beginTransaction();
            $product = Product::create($input);
            if (isset($input['image']) && ! empty($input['image'])) {
                $product->addMedia($input['image'])->toMediaCollection(Product::Image, config('app.media_disc'));
            }
            if ($input['image_remove'] == 1 && isset($input['image_remove']) && empty($input['image'])) {
                $product->clearMediaCollection(Product::Image);
                $product->media()->delete();
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @param  int  $id
     *
     * @return bool
     */
    public function update($input, $id): bool
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->update($input);
            if (isset($input['image']) && ! empty($input['image'])) {
                $product->clearMediaCollection(Product::Image);
                $product->media()->delete();
                $product->addMedia($input['image'])->toMediaCollection(Product::Image, config('app.media_disc'));
            }
            if ($input['image_remove'] == 1 && isset($input['image_remove']) && empty($input['image'])) {
                $product->clearMediaCollection(Product::Image);
                $product->media()->delete();
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
