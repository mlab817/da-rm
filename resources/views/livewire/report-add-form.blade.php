<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $pageTitle }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg">
        <div>
            @if (session()->has('message'))
                <div class="bg-white bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">
                                {{ session('message') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="bg-white overflow-hidden shadow-xl rounded-t-lg px-4 py-4">
            <form>
                <div class="overflow-hidden sm:rounded-md">
                    <div class="mb-4">
                        <label for="report_period_id" class="block text-sm font-medium text-gray-700">
                            Report Period
                        </label>
                        <div class="mt-1">
                            <select
                                id="report_period_id"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                                placeholder="Select Report Period"
                                wire:model.defer="report_period_id"
                                name="report_period_id">
                                <option value="">Select Report Period</option>
                                @foreach ($report_periods as $report_period)
                                    <option value="{{ $report_period->id }}">{{ $report_period->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('report_period_id')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="office_id" class="block text-sm font-medium text-gray-700">
                            Office
                        </label>
                        <div class="mt-1">
                            <select
                                id="office_id"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                                placeholder="Select Office"
                                wire:model="office_id"
                                name="office_id">
                                <option value="">Select Office</option>
                                @foreach ($offices as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('office_id')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="commodity_id" class="block text-sm font-medium text-gray-700">
                            Commodity
                        </label>
                        <div class="px-2 mt-1">
                            @foreach($commodities as $item)
                                <label class="inline-flex items-center w-full">
                                    <input class="form-check" type="checkbox" value="{{ $item->id }}" wire:model.defer="commodity_id" name="commodity_id">
                                    <span class="ml-2">{{ $item->name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('commodity_id')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700">
                            Attachment
                        </label>
                        <div class="mt-1">
                            <input
                                id="file"
                                type="file"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                                placeholder="Attachment"
                                wire:model="file">
                            <div wire:loading wire:target="file" class="text-sm text-gray-400">Uploading...</div>
                        </div>
                        @error('file')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="bg-gray-50 px-4 py-3 rounded-b-lg sm:flex sm:flex-row-reverse">
            <x-jet-button class="ml-2" wire:click.prevent="store()" wire:loading.attr="disabled">Submit</x-jet-button>

            <x-jet-secondary-button wire:click.prevent="resetInputFields()" wire:loading.attr="disabled">
                Reset
            </x-jet-secondary-button>
        </div>
    </div>
</div>

