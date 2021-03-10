<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Commodities
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

            <div class="flex my-3 justify-between w-full">
                <x-jet-button wire:click="create()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Add Commodity</x-jet-button>
                <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search" type="text" wire:model="search">
            </div>

            @if($isOpen)
                @include('livewire.commodities.create')
            @endif
            <table class="table-fixed min-w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">No.</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Office</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($commodities as $commodity)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $commodity->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $commodity->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $commodity->office ? $commodity->office->name : '' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                            <x-jet-button wire:click="edit({{ $commodity->id }})">Edit</x-jet-button>
                            <x-jet-danger-button wire:click="delete({{ $commodity->id }})">Delete</x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $commodities->links() }}
        </div>
    </div>
</div>
