<x-slot name="header">
    <x-title>
        Roadmaps
    </x-title>
</x-slot>

<x-content>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="my-3">
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('roadmaps.create') }}">
                Add Roadmap
            </a>
        </div>

        <x-table>
            <thead>
                <tr class="bg-gray-50">
                    <x-th>No.</x-th>
                    <x-th>Office</x-th>
                    <x-th>Commodity</x-th>
                    <x-th>Start Date</x-th>
                    <x-th>Actions</x-th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($roadmaps as $item)
                <tr>
                    <td class="px-4 py-2 text-sm flex-wrap text-center">{{ $item->id }}</td>
                    <td class="px-4 py-2 text-sm flex-wrap text-center">{{ $item->office->name ?? '' }}</td>
                    <td class="px-4 py-2 text-sm flex-wrap text-center">{{ $item->commodity->name }}</td>
                    <td class="px-4 py-2 text-sm flex-wrap text-center">{{ $item->start_date }}</td>
                    <td class="px-4 py-2 text-sm whitespace-nowrap text-center">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('roadmaps.show', $item->id) }}">View</a>
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('roadmaps.edit', $item->id) }}">Edit</a>
                        <x-jet-danger-button wire:click="delete({{ $item->id }})">Delete</x-jet-danger-button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="px-4 py-4 text-sm text-center">No entries found.</td>
                </tr>
            @endforelse
            </tbody>
        </x-table>
        {{ $roadmaps->links() }}
    </div>
</x-content>
