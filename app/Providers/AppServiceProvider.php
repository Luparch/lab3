<?php

namespace App\Providers;

use App\Domain\Repair\Models\Repair;
use App\Elastic\RepairObserver;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts(['https://localhost:9200'])
                ->setBasicAuthentication('elastic', 'zHKqMg_NLWqxrdDzNnNi')
                //->setCABundle("/home/miet/Downloads/elasticsearch-8.7.1/config/certs/http_ca.crt")
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Repair::observe(RepairObserver::class);
    }
}
