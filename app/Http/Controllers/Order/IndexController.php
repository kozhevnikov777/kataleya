<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Oreder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders = Oreder::orderBy('created_at', 'desc')->get();

        return view("order.index", compact("orders"));
    }
}
