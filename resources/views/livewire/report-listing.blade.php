<x-slot name="header">
    <x-title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reports
        </h2>
    </x-title>
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
                <a
                    href="{{ route('reports.create')  }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Create Report
                </a>
                <select class="inline-flex focus:ring-indigo-500 focus:border-indigo-500 text-uppercase rounded sm:text-sm border-gray-300" wire:model="report_period_id">
                    <option value="">Select Report Period</option>
                    @foreach($report_periods as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            @if($confirmDeleteDialog)
                @include('livewire.confirm-delete', ['id' => $report_id])
            @endif

            <x-table>
                <x-thead>
                    <tr class="bg-gray-100">
                        <x-th>
                            Report Period
                        </x-th>
                        <x-th>
                            Office
                        </x-th>
                        <x-th>
                            Commodities
                        </x-th>
                        <x-th>
                            Attachment
                        </x-th>
                        <x-th>
                            Updated By
                        </x-th>
                        <th scope="col" class="relative px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </x-thead>
                <x-tbody>
                @forelse($reports as $report)
                    <tr>
                        <x-td>
                            {{ $report->report_period->name ?? '' }}
                        </x-td>
                        <td class="px-6 py-4 flex-wrap text-sm">
                            {{ $report->office ? $report->office->short_name : '' }}
                        </td>
                        <td class="px-6 py-4 flex-wrap text-sm text-center">
                            @foreach($report->commodities as $item)
                                {{ $item->name }},
                            @endforeach
                        </td>
                        <td class="px-6 py-4 flex-wrap text-sm text-center">
                            @if ($report->upload)
{{--                                <a target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($report->upload->url ?? '') }}">Report</a>--}}
                            @endif
                        </td>
                        <td class="px-6 py-4 flex-wrap text-sm">
                            {{ $report->user ? $report->user->email : '' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a
                                href="{{ route('reports.edit', $report->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
                            <x-jet-danger-button wire:click="confirmDelete({{ $report->id }})">
                                Delete
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-3 py-3 text-center text-sm whitespace-nowrap">No reports found.</td>
                    </tr>
                @endforelse
                </x-tbody>
            </x-table>
            {{ $reports->links() }}
        </div>
    </div>
</div>
