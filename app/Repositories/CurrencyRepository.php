<?php

namespace App\Repositories;

use App\Models\Currency;

/**
 * Class CurrencyRepository
 */
class CurrencyRepository extends BaseRepository
{
    public $fieldSearchable = [
        'name',
    ];

    /**
     * @return array|string[]
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model()
    {
        return Currency::class;
    }
}
