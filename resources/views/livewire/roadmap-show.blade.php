<x-slot name="header">
    <x-title>
        {{ __('Roadmap') }}
    </x-title>
</x-slot>

<x-content>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>

                <p class="mt-1 text-sm text-gray-600">

                </p>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-4">
                        <label class="block font-medium text-sm text-gray-700" for="name">
                            Commodity
                        </label>
                        <p>{{ $roadmap->commodity->name }}</p>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label class="block font-medium text-sm text-gray-700" for="email">
                            Office
                        </label>
                        <p>{{ $roadmap->office->name }}</p>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label class="block font-medium text-sm text-gray-700" for="email">
                            Date Formulation/Updating Started
                        </label>
                        <p>{{ $roadmap->start_date }}</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                    Save
                </button>
            </div>
        </div>
    </div>

    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Focal Persons</h3>

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
                                <x-th>Name</x-th>
                                <x-th>Email</x-th>
                                <x-th>Contact Info</x-th>
                            </tr>
                        </thead>
                        <x-tbody>
                            @foreach ($focals as $item)
                                <x-td>
                                    {{ $item->name }}
                                    <p class="text-sm">
                                        {{ $item->designation }}
                                    </p>
                                </x-td>
                                <x-td>
                                    {{ $item->email }}
                                </x-td>
                                <x-td>
                                    {{ $item->viber_number }}
                                </x-td>
                            @endforeach
                        </x-tbody>
                    </x-table>
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <a href="{{ route('focals.create', ['roadmap_id' => $roadmap->id, 'office_id' => $roadmap->office_id] ) }}" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                    Add
                </a>
            </div>
        </div>
    </div>
</x-content>
