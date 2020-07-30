@extends('master')
@section('title', 'Категории')
@section('content')
<div class="container">
    <div class="starter-template">
        @php /* @var App\Category $category */ @endphp
        @foreach($categories as $category)
            <div class="panel">
                <a href="{{ route('category', $category->code) }}">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/categories/mobile.jpg">
                    <h2>{{ $category->name }}</h2>
                </a>
                <p>
                    {{ $category->description }}
                </p>
            </div>
        @endforeach
    </div>
</div>
@endsection
