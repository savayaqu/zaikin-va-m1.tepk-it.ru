@extends('layouts.layout')

@section('title', 'Материалы продукции')

@section('content')

    <div style="max-width: max-content; padding: 20px; margin: 0 auto">
        <a class="btn" href="{{ url()->previous() }}">Назад</a>
        <h1 style="text-align: center" class="font-large accent">
            Материалы для продукции: {{ $product->name }}
            @if($productMaterials->isEmpty())
                <b class="font-large error">отсутствуют</b>
            @endif
        </h1>
        @if(!$productMaterials->isEmpty())
            <div class="border">
                <div class="flex" style="margin: 0 20px; padding: 0 20px;">
                    <h2 class="w85 accent font-large">Наименование материала</h2>
                    <h2 class="w15 accent font-large">Количество</h2>
                </div>
                @foreach($productMaterials as $pm)
                    <div class="flex border additional-background">
                        <div class="w85">{{ $pm->material->name }}</div>
                        <div class="w15">{{ $pm->quantity }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
