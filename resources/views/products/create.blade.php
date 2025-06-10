@extends('layouts.layout')

@section('title', 'Создание продукции')

@section('content')
    <div class="minimal-form additional-background">
        <a class="btn" href="{{ url()->previous() }}">Назад</a>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            @if($errors->any())
                <div class="alert">Ошибка валидации данных</div>
            @endif

            <div class="form-group">
                <label>Тип продукции</label>
                <select name="product_type_id" required>
                    @foreach($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
                @error('product_type_id')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Наименование продукции</label>
                <input type="text" name="name" placeholder="Наименование продукции" required>
                @error('name')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Артикул</label>
                <input type="text" name="article" placeholder="Артикул" required>
                @error('article')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Минимальная стоимость</label>
                <input type="number" name="min_price" min="0.01" step="0.01" placeholder="0.00" required>
                @error('min_price')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label>Ширина рулона</label>
                <input type="number" name="width" min="0.01" step="0.01" placeholder="0.00" required>
                @error('width')<p class="error">{{ $message }}</p>@enderror
            </div>

            <button class="btn" type="submit">Создать продукцию</button>
        </form>
    </div>@endsection
