<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domain\Repair\Models\Repair;
use Elasticsearch\Client;

class SeedIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    private Client $el;

    public function __construct(Client $el)
    {
        parent::__construct();
        $this->el = $el;
    }

    public function handle()
    {
        $this->info("Опять работа");

        foreach(Repair::cursor() as $repair)
        {
            $this->el->index([
                "index" => "repairs",
                "id" => $repair->id,
                "body" => [
                    "issue" => $repair->issue,
                    "price" => $repair->price,
                    "car" => $repair->car(),
                    "car_service" => $repair->carService()
                ]
            ]);
        }

        $this->info("Дело сделано");
    }
}
