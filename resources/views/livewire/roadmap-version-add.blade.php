<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">Versions</h3>

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
                        <x-th>Date</x-th>
                        <x-th>Title</x-th>
                        <x-th>Version</x-th>
                        <x-th>Attachment</x-th>
                        <x-th>Review</x-th>
                        <x-th></x-th>
                    </tr>
                    </thead>
                    <x-tbody>
                        @foreach ($versions as $item)
                            <tr>
                                <x-td>
                                    {{ $item->date }}
                                </x-td>
                                <x-td>
                                    {{ $item->title }}
                                </x-td>
                                <x-td>
                                    {{ $item->version }}
                                </x-td>
                                <x-td>
                                    <a target="_blank" class="text-center" href="{{ $item->url }}">
                                        <svg class="inline-flex h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                        </svg>
                                        Attachment
                                    </a>
                                </x-td>
                                <x-td>
                                    <a class="btn btn-primary" href="{{ route('compliance.review', $item->id) }}">Review</a>
                                </x-td>
                                <x-td>
                                    <button class="text-black-50" type="button" wire:click="deleteVersion({{ $item->id }})">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </x-td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            <x-jet-button wire:click="uploadFile()" wire:loading.attr="disabled" wire:target="photo">
                Add
            </x-jet-button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="uploadVersionDialog">
        <form>
            <x-slot name="title">
                Upload Roadmap Version
            </x-slot>
            <x-slot name="content">
                <div class="mb-2">
                    <label for="report_id" class="py-1 text-sm font-semibold">Report</label>
                    <select wire:model="report_id" id="report_id" class="w-full">
                        <option value="">Select Report</option>
                        @foreach ($reports as $report)
                            <option value="{{ $report->id }}">{{ $report->title }}</option>
                        @endforeach
                    </select>
                    @error('report_id') <p>{{ $message }}</p> @enderror
                </div>
                <div class="mb-2">
                    <label for="title" class="py-1 text-sm font-semibold">Title</label>
                    <input type="text" wire:model="title" id="title" class="w-full">
                    @error('title') <p>{{ $message }}</p> @enderror
                </div>
                <div class="mb-2">
                    <label for="date" class="py-1 text-sm font-semibold">Date</label>
                    <input type="date" wire:model="date" id="date" class="w-full">
                    @error('date') <p>{{ $message }}</p> @enderror
                </div>
                <div class="mb-2">
                    <label for="attachment" class="py-1 text-sm font-semibold">Attachment</label>
                    <input type="file" wire:model="attachment" id="attachment" class="w-full" accept="application/pdf">
                    <p class="text-sm" wire:loading wire:target="attachment">Uploading...</p>
                    @error('attachment') <p>{{ $message }}</p> @enderror
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="cancel()">Reset</x-jet-secondary-button>
                <x-jet-button wire:click="store()">Submit</x-jet-button>
            </x-slot>
        </form>
    </x-jet-dialog-modal>
</div>
