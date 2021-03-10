<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Focals
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <livewire:alert title="Success" message="{{ session('message') }}"></livewire:alert>
            @endif

            <div class="flex my-3 justify-between w-full">
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('focals.create') }}">
                    Add Focal
                </a>
                <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search" wire:model="search">
            </div>

            <x-table>
                <thead>
                    <tr class="bg-gray-100">
                        <x-th class="px-4 py-2 w-20">No.</x-th>
                        <x-th class="px-4 py-2">Office</x-th>
                        <x-th class="px-4 py-2">Commodity</x-th>
                        <x-th class="px-4 py-2">Name</x-th>
                        <x-th class="px-4 py-2">Designation</x-th>
                        <x-th class="px-4 py-2">Email</x-th>
                        <x-th class="px-4 py-2 flex-wrap">Tel/Fax/Mobile/Viber Nos.</x-th>
                        <x-th class="px-4 py-2">Actions</x-th>
                    </tr>
                </thead>
                <tbody>
                @forelse($focals as $item)
                    <tr>
                        <td class="px-4 py-2 text-sm">{{ $item->id }}</td>
                        <td class="px-4 py-2 text-sm">{{ $item->office ? $item->office->name : '' }}</td>
                        <td class="px-4 py-2 text-sm">{{ $item->roadmap ? $item->roadmap->commodity->name : '' }}</td>
                        <td class="px-4 py-2 text-sm">{{ $item->name }}</td>
                        <td class="px-4 py-2 text-sm">{{ $item->designation }}</td>
                        <td class="px-4 py-2 text-sm">{{ $item->email }}</td>
                        <td class="px-4 py-2 text-sm text-center">
                            Tel # {{ $item->telephone_number }} <br/>
                            Fax # {{ $item->fax_number }} <br/>
                            Mobile # {{ $item->mobile_number }} <br/>
                            Viber # {{ $item->viber_number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('focals.edit', $item->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </a>
                            <x-jet-danger-button wire:click="delete({{ $item->id }})">
                                Delete
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @empty
                    <tr class="border">
                        <td class="px-4 py-2 text-center" colspan="12">No focals yet.</td>
                    </tr>
                @endforelse
                </tbody>
            </x-table>
            {{ $focals->links() }}
        </div>
    </div>
</div>
