@extends('layouts.admin')

@vite(['resources/css/app.css','resources/js/app.js'])

@section('content')

<div class="max-w-full mx-auto px-2 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            @php
              $isEdit = isset($user);
            @endphp

            <form
                class="grid grid-rows-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                action="{{ $isEdit ? route('admin.users.update', $user->user_id) : route('admin.users.store') }}"
                method="POST">
                @csrf
                @if($isEdit)
                @method('PUT')
                @endif

                <div>
                    <label for="name" class="form-label">name</label>
                    <input
                        value="{{ old('name', $isEdit ? $user->name : '') }}"
                        type="text" name="name" id="name" placeholder="name"
                        class="form-control rounded-md">
                </div>

                <div>
                    <label for="email" class="form-label">email</label>
                    <input
                        value="{{ old('email', $isEdit ? $user->email : '') }}"
                        type="text" name="email" id="email" placeholder="email"
                        class="form-control rounded-md">
                </div>

                <div>
                    <label for="password" class="form-label">password</label>
                    <input
                        type="password" name="password" id="password" placeholder="{{ $isEdit ? 'Leave blank to keep current password' : 'password' }}"
                        class="form-control rounded-md">
                </div>

                <div>
                    <label for="role" class="form-label">role</label>
                    <select class="form-select rounded-md" name="role" id="role">
                        @foreach(['user', 'admin', 'chef'] as $role)
                        <option value="{{ $role }}" {{ old('role', $isEdit ? $user->role : '') === $role ? 'selected' : '' }}>
                            {{ $role }}
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
