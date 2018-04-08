<?php

namespace App\Console\Commands;

use App\Elasticsearch\Configurators\CityIndexConfigurator;
use App\Elasticsearch\Configurators\EventCategoryIndexConfigurator;
use App\Elasticsearch\Configurators\EventIndexConfigurator;
use App\Elasticsearch\Configurators\ModalLineIndexConfigurator;
use Illuminate\Console\Command;

class ElasticSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elastic:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Elasticsearch Indexes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            \Artisan::call('elastic:create-index', [
                'index-configurator' => ModalLineIndexConfigurator::class
            ]);
            $this->info('ModalLineIndex configured with success.');
        } catch (\Exception $e) {
            $this->warn('ModalLineIndex already configured');
        }
    }
}
