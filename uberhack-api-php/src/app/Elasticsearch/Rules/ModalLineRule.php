<?php

namespace App\Elasticsearch\Rules;

use ScoutElastic\SearchRule;

class ModalLineRule extends SearchRule
{
    // This method returns an array that represents a content of bool query.
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'match' => [
                    'all' => [
                        'query' => $this->builder->query,
                        'operator' => 'or',
                    ],
                ]
            ],
        ];
    }
}
