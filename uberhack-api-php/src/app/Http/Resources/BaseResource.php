<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\Resource;

abstract class BaseResource extends Resource
{
    /**
     * The data that should be output
     * @var array
     */
    protected $data = [];

    /**
     * Include given $relation on the $data set using given resource
     * class. You can define an $alias to the relationship.
     *
     * Only loaded relationships will be included by default, unless
     * you set the $force flag to true.
     *
     * @param string $relation
     * @param string $resource
     * @param string|null $alias
     * @param bool $force
     * @return \App\Http\Resources\BaseResource
     */
    protected function includeRelation(string $relation, string $resource, string $alias = null, bool $force = false)
    {
        if ($force && !$this->resource->relationLoaded($relation)) {
            $this->resource->load($relation);
        }

        if ($this->resource->relationLoaded($relation)) {
            $relationValue = $this->resource->getRelation($relation);

            if (!$relationValue) {
                return $this;
            }

            if ($relationValue instanceof Collection) {
                $this->data[$alias ?? $relation] = $resource::collection($relationValue);
            } else {
                $this->data[$alias ?? $relation] = $resource::make($relationValue);
            }
        }

        return $this;
    }

    /**
     * Append a meta attribute with model class name
     */
    protected function appendModelClassName()
    {
        $this->data['model_class_name'] = get_class($this->resource);
    }

    /**
     * Append given attribute.
     * @param $key
     * @param null $value
     * @return \App\Http\Resources\BaseResource
     */
    protected function appendAttribute($key, $value = null)
    {
        $this->data[$key] = $value ?? $this->resource->$key;

        return $this;
    }

    /**
     * Append given attributes as is are on the data set.
     * @param array $attributes
     */
    protected function appendRawAttributes(array $attributes)
    {
        $this->data = array_merge($this->data, $this->resource->only($attributes));
    }

    /**
     * Append given attributes formatted as ISO8601 date on the data set.
     * @param array $attributes
     */
    protected function appendDateAttributes(array $attributes)
    {
        $this->data = array_merge(
            $this->data,
            array_map(function($attribute) {
                /**
                 * @var $attribute \Carbon\Carbon
                 */
                return $attribute ? $attribute->toIso8601String() : null;
            }, $this->resource->only($attributes))
        );
    }
}
