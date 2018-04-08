<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ListsModel;
use App\Http\Controllers\Concerns\ShowsModel;
use App\Http\Resources\Modal as ModalResource;
use App\Models\Modal;

class ModalController extends BaseController
{
    use ListsModel, ShowsModel;

    /**
     * @var string
     */
    protected $model = Modal::class;

    /**
     * @var string
     */
    protected $resource = ModalResource::class;

    public function getSearchSortAliases()
    {
        return [];
    }
}
