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
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">type</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">Created at</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($stations as $station)
                <tr class="hover:bg-gray-50 transition-colors duration-200 cursor-pointer">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $station->station_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $station->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $station->type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $station->status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $station?->created_at?->diffForHumans() ?? '' }}</td>
                    <td class="flex flex-row justify-start px-6 py-4 gap-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.stations.show', $station->station_id) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        <a href="{{ route('admin.stations.edit', $station->station_id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.stations.destroy', $station->station_id) }}" id="{{ $station->station_id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="deleteItem('{{ $station->station_id }}')" type="button" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>

                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
