<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->with(['productType', 'productMaterials.material'])->get()
            ->map(function ($product) {
                // Рассчитываем стоимость
                $cost = $product->productMaterials->sum(function ($pm)
                {
                    return $pm->quantity * $pm->material->price;
                });
                // Добавляем новое поле товару и округляем до сотых
                $product->cost = round($cost, 2);

                return $product;
            });

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $productTypes = ProductType::all();
        return view('products.create', compact('productTypes'));
    }

    public function store(ProductRequest $request)
    {
        // Создаем товар
        Product::query()->create($request->validated());
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        return view('products.edit', compact('product', 'productTypes'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        // Обновляем данные товара
        $product->update($request->validated());
        return redirect()->route('products.index');
    }

    public function materials(Product $product)
    {
        $productMaterials = $product->productMaterials()->with('material')->get();
        return view('products.materials', compact('product', 'productMaterials'));
    }

}

