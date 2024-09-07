<?php

namespace App\Http\Controllers\Lineage2;
use App;
use App\Http\Controllers\Controller;
use App\Service\Status\StatusServer;
use Config;
use Illuminate\Http\Request;
use Response;


class StatusServerController extends Controller
{
    private StatusServer $ss;

    public function __construct()
    {
        $timeout = Config::get('lineage2.server.timeout_socket');
        $this->ss = new StatusServer($timeout);
    }

    public function data(Request $request)
    {
        $list_server = Config::get('lineage2.server.list_server');
        //dd($list_server);
        return Response::json($this->ss->getHttpModel($list_server));
    }


}
