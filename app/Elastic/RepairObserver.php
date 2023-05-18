<?php

namespace App\Elastic;

use Elasticsearch\Client;

class RepairObserver
{

    private $el;

    public function __constructor(Client $el)
    {
        $this->el = $el;
    }

    public function saved($model)
    {
        $this->el->index([
            "index" => "repairs",
            "id" => $model->id,
            "body" => [
                "issue" => $model->issue,
                "price" => $model->price,
                "car" => $model->car(),
                "car_service" => $model->carService()
            ]
        ]);
    }

    public function deleted($model)
    {
        $this->el->delete([
            "index" => "repairs",
            "id" => $model->id
        ]);
    }

    public function updated($model)
    {
        $this->deleted($model);
        $this->saved($model);
    }

}