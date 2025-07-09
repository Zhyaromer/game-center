@extends('layouts.admin')

@vite(['resources/css/app.css','resources/js/app.js'])

@section('content')

<div class="max-w-full mx-auto px-2 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            @php
              $isEdit = isset($stations);
            @endphp

            <form
                class="grid grid-rows-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                action="{{ $isEdit ? route('admin.stations.update', $stations->station_id) : route('admin.stations.store') }}"
                method="POST">
                @csrf
                @if($isEdit)
                @method('PUT')
                @endif

                <div>
                    <label for="name" class="form-label">name</label>
                    <input
                        value="{{ old('name', $isEdit ? $stations->name : '') }}"
                        type="text" name="name" id="name" placeholder="name"
                        class="form-control rounded-md">
                </div>

                <div>
                    <label for="status" class="form-label">status</label>
                    <select class="form-select rounded-md" name="status" id="status">
                        @foreach(['available', 'unavailable', 'reserved'] as $status)
                        <option value="{{ $status }}" {{ old('status', $isEdit ? $stations->status : '') === $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="type" class="form-label">type</label>
                    <select class="form-select rounded-md" name="type" id="type">
                        @foreach(['ps5', 'xbox', 'pc'] as $type)
                        <option value="{{ $type }}" {{ old('type', $isEdit ? $stations->type : '') === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                        @endforeach
                    </select>
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
