@extends('layouts.layout')

@section('title', 'Редактирование продукции')

@section('content')
    <div class="minimal-form">
        <a class="btn" href="{{ url()->previous() }}">Назад</a>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf

            @if($errors->any())
                <div class="alert">Ошибка валидации данных</div>
            @endif

            <div class="form-group">
                <label>Тип продукции</label>
                <select name="product_type_id">
                    @foreach($productTypes as $productType)
                        <option value="{{ $productType->id }}" @selected($productType->id === $product->productType->id)>
                            {{ $productType->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_type_id')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Наименование продукции</label>
                <input type="text" name="name" placeholder="Наименование продукции" value="{{ old('name', $product->name) }}">
                @error('name')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Артикул</label>
                <input type="text" name="article" placeholder="Артикул" value="{{ old('article', $product->article) }}">
                @error('article')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Минимальная стоимость</label>
                <input type="number" name="min_price" min="0.01" step="0.01" placeholder="0.00" value="{{ old('min_price', $product->min_price) }}">
                @error('min_price')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Ширина рулона</label>
                <input type="number" name="width" min="0.01" step="0.01" placeholder="0.00" value="{{ old('width', $product->width) }}">
                @error('width')<p class="error">{{ $message }}</p>@enderror
            </div>

            <button class="btn" type="submit">Обновить данные</button>
        </form>
    </div>
@endsection

