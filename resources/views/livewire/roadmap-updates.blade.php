<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">Roadmap Updates</h3>

            <p class="mt-1 text-sm text-gray-600">

            </p>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

            <div>
                <x-table>
                    <thead>
                    <tr>
                        <x-th>Report Period</x-th>
                        <x-th>Participants Involved</x-th>
                        <x-th>Activities Done</x-th>
                        <x-th>Activities Ongoing</x-th>
                        <x-th>Overall Status</x-th>
                    </tr>
                    </thead>
                    <x-tbody>
                        @foreach ($updates as $item)
                            <tr>
                                <x-td>
                                    {{ $item->report->report_period->name ?? '' }}
                                </x-td>
                                <x-td>
                                    {{ $item->participants_involved }}
                                </x-td>
                                <x-td>
                                    {{ $item->activities_done }}
                                </x-td>
                                <x-td>
                                    {{ $item->activities_ongoing }}
                                </x-td>
                                <x-td>
                                    {{ $item->overall_status }}
                                </x-td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            <a href="{{ route('roadmap-updates.create', ['roadmap' => $roadmap->id] ) }}" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                Add
            </a>
        </div>
    </div>
</div>
