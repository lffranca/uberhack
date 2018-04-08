<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\SearchOnModel;
use App\Http\Resources\ModalLine as ModalLineResource;
use App\Models\ModalLine;

class ModalLineController extends BaseController
{
    use SearchOnModel;

    /**
     * @var string
     */
    protected $model = ModalLine::class;

    /**
     * @var string
     */
    protected $resource = ModalLineResource::class;

    public function getSearchSortAliases()
    {
        return [];
    }
}
