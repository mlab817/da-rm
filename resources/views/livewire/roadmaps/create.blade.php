<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $pageTitle ?? '' }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg">
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
                                wire:model="report_period_id">
                                <option value="" disabled>Select Report Period</option>
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
                                wire:model="office_id">
                                <option value="" disabled>Select Office</option>
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
                        <div class="mt-1">
                            <select
                                id="commodity_id"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                                placeholder="Select Commodity"
                                wire:model="commodity_id">
                                <option value="" disabled>Select Commodity</option>
                                @foreach ($commodities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('commodity_id')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">
                            Date Started
                        </label>
                        <div class="mt-1">
                            <input
                                id="start_date"
                                type="text"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                                placeholder="Start Date"
                                wire:model="start_date">
                        </div>
                        @error('start_date')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="participants_involved" class="block text-sm font-medium text-gray-700">
                            Participants Involved
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="participants_involved"
                                name="participants_involved"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md resize-y"
                                placeholder="Participants Involved"
                                wire:model="participants_involved"></textarea>
                        </div>
                        @error('participants_involved')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="activities_done" class="block text-sm font-medium text-gray-700">
                            Activities Done
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="activities_done"
                                name="activities_done"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md resize-y"
                                placeholder="Activities Done"
                                wire:model="activities_done"></textarea>
                        </div>
                        @error('activities_done')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="activities_ongoing" class="block text-sm font-medium text-gray-700">
                            Ongoing Activities
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="activities_ongoing"
                                name="activities_ongoing"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md resize-y"
                                placeholder="Ongoing Activities"
                                wire:model="activities_ongoing"></textarea>
                        </div>
                        @error('activities_ongoing')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="overall_status" class="block text-sm font-medium text-gray-700">
                            Overall Status
                        </label>
                        <div class="mt-1">
                            <textarea
                                id="overall_status"
                                name="overall_status"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md resize-y"
                                placeholder="Overall Status"
                                wire:model="overall_status"></textarea>
                        </div>
                        @error('overall_status')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="report_date" class="block text-sm font-medium text-gray-700">
                            Report Date
                        </label>
                        <div class="mt-1">
                            <input
                                id="report_date"
                                type="date"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                                placeholder="Report Date"
                                wire:model="report_date">
                        </div>
                        @error('report_date')
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
            <x-jet-button class="ml-2" wire:click.prevent="store()">Submit</x-jet-button>

            <x-jet-secondary-button wire:click.prevent="resetInputFields()" wire:loading.attr="disabled">
                Reset
            </x-jet-secondary-button>
        </div>
    </div>
</div>
