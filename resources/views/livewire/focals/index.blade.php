<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Focals
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
            <x-jet-button class="mb-3" wire:click="create()">Add Focal</x-jet-button>
            @if($isOpen)
                @include('livewire.focals.create')
            @endif
            <table class="table-fixed min-w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Office</th>
                        <th class="px-4 py-2">Commodity</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Designation</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2 flex-wrap">Tel/Fax/Mobile/Viber Nos.</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($focals as $item)
                    <tr>
                        <td class="border px-4 py-2 text-sm">{{ $item->id }}</td>
                        <td class="border px-4 py-2 text-sm">{{ $item->office ? $item->office->name : '' }}</td>
                        <td class="border px-4 py-2 text-sm">{{ $item->commodity ? $item->commodity->name : '' }}</td>
                        <td class="border px-4 py-2 text-sm">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-sm">{{ $item->designation }}</td>
                        <td class="border px-4 py-2 text-sm">{{ $item->email }}</td>
                        <td class="border px-4 py-2 text-sm text-center">
                            Tel # {{ $item->telephone_number }} <br/>
                            Fax # {{ $item->fax_number }} <br/>
                            Mobile # {{ $item->mobile_number }} <br/>
                            Viber # {{ $item->viber_number }}
                        </td>
                        <td class="border px-4 py-2 text-sm">
                            <x-jet-button wire:click="edit({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </x-jet-button>
                            <x-jet-danger-button wire:click="delete({{ $item->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @empty
                    <tr class="border">
                        <td class="px-4 py-2 text-center" colspan="12">No focals yet.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $focals->links() }}
        </div>
    </div>
</div>
