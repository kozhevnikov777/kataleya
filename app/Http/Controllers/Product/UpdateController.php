<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        foreach ($tagsIds as $tagsId) {
        ProductTag::updated([
            'product_id' => $product->id,
            'tag_id' => $tagsId
        ]);
        }

        foreach ($colorsIds as $colorsId) {
        ColorProduct::updated([
            'product_id' => $product->id,
            'color_id' => $colorsId
        ]);
        }

        $product->update($data);
        return view ("product.show", compact("product"));
    }
}
