<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reports
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
            <button
                wire:click="create()"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                Add Report
            </button>
            <input class="appearance-none border rounded w-full my-2 py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="search" placeholder="Search"></input>
            @if($isOpen)
                @include('livewire.reports.create')
            @endif
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr class="bg-gray-100">
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Office</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Commodity</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Overall Status</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Report Date</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Updated By</th>
                    <th scope="col" class="relative px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($reports as $report)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $report->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $report->office ? $report->office->short_name : '' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $report->commodity ? $report->commodity->name : '' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $report->start_date }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            {{ $report->overall_status }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $report->report_date->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $report->user ? $report->user->email : '' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <x-jet-button wire:click="edit({{ $report->id }})">
                                Edit
                            </x-jet-button>
                            <x-jet-danger-button wire:click="confirmDelete({{ $report->id }})">
                                Delete
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-sm whitespace-nowrap">No reports found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $reports->links() }}
        </div>
    </div>

{{--    <x-jet-confirmation-modal wire:model="confirmDeleteDialog">--}}
{{--        <x-slot name="title">--}}
{{--            Delete--}}
{{--        </x-slot>--}}

{{--        <x-slot name="content">--}}
{{--            Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.--}}
{{--        </x-slot>--}}

{{--        <x-slot name="footer">--}}
{{--            <x-jet-secondary-button wire:click="$toggle('confirmDeleteDialog')" wire:loading.attr="disabled">--}}
{{--                Never mind--}}
{{--            </x-jet-secondary-button>--}}

{{--            <x-jet-danger-button class="ml-2" wire:click="delete()" wire:loading.attr="disabled">--}}
{{--                Delete Account--}}
{{--            </x-jet-danger-button>--}}
{{--        </x-slot>--}}
{{--    </x-jet-confirmation-modal>--}}
</div>
