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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add Report</button>
            @if($isOpen)
                @include('livewire.reports.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Office</th>
                    <th class="px-4 py-2">Commodity</th>
                    <th class="px-4 py-2">Start Date</th>
                    <th class="px-4 py-2">Participants Involved</th>
                    <th class="px-4 py-2">Activities Done</th>
                    <th class="px-4 py-2">Activities Ongoing</th>
                    <th class="px-4 py-2">Overall Status</th>
                    <th class="px-4 py-2">Report Date</th>
                    <th class="px-4 py-2">Updated By</th>
                    <th class="px-4 py-2">Attachment</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td class="border px-4 py-2">{{ $report->office ? $report->office->short_name : '' }}</td>
                        <td class="border px-4 py-2">{{ $report->commodity ? $report->commodity->name : '' }}</td>
                        <td class="border px-4 py-2">{{ $report->start_date }}</td>
                        <td class="border px-4 py-2">{{ $report->participants_involved }}</td>
                        <td class="border px-4 py-2">{{ $report->activities_done }}</td>
                        <td class="border px-4 py-2">{{ $report->activities_ongoing }}</td>
                        <td class="border px-4 py-2">{{ $report->overall_status }}</td>
                        <td class="border px-4 py-2">{{ $report->report_date->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">{{ $report->user ? $report->user->email : '' }}</td>
                        <td class="border px-4 py-2">{{ $report->upload_id }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $report->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $report->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
