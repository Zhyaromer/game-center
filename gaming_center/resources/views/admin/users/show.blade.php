@extends('layouts.admin')

@vite(['resources/css/app.css','resources/js/app.js'])

@section('content')
<div class="max-w-full mx-auto px-2 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-2xl font-semibold text-gray-900">showing user {{ $data->name }}</h1>

            <p> id :{{ $data->user_id }}</p>
            <p> name :{{ $data->name }}</p>
            <p> email :{{ $data->email }}</p>
            <p> role :{{ $data->role }}</p>
        </div>
    </div>
</div>
@endsection
