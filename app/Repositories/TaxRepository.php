<?php

namespace App\Repositories;

use App\Models\Tax;

/**
 * Class TaxRepository
 */
class TaxRepository extends BaseRepository
{
    public $fieldSearchable = [
        'name',
    ];

    /**
     * @inheritDoc
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Tax::class;
    }
}
