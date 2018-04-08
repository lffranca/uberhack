<?php

namespace App\Elasticsearch\Configurators;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ModalLineIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $settings = [
        'analysis' => [
            'filter' => [
                'nGram_filter' => [
                    'type' => 'ngram',
                    'min_gram' => '1',
                    'max_gram' => '20',
                    'token_chars' => [
                        'letter',
                        'digit',
                        'punctuation',
                        'symbol',
                    ],
                ],
            ],
            'analyzer' => [
                'nGram_analyzer' => [
                    'type' => 'custom',
                    'tokenizer' => 'whitespace',
                    'filter' => [
                        'lowercase',
                        'asciifolding',
                        'nGram_filter',
                    ],
                ],
                'whitespace_analyzer' => [
                    'type' => 'custom',
                    'tokenizer' => 'whitespace',
                    'filter' => [
                        'lowercase',
                        'asciifolding',
                    ],
                ],
                'exact_analyzer' => [
                    'type' => 'custom',
                    'tokenizer' => 'keyword',
                    'filter' => [
                        'lowercase',
                        'asciifolding',
                    ],
                ],
            ],
        ],
    ];

    protected $defaultMapping = [
        'properties' => [
            'all' => [
                'type' => 'text',
                'analyzer' => 'nGram_analyzer',
                'search_analyzer' => 'whitespace_analyzer',
            ],
            'label' => [
                'type' => 'text',
                'norms' => true,
                'analyzer' => 'exact_analyzer',
                'search_analyzer' => 'exact_analyzer',
                'copy_to' => 'all',
            ],
        ]
    ];
}
