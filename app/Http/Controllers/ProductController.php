<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        $tags = $request->tags;
        foreach ($tags as $tag) {
            ProductTag::create([
                'product_id' => $product->id,
                'tag_id' => $tag['tag']['id']
            ]);
        }

        $product->tags = $tags;
        return $product;
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return $product;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'tags' => 'required|array',
            'tags.*.tag.id' => 'exists:tag,id'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        ProductTag::where('product_id', $id)->delete();

        $tags = $request->tags;
        foreach($tags as $tag) {
            ProductTag::create([
                'product_id' => $id,
                'tag_id' => $tag['tag']['id']
            ]);
        }

        return $product->refresh();
    }

    public function destroy($id)
    {
        ProductTag::where('product_id', $id)->delete();

        $product = Product::findOrFail($id);
        $product->delete();

        return [];
    }
}
