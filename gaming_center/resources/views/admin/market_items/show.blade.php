@extends('layouts.admin')

@vite(['resources/css/app.css','resources/js/app.js'])

@section('content')
<div class="max-w-full mx-auto px-2 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-2xl font-semibold text-gray-900">showing station {{ $data->name }}</h1>

            <p> id :{{ $data->market_item_id }}</p>
            <p> name :{{ $data->name }}</p>
            <p class="mb-2"> price :{{ $data->price }}</p>
            <p>image <img src="{{ $data->image_url}}" class="w-32 h-32 rounded-md" alt=""></p>
        </div>
    </div>
</div>
@endsection
