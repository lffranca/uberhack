<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:58
 */

namespace App\Http\Controllers\Concerns;

trait InteractsWithModel
{
    /**
     * @var string|\Illuminate\Database\Eloquent\Model|\ScoutElastic\Searchable
     */
    protected $model;

    /**
     * Get an Query builder for model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function model()
    {
        return $this->model::query();
    }
}
