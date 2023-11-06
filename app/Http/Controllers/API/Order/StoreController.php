<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Oreder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $password = Hash::make(Str::random(10));

        $user = User::firstOrCreate([
            'email' => $data['email'],
        ],[
            'name' => $data['name'],
            'surname' => $data['surname'],
            'address' => $data['address'],
            'password' => $password
        ]);
        $order = Oreder::create([
            'products' => json_encode($data['products']),
            'user_id' => $user->id,
            'total_price' => $data['total_price'],
        ]);
        return new OrderResource($order);
    }
}
