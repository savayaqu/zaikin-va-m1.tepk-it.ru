@extends('layouts.layout')

@section('title', 'Список продукции')

@section('content')
    <a class="btn" href="{{ route('products.create') }}">Создать продукцию</a>
    <div class="border">
        @foreach($products as $product)
            <a href="{{ route('products.materials', $product) }}" class="btn ma-left-30">Материалы</a>
            <a href="/products/{{$product->id}}/edit/">
                <div class="border additional-background">
                    <div>
                        <div class="flex" style="justify-content: space-between;">
                            <div class="font-large">{{ $product->productType->name }} | {{ $product->name }}</div>
                            <div class="font-large">{{ $product->cost }} (р)</div>
                        </div>
                        <div>{{ $product->article }}</div>
                        <div>{{ $product->min_price }} (р)</div>
                        <div>{{ $product->width }} (м)</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
