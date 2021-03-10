<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Add/Edit Focal
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Office:</label>
                            <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Select Office" wire:model="office_id">
                                <option value="">Select Office</option>
                                @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                @endforeach
                            </select>
                            @error('office_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Roadmap:</label>
                            <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Select Roadmap" wire:model="roadmap_id">
                                <option value="">Select Roadmap</option>
                                @foreach ($roadmaps as $item)
                                    <option value="{{ $item->id }}">{{ $item->commodity->name }}</option>
                                @endforeach
                            </select>
                            @error('roadmap_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Select Status" wire:model="status">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="name" placeholder="Name"></input>
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Designation:</label>
                            <x-jet-input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="designation" placeholder="Designation"></x-jet-input>
                            @error('designation') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <x-jet-input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="email" placeholder="Email"></x-jet-input>
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Telephone No.:</label>
                            <x-jet-input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="telephone_number" placeholder="Tel. No."></x-jet-input>
                            @error('telephone_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                                Fax No.:
                            </x-jet-label>
                            <x-jet-input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="fax_number" placeholder="Fax No."></x-jet-input>
                            @error('fax_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                                Mobile No.:
                            </x-jet-label>
                            <x-jet-input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="mobile_number" placeholder="Mobile No."></x-jet-input>
                            @error('mobile_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                                Viber No.
                            </x-jet-label>
                            <x-jet-input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="viber_number" placeholder="Viber No."></x-jet-input>
                            @error('viber_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-jet-button class="ml-2" wire:click.prevent="store()">Submit</x-jet-button>

                    <x-jet-secondary-button wire:click.prevent="resetInputFields()" wire:loading.attr="disabled">
                        Reset
                    </x-jet-secondary-button>
                </div>
            </form>
        </div>
    </div>
</div>
