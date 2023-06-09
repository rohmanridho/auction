@extends('layouts.dashboard')

@section('title', 'Items - index')

@section('content')
<div class="container grid px-6 mx-auto">
    @if ($items->count() != 0)
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Items - index
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-purple-100">
                        <th class="px-4 py-3">No</th>
                        <th class="px-2 py-3">Image</th>
                        <th class="px-2 py-3">Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Status</th>
                        @if (Auth::user()->level == 'admin')
                        <th class="px-4 py-3">Staff</th>
                        @endif
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($items as $item)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2.5 text-sm">
                            <img src="{{ Storage::url($item->image) }}" alt=""
                                class="h-16 aspect-4/3 object-cover rounded-md">
                        </td>
                        <td class="px-2 py-2.5 text-sm font-semibold truncate" style="max-width: 15ch">
                            {{ $item->name }}
                        </td>
                        <td class="px-4 py-2.5 text-sm truncate" style="max-width: 25ch">
                            {{ $item->description }}
                        </td>
                        <td class="px-4 py-2.5 text-sm">
                            Rp{{ number_format($item->start_price) }}
                        </td>
                        <td class="px-4 py-2.5 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight {{ $item->auction->status == 'open' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} rounded-full">
                                {{ $item->auction->status == 'open' ? 'sale' : 'sold' }}
                            </span>
                        </td>
                        @if (Auth::user()->level == 'admin')
                        <td class="px-4 py-2.5 text-sm">
                            {{ $item->auction->staff->name }}
                        </td>
                        @endif
                        <td class="px-4 py-2.5">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('items.edit', $item->id) }}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="text-center font-medium text-xl text-purple-900/75 mt-4">No item</div>
    @endif
</div>
@endsection
