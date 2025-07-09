@extends('layouts.admin')

@vite(['resources/css/app.css','resources/js/app.js'])

@section('content')
<div class="max-w-full mx-auto px-2 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto border-collapse">
            <thead class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide" style="background-color:#dc2626 !important;">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">price</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">image</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">Created at</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($data as $row)
                <tr class="hover:bg-gray-50 transition-colors duration-200 cursor-pointer">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $row->market_item_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $row->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $row->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><img src="{{ $row->image_url }}" alt="" class="w-20 h-20 object-cover rounded"></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $row?->created_at?->diffForHumans() ?? '' }}</td>
                    <td class="flex flex-row justify-start px-6 py-4 gap-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.market_items.show', $row->market_item_id) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        <a href="{{ route('admin.market_items.edit', $row->market_item_id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.market_items.destroy', $row->market_item_id) }}" id="{{ $row->market_item_id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="deleteItem('{{ $row->market_item_id }}')" type="button" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>

                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
