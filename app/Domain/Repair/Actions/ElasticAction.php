<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;
use Illuminate\Support\Facades\App;

class ElasticAction
{
    public function execute($request)
    {
        $params['index'] = 'repairs';
        if($request->filled('issue')) $params['query']['must']['match']['issue'] = $request->input('issue');
        $params['size'] = $request->input('size', 0);
        $params['from'] = $request->input('from', 0);
        if($request->filled('sort')) $params['sort'] = [$request->input('sort').':asc'];

        $client = App::make(Client::class);
        return $client->search($params);
    }
}