<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Roadmaps
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <table class="table-fixed min-w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Commodity</th>
                        <th class="px-4 py-2">Start Date</th>
                        <th class="px-4 py-2">Participants Involved</th>
                        <th class="px-4 py-2">Activities Done</th>
                        <th class="px-4 py-2">Ongoing Activities</th>
                        <th class="px-4 py-2">Overall Status</th>
                        <th class="px-4 py-2 flex-wrap">Report Date</th>
                        <th class="px-4 py-2 flex-wrap">Attachment</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($roadmaps as $item)
                    <tr>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->id }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->commodity->name }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->start_date }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->participants_involved }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->activities_done }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->activities_ongoing }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->overall_status }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">{{ $item->report_date }}</td>
                        <td class="px-4 py-2 text-sm flex-wrap">
                            <x-jet-button wire:click="download({{ $item->id }})">Report</x-jet-button>
                        </td>
                        <td class="px-4 py-2 text-sm whitespace-nowrap">
                            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('roadmaps.edit', $item->id) }}">Edit</a>
                            <x-jet-danger-button wire:click="delete({{ $item->id }})">Delete</x-jet-danger-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-sm text-center">No entries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $roadmaps->links() }}
        </div>
    </div>
</div>
