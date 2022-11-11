<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\{ Request, Response };
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersAllData;

use DB;

class ExportController extends Controller
{

    public function __construct()
    {
        //
    }

    public function ordersAllData()
    {
        return Excel::download(new OrdersAllData($var = 'sinData'), 'Todos-los-pedidos.xlsx');
    }

}
