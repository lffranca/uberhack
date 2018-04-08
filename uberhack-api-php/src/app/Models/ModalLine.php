<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Elasticsearch\Configurators\ModalLineIndexConfigurator;
use App\Elasticsearch\Rules\ModalLineRule;
use ScoutElastic\Searchable;

class ModalLine extends Model
{
    use Searchable;

    protected $indexConfigurator = ModalLineIndexConfigurator::class;

    protected $searchRules = [
        ModalLineRule::class,
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modal()
    {
        return $this->belongsTo(Modal::class);
    }
}
