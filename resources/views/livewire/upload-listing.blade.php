<x-slot name="header">
    <x-title>
        Manage Uploads
    </x-title>
</x-slot>

<x-content>
    <div>
        <x-jet-confirmation-modal wire:model="confirmDeleteDialog">
            <x-slot name="title">Confirm Delete</x-slot>
            <x-slot name="content">
                Are you sure you want to delete this upload?
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="cancelDelete()">Cancel</x-jet-secondary-button>
                <x-jet-danger-button wire:click="delete()">Delete</x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </div>

    <div class="my-3">
        <div class="w-full">
            @if($message)
                @livewire('alert', ['message' => $message, 'type' => $status ])
            @endif
        </div>

        <x-table>
            <thead>
                <tr>
                    <x-th>ID</x-th>
                    <x-th>Title</x-th>
                    <x-th>Attachment</x-th>
                    <x-th>Actions</x-th>
                </tr>
            </thead>
            <x-tbody>
                @foreach($uploads as $item)
                    <tr>
                        <x-td>{{ $item->id }}</x-td>
                        <x-td>{{ $item->title }}</x-td>
                        <x-td>
                            <a class="inline-flex items-center" href="{{ $item->url ?? '#' }}" @if($item->url) target="_blank" @endif>
                                <svg class="mr-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                Report
                            </a>
                        </x-td>
                        <x-td>
                            <x-jet-danger-button wire:click="confirmDelete({{ $item->id }})">Delete</x-jet-danger-button>
                        </x-td>
                    </tr>
                @endforeach
            </x-tbody>
        </x-table>
        <div class="my-3">
            {{ $uploads->links() }}
        </div>
    </div>
</x-content>
