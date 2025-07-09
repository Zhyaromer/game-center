@extends('layouts.admin')

@vite(['resources/css/app.css','resources/js/app.js'])

@section('content')

<div class="max-w-full mx-auto px-2 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            @php
            $isEdit = isset($data);
            @endphp

            <form
                enctype="multipart/form-data"
                class="grid grid-rows-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                action="{{ $isEdit ? route('admin.market_items.update', $data->market_item_id) : route('admin.market_items.store') }}"
                method="POST">
                @csrf
                @if($isEdit)
                @method('PUT')
                @endif

                <div>
                    <label for="name" class="form-label">name</label>
                    <input
                        value="{{ old('name', $isEdit ? $data->name : '') }}"
                        type="text" name="name" id="name" placeholder="name"
                        class="form-control rounded-md">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div>
                    <label for="price" class="form-label">price</label>
                    <input
                        value="{{ old('price', $isEdit ? $data->price : '') }}"
                        type="number" name="price" id="price" placeholder="price"
                        class="form-control rounded-md">
                          @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div>
                    <label for="image" class="form-label">image</label>
                    <input type="file" name="image" id="image" class="form-control rounded-md">
                      @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ $isEdit ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
