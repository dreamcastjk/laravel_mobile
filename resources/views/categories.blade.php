@extends('layouts.master')
@section('title', 'Категории')
@section('content')
<div class="container">
    @php /* @var App\Category $category */ @endphp
    @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img height="100px" src="{{ Storage::url($category->image) }}">
                <h2>{{ $category->name }}</h2>
            </a>
            <p>
                {{ $category->description }}
            </p>
        </div>
    @endforeach
</div>
@endsection
