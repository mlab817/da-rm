<x-slot name="header">
    <x-title>Add Roadmap Update{{ ': ' . $roadmap->commodity->name ?? '' }}</x-title>
</x-slot>

<x-content>
    <div class="bg-white px-3 py-3">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        <form wire:submit.prevent="store">
            @error('any')
                {{ $errors }}
            @enderror
            <div class="my-2">
                <label for="report_id">Report</label>
                <select class="w-full rounded outline-none" wire:model.defer="report_id">
                    <option value="">Select Report</option>
                    @foreach($reports as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                @error('report_id') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="my-2">
                <label for="participants_involved">Participants Involved</label>
                <textarea style="resize:none;" class="w-full" wire:model.defer="participants_involved"></textarea>
                @error('participants_involved') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="my-2">
                <label for="activities_done">Activities Done</label>
                <textarea style="resize:none;" class="w-full rounded" wire:model.defer="activities_done"></textarea>
                @error('activities_done') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="my-2">
                <label for="activities_ongoing">Ongoing Activities</label>
                <textarea style="resize:none;" class="w-full rounded" wire:model.defer="activities_ongoing"></textarea>
                @error('activities_ongoing') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="my-2">
                <label for="overall_status">Overall Status</label>
                <textarea style="resize:none;" class="w-full rounded" wire:model.defer="overall_status"></textarea>
                @error('overall_status') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="my-2">
                <label for="remarks">Remarks</label>
                <textarea style="resize:none;" class="w-full rounded" wire:model.defer="remarks"></textarea>
                @error('remarks') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="flex flex-row-reverse">
                <x-jet-button type="submit" wire:loading.attr="disabled">Submit</x-jet-button>
            </div>
        </form>
    </div>
</x-content>
