<?php

namespace App\DataTables;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CurrencyDataTable
 */
class CurrencyDataTable
{
    /**
     * @return Builder
     */
    public function get(): Builder
    {
        return Currency::query()->select('currencies.*');
    }
}
