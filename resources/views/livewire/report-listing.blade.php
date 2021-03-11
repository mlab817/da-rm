<x-slot name="header">
    <x-title>
        Progress Reports
    </x-title>
</x-slot>

<x-content>
    <div class="row justify-between">
        <a class="btn-primary" href="{{ route('reports.create') }}">Add Report</a>
    </div>
    <div class="mt-3">
        <x-table>
            <thead>
                <tr>
                    <x-th>No.</x-th>
                    <x-th>Report Period</x-th>
                    <x-th>Office</x-th>
                    <x-th>Title</x-th>
                    <x-th>Attachment</x-th>
                    <x-th>Actions</x-th>
                </tr>
            </thead>
            <x-tbody>
                @foreach ($reports as $item)
                    <tr>
                        <x-td>{{ $item->id }}</x-td>
                        <x-td>{{ $item->report_period->name ?? '' }}</x-td>
                        <x-td>{{ $item->office->name }}</x-td>
                        <x-td>{{ $item->title }}</x-td>
                        <x-td>
                            <a class="inline-flex items-center" href="{{ $item->upload->url ?? '#' }}" @if($item->upload) target="_blank" @endif>
                                <svg class="mr-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                Report
                            </a>
                        </x-td>
                        <x-td>

                        </x-td>
                    </tr>
                @endforeach
            </x-tbody>
        </x-table>
        <div class="my-3">
            {{ $reports->links() }}
        </div>
    </div>
</x-content>
