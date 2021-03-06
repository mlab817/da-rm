<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">Compliance Reviews</h3>

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
                        <x-th>Section</x-th>
                        <x-th>Findings</x-th>
                        <x-th>Recommendations</x-th>
                    </tr>
                    </thead>
                    <x-tbody>
                        @foreach ($compliance_reviews as $item)
                            <tr>
                                <x-td>
                                    {{ $item->outline_item->name }}
                                </x-td>
                                <x-td>
                                    {{ $item->findings }}
                                </x-td>
                                <x-td>
                                    {{ $item->recommendations }}
                                </x-td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
    </div>
</div>
