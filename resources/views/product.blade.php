@extends('master')

@section('title', 'Товар')

@section('content')
<div class="starter-template">
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->code }}</h2>
    <p>Цена: <b>{{ $product->price }} руб.</b></p>
    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg">
    <p>{{ $product->description }}</p>
    <a class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/1/add">Добавить в корзину</a>
</div>
@endsection
